<?php

class Listing {
	private $listingsId;
	private $address;
	private $price;
	private $estimatedMortgage;
	private $numOfBeds;
	private $numOfBaths;
	private $sqFt;
	private $description;
	private $facts;

	// PUBLIC METHODS

	public static function createListingsFromQueryRows($rows) {
		$listings = array();
		foreach($rows as $row) {
			$listings = new Listing($row);
		}
		return $listings;
	}

	public function __construct($rowData) {
		if(!empty($rowData['listings_id']))
			$this->listingsId = $rowData['listings_id'];
		$this->address = $rowData['address'];
		$this->price = $rowData['price'];
		$this->estimatedMortgage = $rowData['est_mortgage'];
		$this->numOfBeds = $rowData['beds'];
		$this->numOfBaths = $rowData['baths'];
		$this->sqFt = $rowData['sq_ft'];
		$this->description = $rowData['description'];
		$this->facts = $rowData['facts'];
	}

	public function getListingsId() {
		return $this->listingsId;
	}

	public function getAddress() {
		return $this->address;
	}

	public function getPrice() {
		return $this->price;
	}

	public function getEstimatedMortgage() {
		return $this->estimatedMortgage;
	}

	public function getNumOfBeds() {
		return $this->numOfBeds;
	}

	public function getNumOfBaths() {
		return $this->numOfBaths;
	}

	public function getSqFt() {
		return $this->sqFt;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getFacts() {
		return $this->facts;
	}

	public function getFactsAsHTML() {
		$html = "";
		$facts = explode("\n", $this->facts);

		foreach($facts as $fact) {
			if(strlen($fact) <= 0)
				continue;
			$html .= "<li>{$fact}</li>";
		}

		return "<ul>{$html}</ul>";
	}

	public function getListingPhotosAsHTML(KJDatabase $database) {
		$listingPhotos = $database->getListingPhotosByListingsId($this->listingsId);
		return $this->renderListingPhotosAsHTML($listingPhotos);
	}

	public function setListingsId($listingsId) {
		$this->listingsId = $listingsId;
	}

	// PRIVATE METHODS

	private function renderListingPhotosAsHTML($listingPhotos) {
		$renderedFirstPhoto = false;
		$renderedHTML = "";

		foreach($listingPhotos as $listingPhoto) {
			if($renderedFirstPhoto)
				$renderedHTML .= $this->renderListingPhotoAsHTML($listingPhoto);
			else {
				$renderedHTML .= $this->renderFirstListingPhotoAsHTML($listingPhoto);
				$renderedFirstPhoto = true;
			}
		}

		return $renderedHTML;
	}

	private function renderListingPhotoAsHTML($listingPhoto) {
		return "
			<div class=\"item\">
				<img src=\"{$listingPhoto->getPhotoPath()}\" alt=\"Exterior\" >
			</div>";
	}

	private function renderFirstListingPhotoAsHTML($listingPhoto) {
		return "
			<div class=\"item active\">
				<img src=\"{$listingPhoto->getPhotoPath()}\" alt=\"Exterior\" >
			</div>";
	}
}

?>