<?php
namespace TYPO3\References\Controller;

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
class ReferencesController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * referencesRepository
	 *
	 * @var \TYPO3\References\Domain\Repository\ReferencesRepository
	 * @inject
	 */
	protected $referencesRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$referencess = $this->referencesRepository->findAll($this->settings);
		$this->view->assign('referencess', $referencess);
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\References\Domain\Model\References $references
	 * @return void
	 */
	public function showAction(\TYPO3\References\Domain\Model\References $references) {
		$previousReference = $this->referencesRepository->findPreviousReference($references, $this->settings);
		$nextReference = $this->referencesRepository->findNextReference($references, $this->settings);

		$this->view
			->assign('references', $references)
			->assign('previousReference', $previousReference)
			->assign('nextReference', $nextReference);
	}

	/**
	 * action new
	 *
	 * @param \TYPO3\References\Domain\Model\References $newReferences
	 * @dontvalidate $newReferences
	 * @return void
	 */
	public function newAction(\TYPO3\References\Domain\Model\References $newReferences = NULL) {
		$this->view->assign('newReferences', $newReferences);
	}

	/**
	 * action create
	 *
	 * @param \TYPO3\References\Domain\Model\References $newReferences
	 * @return void
	 */
	public function createAction(\TYPO3\References\Domain\Model\References $newReferences) {
		$this->referencesRepository->add($newReferences);
		$this->flashMessageContainer->add('Your new References was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \TYPO3\References\Domain\Model\References $references
	 * @return void
	 */
	public function editAction(\TYPO3\References\Domain\Model\References $references) {
		$this->view->assign('references', $references);
	}

	/**
	 * action update
	 *
	 * @param \TYPO3\References\Domain\Model\References $references
	 * @return void
	 */
	public function updateAction(\TYPO3\References\Domain\Model\References $references) {
		$this->referencesRepository->update($references);
		$this->flashMessageContainer->add('Your References was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \TYPO3\References\Domain\Model\References $references
	 * @return void
	 */
	public function deleteAction(\TYPO3\References\Domain\Model\References $references) {
		$this->referencesRepository->remove($references);
		$this->flashMessageContainer->add('Your References was removed.');
		$this->redirect('list');
	}

}
?>