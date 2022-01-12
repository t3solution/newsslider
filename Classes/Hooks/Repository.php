<?php

namespace T3S\Newsslider\Hooks;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use \GeorgRinger\News\Domain\Repository\NewsRepository;

/*
 * This file is part of the TYPO3 extension newsslider.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */
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
	 */
	protected function updateConstraints(
		$demand,
		$respectEnableFields,
		QueryInterface $query,
		array &$constraints
	) {

		$newsOnly = intval($GLOBALS['TSFE']->tmpl->setup['plugin.']['tx_newsslider.']['settings.']['newsOnly']);

		if ($newsOnly == 1) {
			$constraints[] = $query->equals('type', 0);
		}
	}


}


