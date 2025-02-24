---
Title: Wie man das System anpasst
---
Alle Systemdateien befinden sich im `system`-Verzeichnis. Hier passt man seine Webseite an.

    ├── content
    ├── media
    └── system
        ├── extensions
        ├── layouts
        ├── themes
        └── trash

Das `system/extensions`-Verzeichnis enthält installierte Erweiterungen und Konfigurationsdateien. Man kann das Aussehen seiner Webseite im `system/layouts`-Verzeichnis und `system/themes`-Verzeichnis anpassen. Man kann Layouts und Themen so ändern wie man will, Kenntnisse in HTML, CSS und JavaScript sind erforderlich. Das `system/trash`-Verzeichnis enthält gelöschte Dateien.

## Systemeinstellungen

Die zentrale Konfigurationsdatei ist `system/extensions/yellow-system.ini`. Hier ist ein Beispiel:

    Sitename: Anna Svensson Design
    Author: Anna Svensson
    Email: anna@svensson.com
    Theme: berlin
    Language: de
    Layout: default
    Parser: markdown
    Status: public

Im [Webbrowser](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit/README-de.md) oder Texteditor kannst du die Systemeinstellungen ändern. Die Systemeinstellungen enthalten die Einstellungen der Webseite und aller Erweiterungen. Nach einer neuen Installation sollte man unbedingt `Sitename`, `Author` und `Email` überprüfen. Die folgenden Einstellungen können vorgenommen werden:

`Sitename` = Name der Webseite  
`Author` = Name des Webmasters  
`Email` = E-Mail des Webmasters  
`Theme` = Standard-Thema  
`Language` = Standard-Sprache  
`Layout` = Standard-Layout  
`Parser` = Standard-Seitenparser  
`Status` = Standard-Seitenstatus  

## Benutzereinstellungen

Die Benutzereinstellungen sind in der Datei `system/extensions/yellow-user.ini` gespeichert. Hier ist ein Beispiel:

    Email: anna@svensson.com
    Name: Anna Svensson
    Description: Designer
    Language: de
    Home: /
    Access: create, edit, delete, restore, upload, configure, install, uninstall, update
    Hash: $2y$10$j26zDnt/xaWxC/eqGKb9p.d6e3pbVENDfRzauTawNCUHHl3CCOIzG
    Stamp: 21196d7e857d541849e4
    Pending: none
    Failed: 0
    Modified: 2000-01-01 13:37:00
    Status: active

Im [Webbrowser](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit/README-de.md) oder der [Befehlszeile](https://github.com/datenstrom/yellow-extensions/tree/master/source/command/README-de.md) kannst du neue Benutzerkonten anlegen. Ein Benutzerkonto besteht aus `Email` und weiteren Einstellungen. Falls du nicht willst dass Seiten im Webbrowser verändert werden, dann beschränke Benutzerkonten. Öffne die Konfigurationsdatei, ändere `Home` und `Access`. Benutzer dürfen Seiten innerhalb ihrer Startseite bearbeiten, aber nirgendwo sonst.

## Spracheinstellungen

Die Spracheinstellungen sind in der Datei `system/extensions/yellow-language.ini` gespeichert. Hier ist ein Beispiel:

    Language: de
    CoreDateFormatShort: F Y
    CoreDateFormatMedium: d.m.Y
    CoreDateFormatLong: d.m.Y H:i
    EditMailFooter: @sitename
    ImageDefaultAlt: Bild ohne Beschreibung
    media/images/photo.jpg: Das ist ein Beispielbild

Dort kannst du die Spracheinstellungen festlegen. Eine Sprache besteht aus `Language` und weiteren Einstellungen. Du kannst die [Standardeinstellungen aus Sprachdateien](https://github.com/datenstrom/yellow-extensions/blob/master/source/german/german.txt) kopieren und in die Konfigurationsdatei einfügen. Du kannst auch deine eigenen Spracheinstellungen zur Konfigurationsdatei hinzufügen, beispielsweise Bildunterschriften.

## Seiteneinstellungen

Die folgenden Einstellungen können ganz oben auf einer Seite vorgenommen werden

`Title` = Seitentitel  
`TitleContent` = Seitentitel der im Inhalt angezeigt wird  
`TitleNavigation` = Seitentitel der in der Navigation angezeigt wird  
`TitleHeader` = Seitentitel der im Webbrowser angezeigt wird  
`TitleSlug` = Seitentitel zum Speichern der Seite  
`Description` = Beschreibung der Seite  
`Author` = Autoren der Seite, durch Komma getrennt  
`Email` = E-Mail des Seitenautors  
`Theme` = Thema der Seite  
`Language` = Sprache der Seite  
`Layout` = Layout der Seite  
`LayoutNew` = Layout um eine neue Seite zu erzeugen  
`Parser` = Parser der Seite  
`Status` = Status der Seite  
`Redirect` = Umleitung zu einer neuen Seite oder URL  
`Image` = Bild der Seite  
`ImageAlt` = Beschreibung des Bildes der Seite  
`Modified` = Änderungsdatum der Seite, JJJJ-MM-TT Format  
`Published` = Veröffentlichungsdatum der Seite, JJJJ-MM-TT Format  
`Tag` = Tags zur Kategorisierung der Seite, durch Komma getrennt  
`Build` = Optionen zum Erstellen einer statischen Webseite, durch Komma getrennt  
`Comment` = Optionen zum Anzeigen von Kommentaren, durch Komma getrennt  

Hast du Fragen? [Hilfe finden](.) und [mitmachen](contributing-guidelines).
