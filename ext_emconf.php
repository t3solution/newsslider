<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "newsslider".
 *
 * Auto generated 13-11-2022 09:53
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
  'title' => 'News slider Template-Layout',
  'description' => 'Slider Template-Layout for versatile news extension (tx_news).',
  'category' => 'templates',
  'version' => '6.0.0',
  'state' => 'stable',
  'uploadfolder' => false,
  'clearcacheonload' => false,
  'author' => 'Helmut Hackbarth',
  'author_email' => 'typo3@t3solution.de',
  'author_company' => 't3solution',
  'constraints' => 
  [
    'depends' => 
    [
      'typo3' => '12.4.1-12.9.99',
      'news' => '11.0.0-11.9.99',
    ],
    'conflicts' => 
    [
    ],
    'suggests' => 
    [
    ],
  ],
];
