<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Meta 0.8.14

Metadata för webbplatser med sociala medier.

<p align="center"><img src="meta-screenshot.png?raw=true" width="795" height="512" alt="Skärmdump"></p>

## Hur man lägger till metadata för sociala medier

Den här tillägget genererar metadata för [Open Graph protocol](https://ogp.me/).

Du kan ställa in `Title`, `Description`, `Image` och `ImageAlt` i [sidinställningar](https://github.com/datenstrom/yellow-extensions/tree/master/source/core/README-sv.md#inställningar-page) högst upp på en sida. Du kan konfigurera ytterligare metadata i HTML-headern, till exempel i filen  `system/layouts/header.html`.

## Exempel

Innehållsfil med metadata: 

    ---
    Title: Exempelsida
    Description: Exempel för din webbplats
    Image: photo.jpg
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

Innehållsfil med metadata från första bilden:

    ---
    Title: Exempelsida
    Description: Exempel för din webbplats
    ---
    [image photo.jpg]

    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

Layoutfil med ytterligare metadata för Twitter:

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

## Inställningar

Följande inställningar kan konfigureras i filen `system/extensions/yellow-system.ini`:

`MetaDefaultImage` = sidans bild, `favicon` för att använda webbplatsens standardikon  

Följande filer kan anpassas:

`system/layouts/header.html` = layoutfil för standard HTML-header  
`system/layouts/footer.html` = layoutfil för standard HTML-footer  

## Installation

[Ladda ner tillägg](https://github.com/datenstrom/yellow-extensions/raw/master/zip/meta.zip) och kopiera zip-fil till din `system/extensions` mapp. Högerklicka om du använder Safari.

## Utvecklare

Datenstrom, Steffen Schultz. [Få hjälp](https://datenstrom.se/sv/yellow/help/).
