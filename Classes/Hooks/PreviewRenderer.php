<?php

namespace T3S\Newsslider\Hooks;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;
use TYPO3\CMS\Backend\View\PageLayoutView;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Service\FlexFormService;

/**
 * Contains a preview rendering for the page module of CType="t3sbs_thumbnails"
 */
class PreviewRenderer implements PageLayoutViewDrawItemHookInterface
{

    /**
     * Preprocesses the preview rendering of "newsslider_pi1"
     *
     * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject Calling parent object
     * @param bool $drawItem Whether to draw the item using the default functionality
     * @param string $headerContent Header content
     * @param string $itemContent Item content
     * @param array $row Record row of tt_content
     * @return void
     */
    public function preProcess(
        PageLayoutView &$parentObject,
        &$drawItem,
        &$headerContent,
        &$itemContent,
        array &$row
    ) {

        if ($row['list_type'] === 'newsslider_pi1') {

            $flexFormService = GeneralUtility::makeInstance(FlexFormService::class);
            $flexconf = $flexFormService->convertFlexFormContentToArray($row['pi_flexform']);

            $action = GeneralUtility::trimExplode('->', $flexconf['switchableControllerActions']);
            $action = ucfirst($action[1]);

            $startingpoint = $flexconf['settings']['startingpoint'];
            $itemContent = $parentObject->linkEditContent('<strong>News slider</strong>', $row) . ' <br />';

            if ($action) {
                $itemContent .= $parentObject->linkEditContent($parentObject->renderText($action), $row) . ' <br />';
            }
            if ($startingpoint) {
                $itemContent .= $parentObject->linkEditContent('Startingpoint: ' . $startingpoint, $row);
            }

            $drawItem = false;
        }
    }
}
