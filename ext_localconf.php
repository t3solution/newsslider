<?php

defined('TYPO3') or die();

(static function() {

	/***************
	 * Make plugin available in frontend
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Newsslider',
		'flexslider',
		[
			\T3S\Newsslider\Controller\SliderController::class => 'flexslider',
		],
		// non-cacheable actions
		[
			\T3S\Newsslider\Controller\SliderController::class => '',
		]
	);

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Newsslider',
		'nivoslider',
		[
			\T3S\Newsslider\Controller\SliderController::class => 'nivoslider',
		],
		// non-cacheable actions
		[
			\T3S\Newsslider\Controller\SliderController::class => '',
		]
	);


	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Newsslider',
		'camera',
		[
			\T3S\Newsslider\Controller\SliderController::class => 'camera',
		],
		// non-cacheable actions
		[
			\T3S\Newsslider\Controller\SliderController::class => '',
		]
	);

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Newsslider',
		'slickslider',
		[
			\T3S\Newsslider\Controller\SliderController::class => 'slickslider',
		],
		// non-cacheable actions
		[
			\T3S\Newsslider\Controller\SliderController::class => '',
		]
	);

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Newsslider',
		'customslider',
		[
			\T3S\Newsslider\Controller\SliderController::class => 'customslider',
		],
		// non-cacheable actions
		[
			\T3S\Newsslider\Controller\SliderController::class => '',
		]
	);

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'Newsslider',
		'swiperslider',
		[
			\T3S\Newsslider\Controller\SliderController::class => 'swiperslider',
		],
		// non-cacheable actions
		[
			\T3S\Newsslider\Controller\SliderController::class => '',
		]
	);

	if (($GLOBALS['TYPO3_REQUEST'] ?? null) instanceof \Psr\Http\Message\ServerRequestInterface
		 && \TYPO3\CMS\Core\Http\ApplicationType::fromRequest($GLOBALS['TYPO3_REQUEST'])->isBackend()
	) {
		/***************
		 * Register Icons
		 */
		$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
		$iconRegistry->registerIcon(
			'tx-newsslider-icon',
			\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
			['source' => 'EXT:newsslider/Resources/Public/Icons/Extension.svg']
		);
	}

	/***************
	 * Override preview of tt_content elements in page module
	 */
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['features']['fluidBasedPageModule'] = true;
	$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['backend']['previewRendererResolver'] = \TYPO3\CMS\Backend\Preview\StandardPreviewRendererResolver::class;

})();
