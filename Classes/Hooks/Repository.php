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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use \GeorgRinger\News\Domain\Repository\NewsRepository;

class Repository
{

    public function modify(array $params, $newsRepository)
    {

        if ($newsRepository instanceof NewsRepository) {

            $this->updateConstraints($params['demand'], $params['respectEnableFields'], $params['query'],
                $params['constraints']);
        }
    }

    /**
     * @param \GeorgRinger\News\Domain\Model\Dto\NewsDemand $demand
     * @param bool $respectEnableFields
     * @param \TYPO3\CMS\Extbase\Persistence\QueryInterface $query
     * @param array $constraints
     */
    protected function updateConstraints(
        $demand,
        $respectEnableFields,
        \TYPO3\CMS\Extbase\Persistence\QueryInterface $query,
        array &$constraints
    ) {

        $newsOnly = intval($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_newsslider.']['settings.']['newsOnly']);

        if ($newsOnly == 1) {
            $constraints[] = $query->equals('type', 0);
        }
    }


}


