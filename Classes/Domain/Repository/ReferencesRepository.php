<?php
namespace TYPO3\References\Domain\Repository;

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
class ReferencesRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * findAll
	 * @param \array $settings
	 * 
	 */
	public function findAll($settings = array()){

		$query = $this->createQuery();

		if($settings["categories"]){
			$catList = explode(",", $settings["categories"]);
			if(is_array($catList)){
				$constraints = array();
				foreach ($catList as $cat) {
					$constraints[] = $query->contains("categories", $cat);
				}
				
				$query->matching(
					$query->logicalOr($constraints)
				);
			}
			
		}
		$query->setOrderings(array('sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
		return $query->execute();		
	}

	/**  
	 * findNextReference
	 * @param \TYPO3\References\Domain\Model\References $reference
	 * @param \array $settings
	 * @return Tx\Extbase\Persistence\QueryResult
	 */
	public function findNextReference(\TYPO3\References\Domain\Model\References $reference, $settings = array()) {
		$query = $this->createQuery();
		
		
		if($settings["categories"]){
			$catList = explode(",", $settings["categories"]);
			if(is_array($catList)){
				$constraints = array();
				foreach ($catList as $cat) {
					$constraints[] = $query->contains("categories", $cat);
				}
			}
			$query->matching(
				$query->logicalAnd(
					$query->greaterThan("sorting", $reference->getSorting()),
					$query->logicalOr($constraints)
				)
			);
		} else {
			$query->matching(
				 $query->greaterThan("sorting", $reference->getSorting())
			);
		}
		
		$query->setOrderings(array('sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING));
		$query->setLimit(1);
		
		return $query->execute();
	}

	/**  
	 * findPreviousReference
	 * @param \TYPO3\References\Domain\Model\References $reference
	 * @param \array $settings
	 * @return Tx_Extbase_Persistence_QueryResult
	 */
	public function findPreviousReference(\TYPO3\References\Domain\Model\References $reference, $settings = array()) {

		$query = $this->createQuery();

		if($settings["categories"]){
			$catList = explode(",", $settings["categories"]);
			if(is_array($catList)){
				$constraints = array();
				foreach ($catList as $cat) {
					$constraints[] = $query->contains("categories", $cat);
				}
			}
			$query->matching(
				$query->logicalAnd(
					$query->lessThan("sorting", $reference->getSorting()),
					$query->logicalOr($constraints)
				)
			);
		} else {
			$query->matching(
				 $query->lessThan("sorting", $reference->getSorting())
			);
		}

		$query->setOrderings(array('sorting' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_DESCENDING));
		$query->setLimit(1);

		return $query->execute();
	}

}
?>