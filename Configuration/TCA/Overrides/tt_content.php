<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

/***************
 * Add plugin to list
 */
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'T3S.newsslider',
    'Pi1',
    'News slider'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['newsslider_pi1'] = 'layout,select_key,pages,recursive';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['newsslider_pi1'] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('newsslider_pi1',
    'FILE:EXT:newsslider/Configuration/FlexForms/flexform_slider.xml');
