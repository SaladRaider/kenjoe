<?php

define("LISTING_PHOTOS_PATH", "../images/listings");
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);
define("MAX_FILE_SIZE", 2*MB);

class ListingPhoto {
	private $listingPhotosId;
	private $listingsId;
	private $fileType;
	private $file;

	// PUBLIC METHODS
	
	public static function createListingPhotosFromQueryRows($rows) {
		$listingPhotos = array();
		foreach($rows as $row) {
			$listingPhotos[] = new ListingPhoto($row);
		}
		return $listingPhotos;
	}

	public static function createNewListingPhotoFromFileAndListingsId($file, $listingsId) {
		$listingPhotoData['listings_id'] = $listingsId;
		$listingPhotoData['file']  = $file;
		return new ListingPhoto($listingPhotoData);
	}

	public function __construct($rowData) {
		if(!empty($rowData["listing_photos_id"]))
			$this->listingPhotosId = $rowData["listing_photos_id"];
		if(!empty($rowData['file'])) {
			$this->file = $rowData["file"];
			$this->fileType = $this->getPhotoExtensionFromFile($rowData["file"]);
		}
		else
			$this->fileType = $rowData["file_type"];
		$this->listingsId = $rowData["listings_id"];
	}

	public function uploadListingPhotoToServer() {
		$this->checkIfValidPhoto();
		$this->savePhotoToLisitingDest();
	}

	public function getPhotoPath() {
		return "images/listings/" . $this->listingsId . "/" . $this->listingPhotosId . "." . $this->fileType;
	}

	public function getListingsId() {
		return $this->listingsId;
	}

	public function getFileType() {
		return $this->fileType;
	}

	public function getListingPhotosId() {
		return $this->listingPhotosId;
	}

	public function setListingPhotosId($listingPhotosId) {
		$this->listingPhotosId = $listingPhotosId;
	}

	// PRIVATE METHODS

	private function checkIfValidPhoto() {

		if(empty($this->file['tmp_name']))
			throw new Exception("File is empty.");

		if(!$this->isFileImage())
			throw new Exception("File is not an image.");

		if(!$this->isFileSmallEnough())
			throw new Exception("File size is too large.");

		if(!$this->isFileCorrectImageType())
			throw new Exception("File is not the correct file type (jpg, jpeg, png, gif).");
	}

	private function isFileImage() {
		return getimagesize($this->file["tmp_name"]) !== false;
	}

	private function isFileSmallEnough() {
		return $this->file["size"] <= MAX_FILE_SIZE;
	}

	private function isFileCorrectImageType() {
		return $this->fileType == "jpg" || $this->fileType == "jpeg" || $this->fileType == "png" || $this->fileType == "gif";
	}

	private function getPhotoExtensionFromFile($file) {
		return pathinfo($file["name"], PATHINFO_EXTENSION);
	}

	private function getPhotoDestinationPath() {
		return LISTING_PHOTOS_PATH . "/" . $this->listingsId;
	}

	private function getPhotoFileName() {
		return $this->listingPhotosId . "." . $this->getPhotoExtensionFromFile($this->file);
	}

	private function getPhotoFullDestinationPath() {
		return $this->getPhotoFullDestinationPath() . "/" . getPhotoFileName();
	}

	private function savePhotoToLisitingDest() {
		$filePath = $this->getPhotoDestinationPath();
		if(!file_exists($filePath)) {
			mkdir($filePath, 0777, true);
			echo $filePath . " Created Directory<br />";
		}
		echo $filePath . "/" . $this->getPhotoFileName();
		move_uploaded_file($this->file["tmp_name"], $filePath . "/" . $this->getPhotoFileName());
	}

}

?>