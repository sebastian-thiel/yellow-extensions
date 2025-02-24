<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Slider 0.8.13

Bildergalerie mit Schieber.

<p align="center"><img src="slider-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man eine Bildergalerie hinzufügt

Erstelle eine `[slider]`-Abkürzung.

Die folgenden Argumente sind verfügbar, alle bis auf das erste Argument sind optional:

`Pattern` = Dateiname als regulärer Ausdruck  
`Style` = Galeriestil, z.B. `loop`, `fade`, `slide`  
`Size` = Bildgröße, Pixel oder Prozent    
`Autoplay` = Bilder automatisch abspielen, Verzögerungszeit in Millisekunden  

Die Bildformate GIF, JPG, PNG und SVG werden unterstützt. Alle Mediendateien befinden sich im `media`-Verzeichnis. Das `media/images`-Verzeichnis ist zum Speichern von Bildern gedacht. Das `media/thumbnails`-Verzeichnis enthält Miniaturbilder. Man kann auch weitere Verzeichnisse hinzufügen und Dateien so organisieren wie man will.

## Beispiele

Bildergalerie hinzufügen, unterschiedliche Stile:

    [slider photo.*jpg loop]
    [slider photo.*jpg fade]
    [slider photo.*jpg slide]

Bildergalerie hinzufügen, unterschiedliche Größen:

    [slider photo.*jpg loop 25%]
    [slider photo.*jpg loop 50%]
    [slider photo.*jpg loop 100%]

Bildergalerie aus einem Unterverzeichnis hinzufügen, unterschiedliche Größen:

    [slider photo-album/ loop 25%]
    [slider photo-album/ loop 50%]
    [slider photo-album/ loop 100%]

Bildergalerie hinzufügen, automatisch abspielen mit Standardstil/-größe:

    [slider photo.*jpg - - 1000]
    [slider photo.*jpg - - 2000]
    [slider photo.*jpg - - 5000]

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/extensions/yellow-system.ini` vorgenommen werden:

`SliderStyle` = Galeriestil, z.B. `loop`, `fade`, `slide`  
`SliderAutoplay` = Bilder automatisch abspielen, Verzögerungszeit in Millisekunden  

## Installation

[Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/slider.zip) und die Zip-Datei in dein `system/extensions`-Verzeichnis kopieren. Rechtsklick bei Safari.

Diese Erweiterung benutzt [Splide 2.4.21](https://github.com/Splidejs/splide) von Naotoshi Fujita.

## Entwickler

Datenstrom. [Hilfe finden](https://datenstrom.se/de/yellow/help/).
