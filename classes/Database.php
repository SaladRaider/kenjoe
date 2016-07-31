<?php

require_once $path["classes/Classes.php"];

define('ENV', 'DEV'); // Change this to 'PROD' on production server

class KJDatabase {
	
	private $db;

	// PUBLIC METHODS

	public function __construct() {
		$this->db = $this->createDatabaseConnection();
	}

	// GET MTHODS

	function getLastInsertId() {
		return $this->db->lastInsertId();
	}

	function getAllListings() {
		$query = $this->db->prepare("SELECT * FROM `listings`");
		$query->execute();
		
		return Listing::createListingsFromQueryRows($query->fetchAll());
	}

	function getListingsLimitBy($numOfListingsToFetch) {
		$query = $this->db->prepare("SELECT * FROM `listings` LIMIT :numOfListingsToFetch");
		$query->bindParam(":numOfListingsToFetch", $numOfListingsToFetch);
		$query->execute();
		
		return Listing::createListingsFromQueryRows($query->fetchAll());
	}

	function getListingById($listingsId) {
		$query = $this->db->prepare("SELECT * FROM `listings` WHERE `listings_id` = :listingsId");
		$query->bindParam(":listingsId", $listingsId);
		$query->execute();
		
		return new Listing($query->fetch());
	}

	function getListingPhotosByListingsId($listingsId) {
		$query = $this->db->prepare("SELECT * FROM `listing_photos` WHERE `listings_id` = :listingsId");
		$query->bindParam(":listingsId", $listingsId);
		$query->execute();
	
		return ListingPhoto::createListingPhotosFromQueryRows($query->fetchAll());
	}

	// ADD METHODS

	public function addListing($listing) {
		$query = $this->db->prepare("
			INSERT INTO `listings`
			(
				`address`,
				`price`,
				`est_mortgage`,
				`beds`,
				`baths`,
				`sq_ft`,
				`description`,
				`facts`
			)
			VALUES
			(?,?,?,?,?,?,?,?);
		");
		$query->bindValue(1, $listing->getAddress());
		$query->bindValue(2, $listing->getPrice());
		$query->bindValue(3, $listing->getEstimatedMortgage());
		$query->bindValue(4, $listing->getNumOfBeds());
		$query->bindValue(5, $listing->getNumOfBaths());
		$query->bindValue(6, $listing->getSqFt());
		$query->bindValue(7, $listing->getDescription());
		$query->bindValue(8, $listing->getFacts());
		$query->execute();
		$listing->setListingsId($this->getLastInsertId());
	}

	public function addListingPhoto($listingPhoto) {
		$query = $this->db->prepare("
			INSERT INTO `listing_photos`
			(
				`listings_id`,
				`file_type`
			)
			VALUES
			(?,?);
		");
		$query->bindValue(1, $listingPhoto->getListingsId());
		$query->bindValue(2, $listingPhoto->getFileType());
		$query->execute();
		$listingPhoto->setListingPhotosId($this->getLastInsertId());
	}

	// TRANSACTION METHODS

	public function beginTransaction() {
		$this->db->beginTransaction();
	}

	public function commit() {
		$this->db->commit();
	}

	public function rollBack() {
		$this->db->rollBack();
	}

	// PRIVATE METHODS
	
	private function createDatabaseConnection() {
	    $config = null;

	    if(ENV == 'DEV') {
	        $config = $this->getDevConfigSettings();
	    } else {
	        $config = $this->getProdConfigSettings();
	    }
	    
	    return $this->makeDatabaseConnectionFromSettings($config);
	}

	private function getDevConfigSettings() {
	    $config['Connection'] = 'localhost';
	    $config['Database'] = 'kenjoe_dev';
	    $config['Username'] = 'root';
	    $config['Password'] = 'password';
	    return $config;
	}

	private function getProdConfigSettings() {
	    $config['Connection'] = 'localhost';
	    $config['Database'] = 'db_name_here';
	    $config['Username'] = 'mysql_username_here';
	    $config['Password'] = 'mysql_user_password_here (super secure)';
	    return $config;
	}

	private function makeDatabaseConnectionFromSettings($config) {
	    return new PDO("mysql:host={$config['Connection']};dbname={$config['Database']}", $config['Username'], $config['Password']);
	}
}

?>