<?php

class Listing {
	private $listingId;
	private $address;
	private $price;
	private $estimatedMortgage;
	private $numOfBeds;
	private $numOfBaths;
	private $sqFt;
	private $description;
	private $facts;

	public static function createListingsFromQueryRows($rows) {
		$listings = array();
		foreach($rows as $row) {
			$listings = new Listing($row);
		}
		return $listings;
	}

	public function __construct($rowData) {
		if(!empty($initData['listing_id']))
			$this->listingId = $rowData['listing_id'];
		$this->address = $rowData['address'];
		$this->price = $rowData['price'];
		$this->estimatedMortgage = $rowData['est_mortgage'];
		$this->numOfBeds = $rowData['beds'];
		$this->numOfBaths = $rowData['baths'];
		$this->sqFt = $rowData['sq_ft'];
		$this->description = $rowData['description'];
		$this->facts = $rowData['facts'];
	}

	public function getListingId() {
		return $this->listingId;
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
}

?>