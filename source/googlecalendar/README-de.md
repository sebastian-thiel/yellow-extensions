<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Googlecalendar 0.8.9

Google-Kalender einbinden.

<p align="center"><img src="googlecalendar-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man einen Kalender einbindet

Erstelle eine `[googlecalendar]`-Abkürzung.

Die folgenden Argumente sind verfügbar, alle bis auf das erste Argument sind optional:

`Id` = öffentlicher [Google-Kalender](https://calendar.google.com/), mehrere Kalender in Anführungszeichen setzen  
`Mode` = Kalendermodus, z.B. `week`, `month`, `events`, `agenda`  
`Date` = Startdatum oder Anzahl der Ereignisse, JJJJ-MM-TT Format  
`Style` = Kalenderstil, z.B. `left`, `center`, `right`  
`Width` = Kalenderbreite, Pixel oder Prozent  
`Height` = Kalenderhöhe, Pixel oder Prozent  

## Beispiele

Kalender einbinden, unterschiedliche Kalender:

    [googlecalendar en.uk#holiday]
    [googlecalendar de.german#holiday]
    [googlecalendar sv.swedish#holiday]

Kalender einbinden, mehrere Kalender zusammen:

    [googlecalendar "en.uk#holiday, de.german#holiday"]
    [googlecalendar "en.uk#holiday, de.german#holiday, sv.swedish#holiday"]
    [googlecalendar "en.uk#holiday#0044AA, de.german#holiday#AA0000, sv.swedish#holiday#0000AA"]

Kalender einbinden, unterschiedlicher Modus:

    [googlecalendar de.german#holiday month]
    [googlecalendar de.german#holiday events]
    [googlecalendar de.german#holiday agenda]

Kalender einbinden, unterschiedliches Datum:

    [googlecalendar de.german#holiday month 2021-06-01]
    [googlecalendar de.german#holiday month 2021-09-01]
    [googlecalendar de.german#holiday month 2023-12-24]

Kalender einbinden, unterschiedliche Größen:

    [googlecalendar de.german#holiday month 2021-06-01 right 50%]
    [googlecalendar de.german#holiday month 2021-06-01 right 240 240]
    [googlecalendar de.german#holiday month 2021-06-01 right 480 480]

Kalender einbinden, unterschiedliche Größen für das aktuelle Datum:

    [googlecalendar de.german#holiday month - right 50%]
    [googlecalendar de.german#holiday month - right 240 240]
    [googlecalendar de.german#holiday month - right 480 480]

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/extensions/yellow-system.ini` vorgenommen werden:

`GooglecalendarMode` = Kalendermodus, z.B. `week`, `month`, `events`, `agenda`  
`GooglecalendarEntriesMax` = Anzahl der Einträge  
`GooglecalendarStyle` = Kalenderstil, z.B. `flexible`  
`GooglecalendarApiKey` = dein Google-API-Schlüssel  

## Installation

[Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/googlecalendar.zip) und die Zip-Datei in dein `system/extensions`-Verzeichnis kopieren. Rechtsklick bei Safari.

Diese Erweiterung verwendet [Google-Kalender](https://calendar.google.com/). Der Dienstanbieter sammelt personenbezogene Daten und benutzt Cookies.

## Entwickler

Datenstrom. [Hilfe finden](https://datenstrom.se/de/yellow/help/).
