<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Parsedown 0.8.17

Textformatierung für Menschen.

<p align="center"><img src="parsedown-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man Text formatiert

Markdown ist eine praktische Art um Webseiten zu bearbeiten. Schreibe Text wie in einer E-Mail und daraus wird eine Webseite. Nach einer kurzen Zeit passiert das ganz natürlich, ohne dass man darüber nachdenkt. Hier ist die [Markdown-Syntax](http://commonmark.org/help/), eine Liste der [Markdown-Extra-Funktionen](https://michelf.ca/projects/php-markdown/extra/) und [GitHub-Flavored-Markdown](https://help.github.com/en/articles/basic-writing-and-formatting-syntax). Zusätzlich zu Markdown gibt es Abkürzungen. Du kannst damit [Bilder](https://github.com/datenstrom/yellow-extensions/tree/master/source/image/README-de.md), [Bildergalerien](https://github.com/datenstrom/yellow-extensions/tree/master/source/gallery/README-de.md), [Videos](https://github.com/datenstrom/yellow-extensions/tree/master/source/youtube/README-de.md), [Emoji](https://github.com/datenstrom/yellow-extensions/tree/master/source/emojiawesome/README-de.md) und mehr in deine Webseite einbinden.

## Beispiele

Inhaltsdatei mit Seitentitel und Text:

    ---
    Title: Beispielseite
    ---
    Das ist eine Beispielseite.

    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod 
    tempor incididunt ut labore et dolore magna pizza. Ut enim ad minim veniam, 
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.

Text formatieren:

    Normal **Fettschrift** *Kursiv* ~~Durchgestrichen~~ `Code`

Eine Liste erstellen:

    * Punkt eins
    * Punkt zwei
    * Punkt drei

Eine sortierte Liste erstellen:

    1. Punkt eins
    2. Punkt zwei
    3. Punkt drei

Eine Aufgabenliste erstellen:

    - [x] Punkt eins
    - [ ] Punkt zwei
    - [ ] Punkt drei

Eine Überschrift erstellen:

    # Überschrift 1
    ## Überschrift 2
    ### Überschrift 3

Zitate erstellen:

    > Zitat
    >> Zitat im Zitat
    >>> Zitat im Zitat im Zitat

Links erstellen:

    [Link zu Seite](/help/how-to-make-a-small-website)
    [Link zu Datei](/media/downloads/yellow.pdf)
    [Link zu Webseite](https://datenstrom.se/de/)

Bilder hinzufügen:

    [image photo.jpg Beispiel]
    [image photo.jpg "Dies ist ein Beispielbild"]
    [image photo.jpg "Dies ist eine besonders lange Beschreibung"]

Tabellen erstellen:

    | Kaffee     | Milch | Stärke  |
    |------------|-------|---------|
    | Espresso   | nein  | stark   |
    | Macchiato  | ja    | mittel  |
    | Cappuccino | ja    | schwach |

Fußnoten erstellen:

    Text mit einer Fußnote[^1] und noch weiteren Fußnoten.[^2] [^3]
    
    [^1]: Hier ist die erste Fußnote
    [^2]: Hier ist die zweite Fußnote
    [^3]: Hier ist die dritte Fußnote

Quellcode anzeigen:

    ```
    Quellcode wird unverändert angezeigt.
    function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    ```

Absätze erstellen:

    Hier ist der erste Absatz. Der Text kann über mehrere Zeilen gehen
    und kann durch eine Leerzeile vom nächsten Absatz getrennt werden.

    Hier ist der zweite Absatz.

Zeilenumbrüche erstellen:

    Hier ist die erste Zeile⋅⋅
    Hier ist die zweite Zeile⋅⋅
    Hier ist die dritte Zeile⋅⋅
    
    Leerzeichen am Zeilenende sind dargestellt durch Punkte (⋅)

Hinweise erstellen:

    ! Hier ist ein Hinweis mit Warnung
    
    !! Hier ist ein Hinweis mit Fehler
    
    !!! Hier ist ein Hinweis mit Tipp

CSS benutzen:

    ! {.class}
    ! Hier ist ein Hinweis mit benutzerdefinierter Klasse.
    ! Der Text kann über mehrere Zeilen gehen
    ! und Markdown-Textformatierung beinhalten.

HTML benutzen:

    <strong>Text mit HTML</strong> kann wahlweise benutzt werden.
    <img src="/media/images/photo.jpg" alt="Dies ist ein Beispielbild">
    <a href="https://datenstrom.se/de/" target="_blank">Link in einem neuen Tab öffnen</a>.

Abkürzungen benutzen:

    [gallery photo.*jpg zoom] = Bildergalerie mit Popup hinzufügen 
    [slider photo.*jpg loop]  = Bildergalerie mit Schieber hinzufügen
    [youtube fhs55HEl-Gc]     = Video einbinden 

    Abkürzungen erfordern Erweiterungen um zu funktionieren.

## Einstellungen

Der Standardparser wird in der Datei `system/extensions/yellow-system.ini` festgelegt. Ein anderer Parser lässt sich in den [Seiteneinstellungen](https://github.com/datenstrom/yellow-extensions/tree/master/source/core/README-de.md#einstellungen-seite) ganz oben auf jeder Seite festlegen, zum Beispiel `Parser: parsedown`. 

## Installation

[Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/parsedown.zip) und die Zip-Datei in dein `system/extensions`-Verzeichnis kopieren. Rechtsklick bei Safari.

Diese Erweiterung benutzt [Parsedown Extra 1.8.0-beta-7](https://github.com/erusev/parsedown) von Emanuil Rusev.

## Entwickler

Datenstrom. [Hilfe finden](https://datenstrom.se/de/yellow/help/).
