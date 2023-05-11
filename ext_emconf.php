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

$EM_CONF[$_EXTKEY] = array (
  'title' => 'News slider',
  'description' => 'jQuery and vanilla slider-plugins for versatile news extension (tx_news).',
  'category' => 'plugin',
  'version' => '5.1.0',
  'state' => 'stable',
  'uploadfolder' => false,
  'clearcacheonload' => false,
  'author' => 'Helmut Hackbarth',
  'author_email' => 'typo3@t3solution.de',
  'author_company' => 't3solution',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '11.5.4-11.99.99',
      'php' => '8.0.0-8.2.99',
      'news' => '11.0.0-11.99.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
);

