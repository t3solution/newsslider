<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "newsslider".
 * Auto generated 09-01-2020 10:40
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
    'title' => 'News slider',
    'description' => 'jQuery and vanilla slider-plugins for versatile news extension (tx_news).',
    'category' => 'plugin',
    'version' => '5.0.3',
    'state' => 'stable',
    'author' => 'Helmut Hackbarth',
    'author_email' => 'typo3@t3solution.de',
    'author_company' => 't3solution',
    'constraints' => [
            'depends' => [
                    'typo3' => '11.5.4-11.9.99',
                    'php' => '7.4.0-8.0.99',
                    'news' => '8.0.0-10.99.99' 
                ],
            'conflicts' =>[],
            'suggests' =>[],
        ],
    'autoload' => [
            'psr-4' => [
                    'T3S\\Newsslider\\' => 'Classes',
            ],
        ],
];
