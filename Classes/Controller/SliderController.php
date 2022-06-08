<?php
declare(strict_types=1);

namespace T3S\Newsslider\Controller;

use GeorgRinger\News\Controller\NewsController;
use Psr\Http\Message\ResponseInterface;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/*
 * This file is part of the TYPO3 extension newsslider.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */
class SliderController extends NewsController
{

	/**
	 * Output a flexslider view of news
	 *
	 */
	public function flexsliderAction(array $overwriteDemand = null): ResponseInterface
	{

		$demand = parent::createDemandObjectFromSettings($this->settings);

		if ($this->settings['disableOverrideDemand'] != 1 && $overwriteDemand !== null) {
			$demand = parent::overwriteDemandObject($demand, $overwriteDemand);
		}

		$assignedValues = [
			'news' => $this->newsRepository->findDemanded($demand),
			'settings' => $this->settings
		];
		$this->view->assignMultiple($assignedValues);
		return $this->htmlResponse();
	}

	/**
	 * Output a nivolider view of news
	 *
	 */
	public function nivosliderAction(array $overwriteDemand = null): ResponseInterface
	{

		$demand = parent::createDemandObjectFromSettings($this->settings);

		if ($this->settings['disableOverrideDemand'] != 1 && $overwriteDemand !== null) {
			$demand = parent::overwriteDemandObject($demand, $overwriteDemand);
		}

		$assignedValues = [
			'news' => $this->newsRepository->findDemanded($demand),
			'settings' => $this->settings
		];
		$this->view->assignMultiple($assignedValues);
		return $this->htmlResponse();
	}

	/**
	 * Output a camera slideshow view of news
	 *
	 */
	public function cameraAction(array $overwriteDemand = null): ResponseInterface
	{

		$demand = parent::createDemandObjectFromSettings($this->settings);

		if ($this->settings['disableOverrideDemand'] != 1 && $overwriteDemand !== null) {
			$demand = parent::overwriteDemandObject($demand, $overwriteDemand);
		}

		$assignedValues = [
			'news' => $this->newsRepository->findDemanded($demand),
			'settings' => $this->settings
		];
		$this->view->assignMultiple($assignedValues);
		return $this->htmlResponse();
	}

	/**
	 * Output a slick slider view of news
	 *
	 */
	public function slicksliderAction(array $overwriteDemand = null): ResponseInterface
	{

		$demand = parent::createDemandObjectFromSettings($this->settings);

		if ($this->settings['disableOverrideDemand'] != 1 && $overwriteDemand !== null) {
			$demand = parent::overwriteDemandObject($demand, $overwriteDemand);
		}

		$width = (int)$this->settings['slickslider']['width'];
		$slidesToShow = (int)$this->settings['slickslider']['slidesToShow'] ?: 1;
		$width = ceil($width / $slidesToShow);
		$ratio = explode(':', $this->settings['slickslider']['ratio']);
		$height = ceil(($width / (int)$ratio[0]) * (int)$ratio[1]);

		$this->settings['slickslider']['width'] = $width;
		$this->settings['slickslider']['height'] = $height;

		$assignedValues = [
			'news' => $this->newsRepository->findDemanded($demand),
			'settings' => $this->settings
		];
		$this->view->assignMultiple($assignedValues);
		return $this->htmlResponse();
	}

	/**
	 * Output a swiper slider view of news
	 *
	 */
	public function swipersliderAction(array $overwriteDemand = null): ResponseInterface
	{

		$demand = parent::createDemandObjectFromSettings($this->settings);

		if ($this->settings['disableOverrideDemand'] != 1 && $overwriteDemand !== null) {
			$demand = parent::overwriteDemandObject($demand, $overwriteDemand);
		}

		$ratio = $this->settings['swiperslider']['ratio'] ?: '16:9';
		$ratio = explode(':', $ratio);
		$width = (int)$this->settings['swiperslider']['width'];
		$height = ceil(($width / (int)$ratio[0]) * (int)$ratio[1]);

		$this->settings['swiperslider']['width'] = $width;
		$this->settings['swiperslider']['height'] = $height;

		if ( $this->settings['swiperslider']['autoplay'] ) {
			$this->settings['swiperslider']['autodelay'] = $this->settings['swiperslider']['delay'] ?: 3000;
		}

		$t3sbootstrapLocal = FALSE;
		if ( ExtensionManagementUtility::isLoaded('t3sbootstrap') && !$this->settings['cdn'] ) {
			$t3sbootstrapLocal = TRUE;
		}

		$assignedValues = [
			'news' => $this->newsRepository->findDemanded($demand),
			'settings' => $this->settings,
			't3sbootstrapLocal' => $t3sbootstrapLocal
		];
		$this->view->assignMultiple($assignedValues);
		return $this->htmlResponse();
	}

	/**
	 * Output a coustom slider view of news
	 *
	 */
	public function customsliderAction(array $overwriteDemand = null): ResponseInterface
	{

		$demand = parent::createDemandObjectFromSettings($this->settings);

		if ($this->settings['disableOverrideDemand'] != 1 && $overwriteDemand !== null) {
			$demand = parent::overwriteDemandObject($demand, $overwriteDemand);
		}

		$assignedValues = [
			'news' => $this->newsRepository->findDemanded($demand),
			'settings' => $this->settings
		];
		$this->view->assignMultiple($assignedValues);
		return $this->htmlResponse();
	}

}
