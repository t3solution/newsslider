<?php

namespace T3S\Newsslider\ViewHelpers;

use FluidTYPO3\Vhs\Asset;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/*
 * This file is part of the TYPO3 extension newsslider.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */
class InlineJsViewHelper extends AbstractViewHelper
{

	use CompileWithRenderStatic;

	/**
	 * Arguments Initialization
	 */
	public function initializeArguments()
	{
		$this->registerArgument('contentObjectUid', 'integer', 'Uid of the content element', true);
		$this->registerArgument('action', 'string', 'Current action', false, false);
		$this->registerArgument('settings', 'array', 'Slider settings', false);
	}

	public static function renderStatic(
		array $arguments,
		\Closure $renderChildrenClosure,
		RenderingContextInterface $renderingContext
	) {

		$contentObjectUid = $arguments['contentObjectUid'];
		$action = $arguments['action'];
		$settings = $arguments['settings'];

		$name = ' JS for news slider CE-' . $contentObjectUid . ' ';
		$queryNoConflict = $settings['jqueryNoConflict'] ? 'jQuery.noConflict(); jQuery' : 'jQuery';

		switch ($action) {
			case 'flexslider':
				// script-options
				# 8 = 2*4 .flexslider border
				$settings['flexslider']['thumbnumber'] = $settings['flexslider']['thumbnumber'] ? $settings['flexslider']['thumbnumber'] : 3;
				$itemWidth = intval(round(($settings['flexslider']['width'] - 8 - ($settings['flexslider']['thumbnumber'] *
							$settings['flexslider']['itemMargin'] - $settings['flexslider']['itemMargin'])) / $settings['flexslider']['thumbnumber']));
				$carousel = '';
				if ($settings['flexslider']['style'] == 2) {
					$options = 'controlNav:\'thumbnails\',';
				} else {
					$options = $settings['flexslider']['controlNav'] ? '' : 'controlNav:false,';
				}
				if ($settings['flexslider']['style'] == 3) {
					$carousel_options = 'animation:\'slide\',';
					$carousel_options .= 'controlNav:false,';
					$carousel_options .= 'animationLoop:false,';
					$carousel_options .= 'slideshow:false,';
					$carousel_options .= 'itemWidth:' . $itemWidth . ',';
					$carousel_options .= 'itemMargin:' . $settings['flexslider']['itemMargin'] . ',';
					$carousel_options .= 'asNavFor:\'#flexslider_' . $contentObjectUid . '\'';
					$carousel = 'jQuery(\'#carousel_' . $contentObjectUid . '\').flexslider({' . $carousel_options . '});';

					$options = 'controlNav:false,';
					$options .= 'slideshow:false,';
					$options .= 'animationLoop:false,';
					$options .= 'sync:\'#carousel_' . $contentObjectUid . '\',';
					$options .= $settings['flexslider']['animation'] == 'fade' ? '' : 'animation:\'slide\',';
				} else {
					$options .= $settings['flexslider']['slideshow'] ? '' : 'slideshow:false,';
					if ($settings['flexslider']['style'] == 4) {
						$options .= 'animationLoop:false,';
						$options .= 'animation:\'slide\',';
						$options .= 'itemWidth:' . $itemWidth . ',';
						$options .= 'itemMargin:' . $settings['flexslider']['itemMargin'] . ',';
					} else {
						if ($settings['flexslider']['style'] == 5) {
							$options .= 'animationLoop:false,';
							$options .= 'animation:\'slide\',';
							$options .= 'itemWidth:' . $itemWidth . ',';
							$options .= 'itemMargin:' . $settings['flexslider']['itemMargin'] . ',';
							$options .= 'minItems:' . intval($settings['flexslider']['minItems']) . ',';
							$options .= 'maxItems:' . intval($settings['flexslider']['maxItems']) . ',';
						} else {
							$options .= $settings['flexslider']['animationLoop'] == 'true' ? '' : 'animationLoop:false,';
							$options .= $settings['flexslider']['animation'] == 'fade' ? '' : 'animation:\'slide\',';
						}
					}
				}
				$options .= $settings['flexslider']['startAt'] == 0 ? '' : 'startAt:' . intval($settings['flexslider']['startAt']) . ',';
				$options .= $settings['flexslider']['slideshowSpeed'] == 7000 ? '' : 'slideshowSpeed:' . intval($settings['flexslider']['slideshowSpeed']) . ',';
				$options .= $settings['flexslider']['animationSpeed'] == 600 ? '' : 'animationSpeed:' . intval($settings['flexslider']['animationSpeed']) . ',';
				$options .= $settings['flexslider']['pauseOnAction'] == 'true' ? '' : 'pauseOnAction:false,';
				$options .= $settings['flexslider']['pauseOnHover'] == 'false' ? '' : 'pauseOnHover:true,';
				$options .= $settings['flexslider']['useCSS'] == 'true' ? '' : 'useCSS:false,';
				$options .= $settings['flexslider']['touch'] == 'true' ? '' : 'touch:false,';
				$options .= $settings['flexslider']['easing'] == 'swing' ? '' : 'easing:\'' . $settings['flexslider']['easing'] . '\',';
				$options .= $settings['flexslider']['direction'] == 'horizontal' ? '' : 'direction:\'vertical\',';
				$options .= $settings['flexslider']['reverse'] == 'false' ? '' : 'reverse:true,';
				$options .= $settings['flexslider']['smoothHeight'] == 'false' ? '' : 'smoothHeight:true,';
				$options .= $settings['flexslider']['initDelay'] == 0 ? '' : 'initDelay:' . intval($settings['flexslider']['initDelay']) . ',';
				$options .= $settings['flexslider']['randomize'] == 'false' ? '' : 'randomize:true,';
				$options .= $settings['flexslider']['video'] == 'false' ? '' : 'video:true,';
				$options .= $settings['flexslider']['prevText'] == 'Previous' ? '' : 'prevText:\'' . $settings['flexslider']['prevText'] . '\',';
				$options .= $settings['flexslider']['nextText'] == 'Next' ? '' : 'nextText:\'' . $settings['flexslider']['nextText'] . '\',';
				$options .= $settings['flexslider']['keyboard'] == 'true' ? '' : 'keyboard:false,';
				$options .= $settings['flexslider']['multipleKeyboard'] == 'false' ? '' : 'multipleKeyboard:true,';
				$options .= $settings['flexslider']['mousewheel'] == 'false' ? '' : 'mousewheel:true,';
				$options .= $settings['flexslider']['pausePlay'] == 'false' ? '' : 'pausePlay:true,';
				$options .= $settings['flexslider']['pauseText'] == 'Pause' ? '' : 'pauseText:\'' . $settings['flexslider']['pauseText'] . '\',';
				$options .= $settings['flexslider']['playText'] == 'Play' ? '' : 'playText:\'' . $settings['flexslider']['playText'] . '\',';
				$options .= $settings['flexslider']['move'] == 0 ? '' : 'move:' . intval($settings['flexslider']['move']) . ',';
				$options .= $settings['flexslider']['directionNav'] ? 'directionNav:true' : 'directionNav:false';

				$inlineJS = $queryNoConflict . '(function(){
				jQuery(\'#flexslider_' . $contentObjectUid . '\').flexslider({' . $options . '});
				' . $carousel . '
				});';

				break;
			case 'nivoslider':
				$function = '';
				if ($settings['nivoslider']['captions'] == 2) {
					// animated captions
					$inWidth = $settings['nivoslider']['captionMoveIn']['width'];
					$inHeight = $settings['nivoslider']['captionMoveIn']['height'];
					$inFontSize = $settings['nivoslider']['captionMoveIn']['fontSize'];
					$inLeft = $settings['nivoslider']['captionMoveIn']['left'];
					$inTop = $settings['nivoslider']['captionMoveIn']['top'];
					$inDuration = $settings['nivoslider']['captionMoveIn']['duration'];
					$outWidth = $settings['nivoslider']['captionMoveOut']['width'];
					$outHeight = $settings['nivoslider']['captionMoveOut']['height'];
					$outFontSize = $settings['nivoslider']['captionMoveOut']['fontSize'];
					$outLeft = $settings['nivoslider']['captionMoveOut']['left'];
					$outTop = $settings['nivoslider']['captionMoveOut']['top'];
					$outDuration = $settings['nivoslider']['captionMoveOut']['duration'];

					$function = '
					function captionMoveIn() {
					jQuery(\'.nivo-caption\')
					.fadeIn(10)
					.animate({width: "' . $inWidth . '",height: "' . $inHeight . '",fontSize:"' . $inFontSize . '",left: "' . $inLeft . '",top:"' . $inTop . '"},' . $inDuration . ')
					;};

					function captionMoveOut() {
					jQuery(\'.nivo-caption\')
					.fadeOut(500)
					.animate({width: "' . $outWidth . '",height: "' . $outHeight . '",fontSize:"' . $outFontSize . '",left: "' . $outLeft . '",top:"' . $outTop . '"},' . $outDuration . ')
					;};

					function bulletsIntro() {
					jQuery(\'.nivo-controlNav a\')
					.animate({marginRight: "-62px"},500)
					.animate({marginRight: "4px"},1000)
					;};

					function hideHeight() {
					jQuery(\'.slider-wrapper\').css("height", "auto");
					};

					';
				}
				// script-options
				$options = $settings['nivoslider']['controlNav'] ? '' : 'controlNav:false,';
				$options .= $settings['nivoslider']['manualAdvance'] ? '' : 'manualAdvance:true,';
				$options .= $settings['nivoslider']['effect'] == 'random' ? '' : 'effect:\'' . $settings['nivoslider']['effect'] . '\',';
				$options .= $settings['nivoslider']['slices'] == 15 ? '' : 'slices:' . $settings['nivoslider']['slices'] . ',';
				$options .= $settings['nivoslider']['boxCols'] == 8 ? '' : 'boxCols:' . $settings['nivoslider']['boxCols'] . ',';
				$options .= $settings['nivoslider']['boxRows'] == 4 ? '' : 'boxRows:' . $settings['nivoslider']['boxRows'] . ',';
				$options .= $settings['nivoslider']['animSpeed'] == 500 ? '' : 'animSpeed:' . $settings['nivoslider']['animSpeed'] . ',';
				$options .= $settings['nivoslider']['pauseTime'] == 3000 ? '' : 'pauseTime:' . $settings['nivoslider']['pauseTime'] . ',';
				$options .= $settings['nivoslider']['startSlide'] == 0 ? '' : 'startSlide:' . $settings['nivoslider']['startSlide'] . ',';
				$options .= $settings['nivoslider']['pauseOnHover'] == 'true' ? '' : 'pauseOnHover:false,';
				$options .= $settings['nivoslider']['randomStart'] == 'false' ? '' : 'randomStart:true,';
				$options .= $settings['nivoslider']['prevText'] == 'Prev' ? '' : 'prevText:\'' . $settings['nivoslider']['prevText'] . '\',';
				$options .= $settings['nivoslider']['nextText'] == 'Next' ? '' : 'nextText:\'' . $settings['nivoslider']['nextText'] . '\',';
				$options .= $settings['nivoslider']['directionNav'] ? 'directionNav:true' : 'directionNav:false';

				if ($settings['nivoslider']['captions'] == 2) {
					$options .= ', afterLoad: function(){captionMoveIn();bulletsIntro();hideHeight();},';
					$options .= ' beforeChange: function(){captionMoveOut();captionMoveIn();}';
				}

				$inlineJS = $queryNoConflict . '(window).on("load", function() {
						jQuery("#slider_' . $contentObjectUid . '").nivoSlider({' . $options . '});
				});';

				break;
			case 'camera':
				$options = (int)$settings['camera']['time'] == 7000 ? '' : 'time:' . (int)$settings['camera']['time'] . ',';
				$options .= (int)$settings['camera']['cols'] == 6 ? '' : 'cols:' . (int)$settings['camera']['cols'] . ',';
				$options .= (int)$settings['camera']['transPeriod'] == 1500 ? '' : 'transPeriod:' . (int)$settings['camera']['transPeriod'] . ',';
				$options .= (int)$settings['camera']['gridDifference'] == 250 ? '' : 'gridDifference:' . (int)$settings['camera']['gridDifference'] . ',';
				$options .= $settings['camera']['loaderOpacity'] == '.8' ? '' : 'loaderOpacity:' . $settings['camera']['loaderOpacity'] . ',';
				$options .= (int)$settings['camera']['loaderPadding'] == 2 ? '' : 'loaderPadding:' . $settings['camera']['loaderPadding'] . ',';
				$options .= (int)$settings['camera']['loaderStroke'] == 7 ? '' : 'loaderStroke:' . (int)$settings['camera']['loaderStroke'] . ',';
				$options .= (int)$settings['camera']['pieDiameter'] == 38 ? '' : 'pieDiameter:' . (int)$settings['camera']['pieDiameter'] . ',';
				$options .= (int)$settings['camera']['rows'] == 4 ? '' : 'rows:' . (int)$settings['camera']['rows'] . ',';
				$options .= (int)$settings['camera']['slicedCols'] == 12 ? '' : 'slicedCols:' . (int)$settings['camera']['slicedCols'] . ',';
				$options .= (int)$settings['camera']['slicedRows'] == 8 ? '' : 'slicedRows:' . (int)$settings['camera']['slicedRows'] . ',';
				$options .= $settings['camera']['alignment'] == 'center' ? '' : 'alignment:\'' . $settings['camera']['alignment'] . '\',';
				$options .= $settings['camera']['barDirection'] == 'leftToRight' ? '' : 'barDirection:\'' . $settings['camera']['barDirection'] . '\',';
				$options .= $settings['camera']['barPosition'] == 'bottom' ? '' : 'barPosition:\'' . $settings['camera']['barPosition'] . '\',';
				$options .= $settings['camera']['easing'] == 'easeInOutExpo' ? '' : 'easing:\'' . $settings['camera']['easing'] . '\',';
				$options .= $settings['camera']['mobileEasing'] == '' ? '' : 'mobileEasing:\'' . $settings['camera']['mobileEasing'] . '\',';
				$options .= $settings['camera']['fx'] == 'random' ? '' : 'fx:\'' . $settings['camera']['fx'] . '\',';
				$options .= $settings['camera']['mobileFx'] == '' ? '' : 'mobileFx:\'' . $settings['camera']['mobileFx'] . '\',';
				$options .= $settings['camera']['imagePath'] == 'images/' ? '' : 'imagePath:\'' . $settings['camera']['imagePath'] . '\',';
				$options .= $settings['camera']['loader'] == 'pie' ? '' : 'loader:\'' . $settings['camera']['loader'] . '\',';
				$options .= $settings['camera']['loaderColor'] == '#eeeeee' ? '' : 'loaderColor:\'' . $settings['camera']['loaderColor'] . '\',';
				$options .= $settings['camera']['loaderBgColor'] == '#222222' ? '' : 'loaderBgColor:\'' . $settings['camera']['loaderBgColor'] . '\',';
				$options .= $settings['camera']['minHeight'] == '200px' ? '' : 'minHeight:\'' . $settings['camera']['minHeight'] . '\',';
				$options .= $settings['camera']['piePosition'] == 'rightTop' ? '' : 'piePosition:\'' . $settings['camera']['piePosition'] . '\',';
				$options .= $settings['camera']['slideOn'] == 'random' ? '' : 'slideOn:\'' . $settings['camera']['slideOn'] . '\',';
				$options .= $settings['camera']['height'] == '50%' ? '' : 'height:\'' . $settings['camera']['height'] . '\',';
				$options .= $settings['camera']['autoAdvance'] == '1' ? '' : 'autoAdvance:false,';
				$options .= $settings['camera']['pagination'] == '1' ? '' : 'pagination:false,';
				$options .= $settings['camera']['navigation'] == '1' ? '' : 'navigation:false,';
				$options .= $settings['camera']['playPause'] == '1' ? '' : 'playPause:false,';
				$options .= $settings['camera']['mobileAutoAdvance'] == '1' ? '' : 'mobileAutoAdvance:false,';
				$options .= $settings['camera']['hover'] == '1' ? '' : 'hover:false,';
				$options .= $settings['camera']['navigation'] == '1' ? '' : 'navigation:false,';
				$options .= $settings['camera']['navigationHover'] == '1' ? '' : 'navigationHover:false,';
				$options .= $settings['camera']['mobileNavHover'] == '1' ? '' : 'mobileNavHover:false,';
				$options .= $settings['camera']['overlayer'] == '1' ? '' : 'overlayer:false,';
				$options .= $settings['camera']['pauseOnClick'] == '1' ? '' : 'pauseOnClick:false,';
				$options .= $settings['camera']['portrait'] == '0' ? '' : 'portrait:true,';
				$options .= $settings['camera']['thumbnails'] == '0' ? '' : 'thumbnails:true,';

				$inlineJS = $queryNoConflict . '(function(){
				jQuery(\'#camera_wrap_' . $contentObjectUid . '\').camera({' . $options . '});
				});';

				break;
			case 'slickslider':

				$responsive = 'responsive: [{breakpoint: 992,settings: {slidesToShow: ' . (int)$settings['slickslider']['slidesToShow'] . ',slidesToScroll: ' . (int)$settings['slickslider']['slidesToScroll'] . '}},{breakpoint: 768,settings: {slidesToShow: 2,slidesToScroll: 2}},{breakpoint: 576,settings: {slidesToShow: 1,slidesToScroll: 1}}],';

				$options = (int)$settings['slickslider']['autoplay'] == 0 ? '' : 'autoplay: true,';
				$options .= (int)$settings['slickslider']['autoplaySpeed'] == 3000 ? '' : 'autoplaySpeed:' . (int)$settings['slickslider']['autoplaySpeed'] . ',';
				$options .= (int)$settings['slickslider']['speed'] == 300 ? '' : 'speed:' . (int)$settings['slickslider']['speed'] . ',';
				$options .= (int)$settings['slickslider']['slidesToShow'] == 1 ? '' : 'slidesToShow:' . (int)$settings['slickslider']['slidesToShow'] . ',';
				$options .= (int)$settings['slickslider']['slidesToScroll'] == 1 ? '' : 'slidesToScroll:' . (int)$settings['slickslider']['slidesToScroll'] . ',';
				$options .= (int)$settings['slickslider']['infinite'] == 1 ? '' : 'infinite: false,';
				$options .= (int)$settings['slickslider']['dots'] == 0 ? '' : 'dots: true,';
				$options .= (int)$settings['slickslider']['responsive'] == 0 ? '' : $responsive;

				$equal = '';
				if ($settings['slickslider']['equal']) {
					$equal = '

$(\'.t3s-slickslider\').on(\'setPosition\', function () {
var slickTrack = $(this).find(\'.slick-track\');
var slickTrackHeight = $(slickTrack).height();

$(slickTrack).find(\'.card\').css(\'height\', slickTrackHeight + \'px\');
});
					';
				}

				$inlineJS = $queryNoConflict . '
(function(){jQuery(\'#slick_wrap_' . $contentObjectUid . '\').slick({' . substr($options, 0, -1) . '});' . $equal . '});
				';

				break;
			case 'customslider':

				$inlineJS = $settings['customslider']['inlineJs'];

				break;
		}

		if (ExtensionManagementUtility::isLoaded('vhs')) {
			$asset = Asset::getInstance();
			$asset->setType('js');
			$asset->setName($name);
			$asset->setContent($function . $inlineJS);
			$asset->finalize();
		} else {
			$pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);

			$pageRenderer->addJsFooterInlineCode($name, $function . $inlineJS);
		}
	}
}
