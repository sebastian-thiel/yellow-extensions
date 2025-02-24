<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Update 0.8.56

Webseite auf dem neusten Stand halten.

<p align="center"><img src="update-screenshot.png?raw=true" width="795" height="836" alt="Bildschirmfoto"></p>

## Wie man eine Webseite aktualisiert

Die erste Möglichkeit besteht darin, deine Webseite im [Webbrowser](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit/README-de.md) zu aktualisieren. Melde dich mit deinem Benutzerkonto an. Gehe in die Einstellungen und suche nach Aktualisierungen. Deine Webseite zeigt an, ob Aktualisierungen verfügbar sind. Du benötigst Update-Rechte, um eine Webseite zu aktualisieren. Alle Benutzerkonten werden in der Datei `system/extensions/yellow-user.ini` gespeichert.

Die zweite Möglichkeit besteht darin, deine Webseite in der [Befehlszeile](https://github.com/datenstrom/yellow-extensions/tree/master/source/command/README-de.md) zu aktualisieren. Öffne ein Terminalfenster. Gehe ins Installations-Verzeichnis, dort wo sich die Datei `yellow.php` befindet. Gib ein `php yellow.php update`. Das zeigt an ob Aktualisierungen verfügbar sind. Zum Aktualisieren der Webseite gib ein `php yellow.php update all`. Du kannst wahlweise den Namen einer Erweiterung angeben. Gelöschte Dateien findest du im `system/trash`-Verzeichnis.

## Wie man eine Webseite erweitert

Deine Webseite kommt nur mit dem Nötigsten. Du kannst Erweiterungen als ZIP-Dateien herunterladen und hinzufügen. Du kannst Erweiterungen auch in der [Befehlszeile](https://github.com/datenstrom/yellow-extensions/tree/master/source/command/README-de.md) hinzufügen. Öffne ein Terminalfenster. Gehe ins Installations-Verzeichnis, dort wo sich die Datei `yellow.php` befindet. Gib ein `php yellow.php install` gefolgt von weiteren Argumenten. Du kannst Erweiterungen auch in der Befehlszeile entfernen.

## Wie man die aktuelle Version anzeigt

Du kannst die aktuelle Version deiner Webseite im [Webbrowser](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit/README-de.md) anzeigen. Melde dich mit deinem Benutzerkonto an. Gehe in die Einstellungen. Du kannst die aktuelle Version auch in der [Befehlszeile](https://github.com/datenstrom/yellow-extensions/tree/master/source/command/README-de.md) anzeigen. Öffne ein Terminalfenster. Gehe ins Installations-Verzeichnis, dort wo sich die Datei `yellow.php` befindet. Gib ein `php yellow.php about`. 

Du kannst Abkürzungen verwenden, um Informationen über die Webseite anzuzeigen:

`[yellow about]` für aktuelle Version und Erweiterungen  
`[yellow release]` für aktuelle Produktausgabe  
`[yellow error]` für aktuelle Fehlermeldung  
`[yellow log]` für neueste Einträge in der Logdatei  

## Beispiele

Inhaltsdatei mit aktueller Version:

    ---
    Title: Beispiel-Seite
    ---
    Diese Seite zeigt die aktuelle Version der Webseite.

    ! [yellow about]

Inhaltsdatei mit Logdatei:

    ---
    Title: Beispiel-Seite
    ---
    Diese Seite zeigt die neuesten Einträge in der Logdatei.

    ! [yellow log]

Aktuelle Version und Erweiterungen in der Befehlszeile anzeigen:
 
`php yellow.php about`

Aktualisierungen in der Befehlszeile anzeigen:
 
`php yellow.php update`  

Webseite in der Befehlszeile aktualisieren:
 
`php yellow.php update all`  

Erweiterungen in der Befehlszeile hinzufügen:

`php yellow.php install`  
`php yellow.php install gallery`  
`php yellow.php install english german swedish`  

Erweiterungen in der Befehlszeile entfernen:

`php yellow.php uninstall`  
`php yellow.php uninstall gallery`  
`php yellow.php uninstall english german swedish`  

## Einstellungen

Die folgenden Einstellungen können in der Datei `system/extensions/yellow-system.ini` vorgenommen werden:

`UpdateExtensionUrl` = Repository mit Erweiterungen  
`UpdateExtensionFile` = Datei mit Erweiterungs-Einstellungen  
`UpdateLatestFile` = Datei mit neusten Aktualisierungs-Einstellungen  
`UpdateCurrentFile` = Datei mit aktuellen Aktualisierungs-Einstellungen  
`UpdateCurrentRelease` = momentan installierte Produktversion  
`UpdateEventPending ` = ausstehende Ereignisse  
`UpdateEventDaily ` = Zeitpunkt des nächsten täglichen Ereignisses  

Die Logdatei findet man in der Datei `system/extensions/yellow.log`.

## Installation

[Erweiterung herunterladen](https://github.com/datenstrom/yellow-extensions/raw/master/zip/update.zip) und die Zip-Datei in dein `system/extensions`-Verzeichnis kopieren. Rechtsklick bei Safari.

## Entwickler

Datenstrom. [Hilfe finden](https://datenstrom.se/de/yellow/help/).
