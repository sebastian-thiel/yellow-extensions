<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Serve 0.8.16

Eingebauter Webserver.

<p align="center"><img src="serve-screenshot.png?raw=true" width="794" height="478" alt="Bildschirmfoto"></p>

## Wie man den eingebauten Webserver startet

Du kannst den eingebauten Webserver in der [Befehlszeile](https://github.com/datenstrom/yellow-extensions/tree/master/source/command/README-de.md) starten. Der eingebauten Webserver ist praktisch für Entwickler/Designer. Öffne ein Terminalfenster. Gehe ins Installations-Verzeichnis, dort wo sich die Datei `yellow.php` befindet. Gib ein `php yellow.php serve`, du kannst wahlweise ein Verzeichnis und eine URL angeben. Öffne einen Webbrowser und gehe zu `http://localhost:8000/`.

## Beispiele

Verfügbare Befehle in der Befehlszeile anzeigen:

`php yellow.php`

Eingebauten Webserver in der Befehlszeile starten:

`php yellow.php serve`  

Eingebauten Webserver in der Befehlszeile starten, unterschiedliche URL:

`php yellow.php serve dynamic http://localhost:8000/`  
`php yellow.php serve dynamic http://localhost:8080/`  
`php yellow.php serve dynamic http://localhost:8888/`  

## Installation

[Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/serve.zip) und die Zip-Datei in dein `system/extensions`-Verzeichnis kopieren. Rechtsklick bei Safari.

## Entwickler

Datenstrom. [Hilfe finden](https://datenstrom.se/de/yellow/help/).
