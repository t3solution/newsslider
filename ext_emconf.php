<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "newsslider".
 * Auto generated 09-01-2020 10:40
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
    'title' => 'News slider',
    'description' => 'jQuery slider-plugins for versatile news extension (tx_news).',
    'category' => 'plugin',
    'version' => '4.2.0',
    'state' => 'stable',
    'uploadfolder' => false,
    'createDirs' => '',
    'clearcacheonload' => false,
    'author' => 'Helmut Hackbarth',
    'author_email' => 'typo3@t3solution.de',
    'author_company' => 't3solution',
    'constraints' =>
        array(
            'depends' =>
                array(
                    'typo3' => '9.5.13-10.4.99',
                    'news' => '7.2.0-8.99.99',
                ),
            'conflicts' =>
                array(),
            'suggests' =>
                array(),
        ),
    'autoload' =>
        array(
            'psr-4' =>
                array(
                    'T3S\\Newsslider\\' => 'Classes',
                ),
        ),
);

