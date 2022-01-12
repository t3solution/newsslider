<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

(static function() {

	ExtensionManagementUtility::addStaticFile('newsslider', 'Configuration/TypoScript','News slider');

})();
