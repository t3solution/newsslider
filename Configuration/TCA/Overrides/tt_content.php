<?php

defined('TYPO3') or die();

(static function() {

	/***************
	 * Add plugin Flex slider to list
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		'Newsslider',
		'flexslider',
		'Flexslider (jQuery)',
		'EXT:newsslider/Resources/Public/Icons/Extension.svg',
		'News slider'
	);

	$pluginSignature = 'newsslider_flexslider';
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
		 $pluginSignature,
		 'FILE:EXT:newsslider/Configuration/FlexForms/Flexslider.xml'
	);
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['newsslider_flexslider'] = 'layout,select_key,pages,recursive';
	$GLOBALS['TCA']['tt_content']['types']['list']['previewRenderer'][$pluginSignature] = \T3S\Newsslider\Backend\Preview\DefaultPreviewRenderer::class;


	/***************
	 * Add plugin Nivo slider to list
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		'Newsslider',
		'nivoslider',
		'Nivoslider (jQuery)',
		'EXT:newsslider/Resources/Public/Icons/Extension.svg',
		'News slider'
	);

	$pluginSignature = 'newsslider_nivoslider';
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
		 $pluginSignature,
		 'FILE:EXT:newsslider/Configuration/FlexForms/Nivoslider.xml'
	);
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
	$GLOBALS['TCA']['tt_content']['types']['list']['previewRenderer'][$pluginSignature] = \T3S\Newsslider\Backend\Preview\DefaultPreviewRenderer::class;


	/***************
	 * Add plugin Camera slider to list
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		'Newsslider',
		'camera',
		'Cameraslider (jQuery)',
		'EXT:newsslider/Resources/Public/Icons/Extension.svg',
		'News slider'
	);

	$pluginSignature = 'newsslider_camera';
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
		 $pluginSignature,
		 'FILE:EXT:newsslider/Configuration/FlexForms/Cameraslider.xml'
	);
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
	$GLOBALS['TCA']['tt_content']['types']['list']['previewRenderer'][$pluginSignature] = \T3S\Newsslider\Backend\Preview\DefaultPreviewRenderer::class;


	/***************
	 * Add plugin Slick slider to list
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		'Newsslider',
		'slickslider',
		'Slickslider (jQuery)',
		'EXT:newsslider/Resources/Public/Icons/Extension.svg',
		'News slider'
	);

	$pluginSignature = 'newsslider_slickslider';
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
		 $pluginSignature,
		 'FILE:EXT:newsslider/Configuration/FlexForms/Slickslider.xml'
	);
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
	$GLOBALS['TCA']['tt_content']['types']['list']['previewRenderer'][$pluginSignature] = \T3S\Newsslider\Backend\Preview\DefaultPreviewRenderer::class;


	/***************
	 * Add plugin Swiper slider to list
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		'Newsslider',
		'swiperslider',
		'Swiperslider - The Most Modern Mobile Touch Slider (NEW with v5)',
		'EXT:newsslider/Resources/Public/Icons/Extension.svg',
		'News slider'
	);

	$pluginSignature = 'newsslider_swiperslider';
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
		 $pluginSignature,
		 'FILE:EXT:newsslider/Configuration/FlexForms/Swiperslider.xml'
	);
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
	$GLOBALS['TCA']['tt_content']['types']['list']['previewRenderer'][$pluginSignature] = \T3S\Newsslider\Backend\Preview\DefaultPreviewRenderer::class;


	/***************
	 * Add plugin Custom slider to list
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		'Newsslider',
		'customslider',
		'Customslider',
		'EXT:newsslider/Resources/Public/Icons/Extension.svg',
		'News slider'
	);

	$pluginSignature = 'newsslider_customslider';
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
		 $pluginSignature,
		 'FILE:EXT:newsslider/Configuration/FlexForms/Customslider.xml'
	);
	$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages,recursive';
	$GLOBALS['TCA']['tt_content']['types']['list']['previewRenderer'][$pluginSignature] = \T3S\Newsslider\Backend\Preview\DefaultPreviewRenderer::class;

})();
