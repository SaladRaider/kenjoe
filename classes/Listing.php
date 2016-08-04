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
	private $realtor;
	private $featuredListingPhotosId;

	// PUBLIC METHODS

	public static function createListingsFromQueryRows($rows) {
		$listings = array();
		foreach($rows as $row) {
			$listings[] = new Listing($row);
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
		$this->realtor = $rowData['realtor'];
		if(!empty($rowData['featured_listing_photos_id']))
			$this->featuredListingPhotosId = $rowData['featured_listing_photos_id'];
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

	public function getFormattedPrice() {
		return number_format($this->price); 
	}

	public function getFormattedEstimatedMortgage() {
		return number_format($this->estimatedMortgage);
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

	public function getFormattedSqFt() {
		return number_format($this->sqFt);
	}

	public function getDescription() {
		return $this->description;
	}

	public function getFacts() {
		return $this->facts;
	}

	public function getRealtor() {
		return $this->realtor;
	}

	public function getFeaturedListingPhotosId() {
		return $this->featuredListingPhotosId;
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

	public function getListingPhotos(KJDatabase $database) {
		return $database->getListingPhotosByListingsId($this->listingsId);
	}

	public function getFeaturedListingPhotoPath($database) {
		$featuredListingPhoto = $database->getListingPhotoById($this->getFeaturedListingPhotosId());
		return $featuredListingPhoto->getPhotoPath();
	}

	public function setListingsId($listingsId) {
		$this->listingsId = $listingsId;
	}

	public function setFeaturedListingPhotosId($featuredListingPhotosId) {
		$this->featuredListingPhotosId = $featuredListingPhotosId;
	}

	public function render($database) {
		$featuredListingPhoto = $database->getListingPhotoById($this->getFeaturedListingPhotosId());
		echo "
		<div class=\"col-xs-12 col-sm-6 col-md-4 v-padding\">
			<a href=\"./listing.php?listing_id={$this->getListingsId()}\">
			<div class=\"house-card\">
				<div class=\"house-img image\" style=\"background-image: url('{$featuredListingPhoto->getPhotoPath()}');\" ></div>
				<div class=\"house-desc h-padding-sm v-padding-sm\">
					<div class=\"price-text\">\${$this->getFormattedPrice()}</div>
					{$this->getNumOfBeds()} bds, {$this->getNumOfBaths()} ba, {$this->getFormattedSqFt()} sqft<br />
					{$this->getAddress()}
				</div>
			</div>
			</a>
		</div>";
	}

	public function renderEditable($database) {
		$featuredListingPhoto = $database->getListingPhotoById($this->getFeaturedListingPhotosId());
		echo "
		<div class=\"col-xs-12 col-sm-6 col-md-4 v-padding\">
			<a href=\"./listing.php?listing_id={$this->getListingsId()}\" target=\"_blank\">View</a> | <a href=\"./new-listing-photos.php?listing_id={$this->getListingsId()}\">Edit Photos</a> | <a href=\"./edit-listing.php?listing_id={$this->getListingsId()}\">Edit</a> | <a onclick=\"deleteListing({$this->getListingsId()})\">Delete</a>
			<div class=\"house-card\">
				<div class=\"house-img image\" style=\"background-image: url('{$featuredListingPhoto->getPhotoPath()}');\" ></div>
				<div class=\"house-desc h-padding-sm v-padding-sm\">
					<div class=\"price-text\">\${$this->getFormattedPrice()}</div>
					{$this->getNumOfBeds()} bds, {$this->getNumOfBaths()} ba, {$this->getFormattedSqFt()} sqft<br />
					{$this->getAddress()}
				</div>
			</div>
		</div>";
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