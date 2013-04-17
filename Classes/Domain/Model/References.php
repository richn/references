<?php
namespace TYPO3\References\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package references
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class References extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Titel der Projekts
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Domain des Projekts
	 *
	 * @var \string
	 */
	protected $url;

	/**
	 * Beschreibung
	 *
	 * @var \string
	 */
	protected $description;

	/**
	 * Screen 1
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $pic1;

	/**
	 * Screen 2
	 *
	 * @var \string
	 */
	protected $pic2;

	/**
	 * Screen 3
	 *
	 * @var \string
	 */
	protected $pic3;

	/**
	 * Getätigte Aufgaben
	 *
	 * @var \string
	 */
	protected $services;

	/**
	 * Kundenmeinung
	 *
	 * @var \string
	 */
	protected $customer;

	/**
	 * categories
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\References\Domain\Model\Category>
	 */
	protected $categories;

	/**
	 * Sorting
	 *
	 * @var \int
	 */
	protected $sorting;


	/**
	 * __construct
	 *
	 * @return References
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->categories = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the title
	 *
	 * @return \string $title
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Sets the title
	 *
	 * @param \string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the url
	 *
	 * @return \string $url
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * Sets the url
	 *
	 * @param \string $url
	 * @return void
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * Returns the description
	 *
	 * @return \string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param \string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the pic1
	 *
	 * @return \string $pic1
	 */
	public function getPic1() {
		return $this->pic1;
	}

	/**
	 * Sets the pic1
	 *
	 * @param \string $pic1
	 * @return void
	 */
	public function setPic1($pic1) {
		$this->pic1 = $pic1;
	}

	/**
	 * Returns the pic2
	 *
	 * @return \string $pic2
	 */
	public function getPic2() {
		return $this->pic2;
	}

	/**
	 * Sets the pic2
	 *
	 * @param \string $pic2
	 * @return void
	 */
	public function setPic2($pic2) {
		$this->pic2 = $pic2;
	}

	/**
	 * Returns the pic3
	 *
	 * @return \string $pic3
	 */
	public function getPic3() {
		return $this->pic3;
	}

	/**
	 * Sets the pic3
	 *
	 * @param \string $pic3
	 * @return void
	 */
	public function setPic3($pic3) {
		$this->pic3 = $pic3;
	}

//siteway
	/**
	 * getPics
	 *
	 * @return
	 */
	public function getPics() {
		return explode(',', $this->pic3);
	}

	/**
	 * Sets the Pics
	 *
	 * @param string $pics
	 * @return void
	 */
	public function setPics($pics) {
			$this->pics = $pics;
	}	



	/**
	 * Returns the services
	 *
	 * @return \string $services
	 */
	public function getServices() {
		return $this->services;
	}

	/**
	 * Sets the services
	 *
	 * @param \string $services
	 * @return void
	 */
	public function setServices($services) {
		$this->services = $services;
	}

	/**
	 * Returns the customer
	 *
	 * @return \string $customer
	 */
	public function getCustomer() {
		return $this->customer;
	}

	/**
	 * Sets the customer
	 *
	 * @param \string $customer
	 * @return void
	 */
	public function setCustomer($customer) {
		$this->customer = $customer;
	}

	/**
	 * Adds a Category
	 *
	 * @param \TYPO3\References\Domain\Model\Category $category
	 * @return void
	 */
	public function addCategory(\TYPO3\References\Domain\Model\Category $category) {
		$this->categories->attach($category);
	}

	/**
	 * Removes a Category
	 *
	 * @param \TYPO3\References\Domain\Model\Category $categoryToRemove The Category to be removed
	 * @return void
	 */
	public function removeCategory(\TYPO3\References\Domain\Model\Category $categoryToRemove) {
		$this->categories->detach($categoryToRemove);
	}

	/**
	 * Returns the categories
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\References\Domain\Model\Category> $categories
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * Sets the categories
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\References\Domain\Model\Category> $categories
	 * @return void
	 */
	public function setCategories(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $categories) {
		$this->categories = $categories;
	}
	
	/**
	 * Returns the sorting
	 *
	 * @return \int $sorting
	 */
	public function getSorting() {
		return $this->sorting;
	}

	/**
	 * Sets the sorting
	 *
	 * @param \int $sorting
	 * @return void
	 */
	public function setSorting($sorting) {
		$this->sorting = $sorting;
	}
	
	

}
?>