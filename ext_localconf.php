<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'TYPO3.' . $_EXTKEY,
	'Swrefs',
	array(
		'References' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'References' => 'create, update, delete',
		
	)
);

?>