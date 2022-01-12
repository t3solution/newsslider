<?php
declare(strict_types=1);

namespace T3S\Newsslider\Backend\Preview;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Backend\View\BackendLayout\Grid\GridColumnItem;
use TYPO3\CMS\Backend\Preview\StandardContentPreviewRenderer;
use TYPO3\CMS\Core\Service\FlexFormService;

/*
 * This file is part of the TYPO3 extension newsslider.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */
class DefaultPreviewRenderer extends StandardContentPreviewRenderer
{

	/**
	* Dedicated method for rendering preview header HTML for
	* the page module only. Receives $item which is an instance of
	* GridColumnItem which has a getter method to return the record.
	*/
	public function renderPageModulePreviewHeader(GridColumnItem $item): string
	{
		$record = $item->getRecord();
		$itemLabels = $item->getContext()->getItemLabels();
		$outHeader = '';
		$content = parent::renderPageModulePreviewContent($item);

		if (!empty($record['header'])) {
			$infoArr = [];
			parent::getProcessedValue($item, 'header_position,header_layout,header_link', $infoArr);
			$hiddenHeaderNote = '';
			// If header layout is set to 'hidden', display an accordant note:
			if ($record['header_layout'] == 100) {
				$hiddenHeaderNote = ' <em>[' . htmlspecialchars(
				parent::getLanguageService()->sL('LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_layout.I.6')) . ']</em>';
			}
			$outHeader .= $record['date']
				? htmlspecialchars($itemLabels['date'] . ' ' . BackendUtility::date($record['date'])) . '<br />'
				: '';
			$outHeader .= parent::linkEditContent(parent::renderText($record['header']), $record)
				. $hiddenHeaderNote . '<br />';
		}

		$contentTypeLabels = $item->getContext()->getContentTypeLabels();
		$contentType = $contentTypeLabels[$record['CType']];
		$info = '<div style="padding:5px; border: 1px solid #428954; color:#428954; margin-bottom:5px" >'.$contentType.' <strong>News slider</strong></div>';

		return $info.$outHeader;
	}


	/**
	* Dedicated method for rendering preview body HTML for
	* the page module only.
	*/
	public function renderPageModulePreviewContent(GridColumnItem $item): string
	{
		$out = '';
		$record = $item->getRecord();
		$content = parent::renderPageModulePreviewContent($item);

		$contentTypeLabels = $item->getContext()->getContentTypeLabels();
		$contentType = $contentTypeLabels[$record['CType']];

		if (!empty($contentType)) {

			$flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
			$flexconf = $flexFormService->convertFlexFormContentToArray($record['pi_flexform']);

			if ( $record['list_type'] == 'newsslider_flexslider' ) {
				$slider = '<strong>Flexslider</strong> - Style: '.$flexconf['settings']['flexslider']['style'];
				$out .= parent::linkEditContent($slider, $record) . '<br />';
				$out .= 'Startingoint: '.$flexconf['settings']['startingpoint'].'<br />';
				$out .= 'Detail pid: '.$flexconf['settings']['detailPid'];
			}

			if ( $record['list_type'] == 'newsslider_nivoslider' ) {
				$slider = '<strong>Nivoslider</strong> - Theme: '.$flexconf['settings']['nivoslider']['theme'];
				$out .= parent::linkEditContent($slider, $record) . '<br />';
				$out .= 'Startingoint: '.$flexconf['settings']['startingpoint'].'<br />';
				$out .= 'Detail pid: '.$flexconf['settings']['detailPid'];
			}

			if ( $record['list_type'] == 'newsslider_camera' ) {
				$slider = '<strong>Cameraslider</strong>';
				$out .= parent::linkEditContent($slider, $record) . '<br />';
				$out .= 'Startingoint: '.$flexconf['settings']['startingpoint'].'<br />';
				$out .= 'Detail pid: '.$flexconf['settings']['detailPid'];
			}

			if ( $record['list_type'] == 'newsslider_slickslider' ) {
				$slider = '<strong>Slickslider</strong>';
				$out .= parent::linkEditContent($slider, $record) . '<br />';
				$out .= 'Startingoint: '.$flexconf['settings']['startingpoint'].'<br />';
				$out .= 'Detail pid: '.$flexconf['settings']['detailPid'];
			}

			if ( $record['list_type'] == 'newsslider_swiperslider' ) {
				$slider = '<strong>Swiperslider</strong>';
				$out .= parent::linkEditContent($slider, $record) . '<br />';
				$out .= 'Startingoint: '.$flexconf['settings']['startingpoint'].'<br />';
				$out .= 'Detail pid: '.$flexconf['settings']['detailPid'];
			}

			if ( $record['list_type'] == 'newsslider_customslider' ) {
				$slider = '<strong>Customslider</strong>';
				$out .= parent::linkEditContent($slider, $record) . '<br />';
				$out .= 'Startingoint: '.$flexconf['settings']['startingpoint'].'<br />';
				$out .= 'Detail pid: '.$flexconf['settings']['detailPid'];
			}

			if (!empty($record['subheader'])) {
				$out .= parent::linkEditContent(parent::renderText($record['subheader']), $record) . '<br />';
			}

		} else {
			$languageService = parent::getLanguageService();
			$message = sprintf(
				 $languageService->sL('LLL:EXT:core/Resources/Private/Language/locallang_core.xlf:labels.noMatchingValue'),
				 $record['CType']
			);
			$out .= '<span class="label label-warning">' . htmlspecialchars($message) . '</span>';
		}

		return $out;
	}


	/**
	* Dedicated method for wrapping a preview header and body HTML.
	*/
	public function wrapPageModulePreview(string $previewHeader, string $previewContent, GridColumnItem $item): string
	{
			$content = '<span class="exampleContent">' . $previewHeader . $previewContent . '</span>';
			if (!empty($item->isDisabled())) {
				return '<span class="text-muted">' . $content . '</span>';
			}

			return $content;
	}

}
