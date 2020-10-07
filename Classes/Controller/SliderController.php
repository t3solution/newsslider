<?php

namespace T3S\Newsslider\Controller;

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

use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/**
 * Slider Controller
 *
 * @package TYPO3
 * @subpackage T3S\Newsslider\
 */
class SliderController extends \GeorgRinger\News\Controller\NewsController
{

    /**
     * Output a flexslider view of news
     *
     * @param array $overwriteDemand
     * @return return string the Rendered view
     */
    public function flexsliderAction(array $overwriteDemand = null)
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
    }

    /**
     * Output a nivolider view of news
     *
     * @param array $overwriteDemand
     * @return return string the Rendered view
     */
    public function nivosliderAction(array $overwriteDemand = null)
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
    }

    /**
     * Output a camera slideshow view of news
     *
     * @param array $overwriteDemand
     * @return return string the Rendered view
     */
    public function cameraAction(array $overwriteDemand = null)
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
    }

    /**
     * Output a slick slider view of news
     *
     * @param array $overwriteDemand
     * @return return string the Rendered view
     */
    public function slicksliderAction(array $overwriteDemand = null)
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
    }

    /**
     * Output a coustom slider view of news
     *
     * @param array $overwriteDemand
     * @return return string the Rendered view
     */
    public function customsliderAction(array $overwriteDemand = null)
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
    }

}
