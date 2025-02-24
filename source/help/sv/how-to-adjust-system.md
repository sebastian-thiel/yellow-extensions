---
Title: Hur man anpassar systemet
---
Alla systemfiler finns i `system` mappen. Du kan anpassa din webbplats här. 

    ├── content
    ├── media
    └── system
        ├── extensions
        ├── layouts
        ├── themes
        └── trash

Mappen `system/extensions` innehåller installerade tillägg och konfigurationsfilar. Du kan justera utseendet på din webbplats i `system/layouts` mappen och `system/themes` mappen. Du kan ändra layouter och teman som du vill, vissa kunskaper i HTML, CSS och JavaScript krävs. Mappen `system/trash` innehåller raderade filer.

## Systeminställningar

Den centrala konfigurationsfilen är `system/extensions/yellow-system.ini`. Här är ett exempel: 

    Sitename: Anna Svensson Design
    Author: Anna Svensson
    Email: anna@svensson.com
    Theme: stockholm
    Language: sv
    Layout: default
    Parser: markdown
    Status: public

Du kan använda [webbläsaren](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit/README-sv.md) eller textredigeraren för att ändra systeminställningar. Systeminställningarna innehåller inställningarna för din webbplats och för alla tillägg. Efter en ny installation var noga med att kontrollera `Sitename`, `Author` och `Email`. Följande inställningar kan konfigureras:

`Sitename` = webbplatsens namn  
`Author` = webmasterns namn  
`Email` = webmasterns email  
`Theme` = standardtema  
`Language` = standardspråk  
`Layout` = standardlayout  
`Parser` = standard sidparser  
`Status` = standard sidstatus  

## Användarinställningar

Användarinställningar lagras i filen `system/extensions/yellow-user.ini`. Här är ett exempel:

    Email: anna@svensson.com
    Name: Anna Svensson
    Description: Formgivare
    Language: sv
    Home: /
    Access: create, edit, delete, restore, upload, configure, install, uninstall, update
    Hash: $2y$10$j26zDnt/xaWxC/eqGKb9p.d6e3pbVENDfRzauTawNCUHHl3CCOIzG
    Stamp: 21196d7e857d541849e4
    Pending: none
    Failed: 0
    Modified: 2000-01-01 13:37:00
    Status: active

Du kan använda [webbläsaren](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit/README-sv.md) eller [kommandoraden](https://github.com/datenstrom/yellow-extensions/tree/master/source/command/README-sv.md) för att skapa nya användarkonton. Ett användarkonto består av `Email` och andra inställningar. Om du inte vill att sidorna ska ändras i en webbläsare begränsar du användarkonton. Öppna konfigurationsfilen, ändra `Home` och `Access`. Användare får redigera sidor på sin hemsida, men inte någon annanstans.

## Språkinställningar

Språkinställningar lagras i filen `system/extensions/yellow-language.ini`. Här är ett exempel:

    Language: sv
    CoreDateFormatShort: F Y
    CoreDateFormatMedium: Y-m-d
    CoreDateFormatLong: Y-m-d H:i
    EditMailFooter: @sitename
    ImageDefaultAlt: Bild utan beskrivning
    media/images/photo.jpg: Detta är en exempelbild

Du kan definiera språkinställningarna här. Ett språk består av `Language` och andra inställningar. Du kan kopiera [standardinställningarna från språkfiler](https://github.com/datenstrom/yellow-extensions/blob/master/source/swedish/swedish.txt) och klistra in dem i konfigurationsfilen. Du kan också lägga till dina egna språkinställningar i konfigurationsfilen, till exempel bildtexter.

## Sidinställningar

Följande inställningar kan konfigureras högst upp på en sida:

`Title` = namn på sidan  
`TitleContent` = namn på sidan som visas i innehållet  
`TitleNavigation` = namn på sidan som visas i navigeringen  
`TitleHeader` = namn på sidan som visas i webbläsaren  
`TitleSlug` = namn för att spara sidan  
`Description` = sidans beskrivning  
`Author` = sidans författare, kommaseparerade  
`Email` = email av sidans författare  
`Theme` = sidans tema  
`Language` = sidans språk  
`Layout` = sidans layout  
`LayoutNew` = sidans layout för att skapa en ny sida  
`Parser` = sidans parser  
`Status` = sidans status  
`Redirect` = omdirigera till en ny sida eller URL  
`Image` = sidans bild  
`ImageAlt` = beskrivning av sidans bild  
`Modified` = sidans ändringsdatum, ÅÅÅÅ-MM-DD format  
`Published` = sidans publiceringsdatum, ÅÅÅÅ-MM-DD format  
`Tag` = taggar för kategorisering av sidan, kommaseparerade  
`Build` = alternativ för att bygga en statisk webbplats, kommaseparerade  
`Comment` = alternativ för att visa kommentarer, kommaseparerade  

Har du några frågor? [Få hjälp](.) och [engagera dig](contributing-guidelines).
