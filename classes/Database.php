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

	public function getLastInsertId() {
		return $this->db->lastInsertId();
	}

	public function getAllListings() {
		$query = $this->db->prepare("
		SELECT * FROM
			(SELECT 
				*,  
				IF(`realtor`='Ken Joe', 1, 0) as `is_ken_joe`
			FROM `listings`) T
		ORDER BY `is_ken_joe`DESC;");
		$query->execute();
		
		return Listing::createListingsFromQueryRows($query->fetchAll());
	}

	public function getListingsLimitBy($numOfListingsToFetch) {
		$query = $this->db->prepare("
		SELECT * FROM
			(SELECT 
				*,  
				IF(`realtor`='Ken Joe', 1, 0) as `is_ken_joe`
			FROM `listings` 
			LIMIT :numOfListingsToFetch) T
		ORDER BY `is_ken_joe`DESC;");
		$query->bindParam(":numOfListingsToFetch", $numOfListingsToFetch, PDO::PARAM_INT);
		$query->execute();
		
		return Listing::createListingsFromQueryRows($query->fetchAll());
	}

	public function getListingById($listingsId) {
		$query = $this->db->prepare("SELECT * FROM `listings` WHERE `listings_id` = :listingsId");
		$query->bindParam(":listingsId", $listingsId, PDO::PARAM_INT);
		$query->execute();
		
		return new Listing($query->fetch());
	}

	public function getListingPhotoById($listingPhotosId) {
		$query = $this->db->prepare("SELECT * FROM `listing_photos` WHERE `listing_photos_id` = :listingPhotosId");
		$query->bindParam(":listingPhotosId", $listingPhotosId, PDO::PARAM_INT);
		$query->execute();
	
		return new ListingPhoto($query->fetch());
	}

	public function getListingPhotosByListingsId($listingsId) {
		$query = $this->db->prepare("SELECT * FROM `listing_photos` WHERE `listings_id` = :listingsId");
		$query->bindParam(":listingsId", $listingsId, PDO::PARAM_INT);
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
				`facts`,
				`realtor`,
				`featured_listing_photos_id`
			)
			VALUES
			(?,?,?,?,?,?,?,?,?,?);
		");
		$query->bindValue(1, $listing->getAddress());
		$query->bindValue(2, $listing->getPrice());
		$query->bindValue(3, $listing->getEstimatedMortgage());
		$query->bindValue(4, $listing->getNumOfBeds());
		$query->bindValue(5, $listing->getNumOfBaths());
		$query->bindValue(6, $listing->getSqFt());
		$query->bindValue(7, $listing->getDescription());
		$query->bindValue(8, $listing->getFacts());
		$query->bindValue(9, $listing->getRealtor());
		$query->bindValue(10, $listing->getFeaturedListingPhotosId());
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

	// UPDATE METHODS

	public function updateListing($listing) {
		$query = $this->db->prepare("
			UPDATE `listings`
			SET
				`address`=?,
				`price`=?,
				`est_mortgage`=?,
				`beds`=?,
				`baths`=?,
				`sq_ft`=?,
				`description`=?,
				`facts`=?,
				`realtor`=?,
				`featured_listing_photos_id`=?
			WHERE
			`listings_id` = ?;
		");
		$query->bindValue(1, $listing->getAddress());
		$query->bindValue(2, $listing->getPrice());
		$query->bindValue(3, $listing->getEstimatedMortgage());
		$query->bindValue(4, $listing->getNumOfBeds());
		$query->bindValue(5, $listing->getNumOfBaths());
		$query->bindValue(6, $listing->getSqFt());
		$query->bindValue(7, $listing->getDescription());
		$query->bindValue(8, $listing->getFacts());
		$query->bindValue(9, $listing->getRealtor());
		$query->bindValue(10, $listing->getFeaturedListingPhotosId());
		$query->bindValue(11, $listing->getListingsId());
		$query->execute();
	}

	// DELETE METHODS

	public function deleteListing($listingsId) {
		$query = $this->db->prepare("DELETE FROM `listings` WHERE `listings_id`=:listingsId");
		$query->bindParam(":listingsId", $listingsId, PDO::PARAM_INT);
		$query->execute();
	}

	public function deleteListingPhotosByListingsId($listingsId) {
		$query = $this->db->prepare("DELETE FROM `listing_photos` WHERE `listings_id`=:listingsId");
		$query->bindParam(":listingsId", $listingsId, PDO::PARAM_INT);
		$query->execute();
	}

	public function deleteListingPhoto($listingPhotosId) {
		$query = $this->db->prepare("DELETE FROM `listing_photos` WHERE `listing_photos_id`=:listingPhotosId");
		$query->bindParam(":listingPhotosId", $listingPhotosId, PDO::PARAM_INT);
		$query->execute();
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