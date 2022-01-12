<?php

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Http\ApplicationType;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use T3S\Newsslider\Controller\SliderController;
use TYPO3\CMS\Backend\Preview\StandardPreviewRendererResolver;

defined('TYPO3') or die();

(static function() {

	/***************
	 * Make plugin available in frontend
	 */
	ExtensionUtility::configurePlugin(
		'Newsslider',
		'flexslider',
		[
			SliderController::class => 'flexslider',
		],
		// non-cacheable actions
		[
			SliderController::class => '',
		]
	);

	ExtensionUtility::configurePlugin(
		'Newsslider',
		'nivoslider',
		[
			SliderController::class => 'nivoslider',
		],
		// non-cacheable actions
		[
			SliderController::class => '',
		]
	);


	ExtensionUtility::configurePlugin(
		'Newsslider',
		'camera',
		[
			SliderController::class => 'camera',
		],
		// non-cacheable actions
		[
			SliderController::class => '',
		]
	);

	ExtensionUtility::configurePlugin(
		'Newsslider',
		'slickslider',
		[
			SliderController::class => 'slickslider',
		],
		// non-cacheable actions
		[
			SliderController::class => '',
		]
	);

	ExtensionUtility::configurePlugin(
		'Newsslider',
		'customslider',
		[
			SliderController::class => 'customslider',
		],
		// non-cacheable actions
		[
			SliderController::class => '',
		]
	);

	ExtensionUtility::configurePlugin(
		'Newsslider',
		'swiperslider',
		[
			SliderController::class => 'swiperslider',
		],
		// non-cacheable actions
		[
			SliderController::class => '',
		]
	);


	$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['Domain/Repository/AbstractDemandedRepository.php']['findDemanded']['newsslider'] =
		'T3S\\Newsslider\\Hooks\\Repository->modify';


	if (($GLOBALS['TYPO3_REQUEST'] ?? null) instanceof ServerRequestInterface
		 && ApplicationType::fromRequest($GLOBALS['TYPO3_REQUEST'])->isBackend()
	) {
		/***************
		 * Register Icons
		 */
		$iconRegistry = GeneralUtility::makeInstance(IconRegistry::class);
		$iconRegistry->registerIcon(
			'tx-newsslider-icon',
			SvgIconProvider::class,
			['source' => 'EXT:newsslider/Resources/Public/Icons/Extension.svg']
		);
	}

	/***************
	 * Override preview of tt_content elements in page module
	 */
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['features']['fluidBasedPageModule'] = true;
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['backend']['previewRendererResolver'] = StandardPreviewRendererResolver::class;

})();
