
# TYPO3 Extension "newsslider"

newsslider © 2013-2025, Helmut Hackbarth, <typo3@t3solution.de>

depends on news © 2010-2025, Georg Ringer <typo3@ringerge.org>

Swiper by © 2014-2025, Vladimir Kharlampidi https://swiperjs.com/

This document is published under the Open Content License available from http://www.opencontent.org/opl.shtml
The content of this document is related to TYPO3 - a GNU/GPL CMS/Framework available from www.typo3.org

## What does it do?

This extension will display your news-records (image, title, teaser ...) from versatile news extension (tx_news) in a slider.

You must have installed tx_news.


## Usage

### 1) Installation

#### Installation using Composer

The recommended way to install the extension is by using Composer. In your Composer based TYPO3 project root, just do `composer require t3s/newsslider`.

#### Installation as extension from TYPO3 Extension Repository (TER)

Download and install the extension with the extension manager module.

### 2) Include the Set "News Slider"

Include the set "News Slider" in your site configuration:
[Using a site set as dependency in a site](https://docs.typo3.org/permalink/t3coreapi:site-sets-usage>)

```
base: 'https://example.com/'
rootPageId: 1
dependencies:
  - t3s/newsslider
```

Or let your site packages site set depend on `t3s/newsslider`:
[Defining the site set with a fluid_styled_content dependency](https://docs.typo3.org/permalink/t3coreapi:site-sets-example-site-package-set)

### 3) Template selection

For the PlugIn "news_pi1" and "news_newsliststicky" a new Template-Layout "Swiperslider" is provided!

## More information

Please follow the documentation found at https://www.t3sbootstrap.de/extensions/news-slider

