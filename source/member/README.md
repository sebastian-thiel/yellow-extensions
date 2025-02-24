<p align="right"><a href="README.md">English</a></p>

# Meta 0.8.14

Meta data for social media sites.

<p align="center"><img src="meta-screenshot.png?raw=true" width="795" height="512" alt="Screenshot"></p>

## How to add meta data for social media sites

This extension generates meta data for the [Open Graph protocol](https://ogp.me/).

You can set `Title`, `Description`, `Image` and `ImageAlt` in the [page settings](https://github.com/datenstrom/yellow-extensions/tree/master/source/core#settings-page) at the top of a page. You can configure additional meta data in the HTML header, for example in file `system/layouts/header.html`.

## Example

Content file with meta data:

    ---
    Title: Example page
    Description: Example for your website
    Image: photo.jpg
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

Content file with meta data from first image:

    ---
    Title: Example page
    Description: Example for your website
    ---
    [image photo.jpg]

    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

Layout file with additional meta data for Twitter:

    <!DOCTYPE html>
    <html lang="<?php echo $this->yellow->page->getHtml("language") ?>">
    <head>
    <title><?php echo $this->yellow->page->getHtml("titleHeader") ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="<?php echo $this->yellow->page->getHtml("description") ?>" />
    <meta name="author" content="<?php echo $this->yellow->page->getHtml("author") ?>" />
    <meta name="generator" content="Datenstrom Yellow" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@dog_feelings" />
    <?php echo $this->yellow->page->getExtra("header") ?>
    </head>
    ...

## Settings

The following settings can be configured in file `system/extensions/yellow-system.ini`:

`MetaDefaultImage` = page image, `favicon` to use the default icon of the website  

The following files can be customised:

`system/layouts/header.html` = layout file for default HTML header  
`system/layouts/footer.html` = layout file for default HTML footer  

## Installation

[Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/meta.zip) and copy zip file into your `system/extensions` folder. Right click if you use Safari.

## Developer

Datenstrom, Steffen Schultz. [Get help](https://datenstrom.se/yellow/help/).
