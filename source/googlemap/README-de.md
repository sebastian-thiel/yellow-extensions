<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Googlemap 0.9.0

Google-Karte einbinden.

<p align="center"><img src="googlemap-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man eine Karte einbindet

Erstelle eine `[googlemap]`-Abkürzung.

Die folgenden Argumente sind verfügbar, alle bis auf das erste Argument sind optional:

`Address` = Text den man auf [Google-Maps](https://maps.google.com/) eingibt, mehrere Wörter in Anführungszeichen setzen. Oder der Wert des Parameters `mid` der embed-URL einer geteilten Google-Karte (z.B. eine von [deinen eigenen Karten](https://www.google.com/maps/d/))    
`Zoom` = Zoomwert, der Standardzoom ist 15  
`Style` = Kartenstil, z.B. `left`, `center`, `right`  
`Width` = Kartenbreite, Pixel oder Prozent  
`Height` = Kartenhöhe, Pixel oder Prozent  

## Beispiele

Karte einbinden, unterschiedliche Adressen:

    [googlemap Stockholm]
    [googlemap "Malmö, Gamla staden"]
    [googlemap "Bredgatan 1, Lund, Sweden"]
    [googlemap 1122CMPdX0IhtF6SyyDVmlrSd7c0]

Karte einbinden, unterschiedliche GPS-Koordinaten:

    [googlemap "59.32820, 18.07007"]
    [googlemap "55.60490, 12.99833"]
    [googlemap "55.70647, 13.19246"]

Karte einbinden, unterschiedliche Zoomwerte:

    [googlemap Stockholm 5]
    [googlemap Stockholm 10]
    [googlemap Stockholm 15]

Karte einbinden, unterschiedliche Größen:

    [googlemap Stockholm 15 right 50%]
    [googlemap Stockholm 15 right 320 200]
    [googlemap Stockholm 15 right 640 400]

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/extensions/yellow-system.ini` vorgenommen werden:

`GooglemapZoom` = Zoomwert  
`GooglemapStyle` = Kartenstil, z.B. `flexible`  

## Installation

[Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/googlemap.zip) und die Zip-Datei in dein `system/extensions`-Verzeichnis kopieren. Rechtsklick bei Safari.

Diese Erweiterung verwendet [Google-Maps](https://maps.google.com/). Der Dienstanbieter sammelt personenbezogene Daten und benutzt Cookies.

## Entwickler

Datenstrom. [Hilfe finden](https://datenstrom.se/de/yellow/help/).
