<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Previousnext 0.8.9

Links zur vorherigen/nächsten Seite anzeigen.

<p align="center"><img src="previousnext-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man Links anzeigt

Diese Erweiterung fügt Links zur vorherigen/nächsten Seite ein, mit denen Benutzer zwischen den Seiten navigieren können. Links werden auf Blogseiten angezeigt. Um Links auf anderen Seiten anzuzeigen, benutze eine `[previousnext]`-Abkürzung.

## Beispiele

Inhaltsdatei mit Links:

    ---
    Title: Beispielseite
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

    [previousnext]

Layoutdatei mit Links:

    <?php $this->yellow->layout("header") ?>
    <div class="content">
    <div class="main" role="main">
    <h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
    <?php echo $this->yellow->page->getContent() ?>
    <?php echo $this->yellow->page->getExtra("previousnext") ?>
    </div>
    </div>
    <?php $this->yellow->layout("footer") ?>

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/extensions/yellow-system.ini` vorgenommen werden:

`PreviousnextPagePrevious` = Link zur vorherigen Seite zeigen, 1 oder 0  
`PreviousnextPageNext` = Link zur nächsten Seite zeigen, 1 oder 0  

## Installation

[Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/previousnext.zip) und die Zip-Datei in dein `system/extensions`-Verzeichnis kopieren. Rechtsklick bei Safari.

## Entwickler

Datenstrom. [Hilfe finden](https://datenstrom.se/de/yellow/help/).
