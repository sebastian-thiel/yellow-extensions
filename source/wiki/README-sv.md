<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Wiki 0.8.13

Wiki för din webbplats.

<p align="center"><img src="wiki-screenshot.png?raw=true" width="795" height="836" alt="Skärmdump"></p>

## Hur man använder en wiki

Wikin finns på din webbplats som `http://website/wiki/`. För att visa wikin på startsidan, gå till din `content` mapp och ta bort `1-home` mappen. För att skapa en ny wikisida, lägg till en ny fil i wiki-mappen. Ställ in `Title` och andra [sidinställningar](https://github.com/datenstrom/yellow-extensions/tree/master/source/core/README-sv.md#inställningar-page) högst upp på en sida. Använd `Tag` för att gruppera liknande sidor.

## Hur man visar wikiinformation

Du kan använda förkortningar för att visa information om wikin:

`[wikiauthors]` för en lista över författare  
`[wikitags]` för en lista med taggar  
`[wikirelated]` för en lista med sidor, som är relaterade till den aktuella sidan  
`[wikipages]` för en lista med sidor, alfabetisk ordning  
`[wikichanges]` för en lista över sidor, senast ändrad ordning  

Följande argument är tillgängliga, alla utom det första argumentet är valfria:

`Location` = plats för wikin  
`PagesMax` = antal sidor att visa per förkortning, 0 för obegränsad  
`Author` = visa sidor av en specifik författare, endast `[wikipages]` eller `[wikichanges]`  
`Tag` = visa sidor med en specifik tagg, endast `[wikipages]` eller `[wikichanges`]  

## Exempel

Innehållsfil med wikisida:

    ---
    Title: Wikisida
    Layout: wiki
    Tag: Exempel
    ---
    Detta är ett exempel på en wikisida.

    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

Innehållsfil med wikisida:

    ---
    Title: Kaffe är bra för dig
    Layout: wiki
    Tag: Exempel, Kaffe
    ---
    Kaffe är en dryck gjord av rostade bönor från kaffeplanten.
    
     1. Börja med färskt kaffe. Kaffebönor börjar tappa kvalitet direkt efter
        rostning och malning. Du får det bästa kaffe när de nymalda bönorna 
        bearbetas omedelbart.
     2. Brygg en kopp kaffe. Kaffe kan tillagas med olika metoder och 
        ytterligare smakämnen som mjölk och socker. Det finns espresso, 
        filterkaffe, fransk press, italiensk moka, turkiskt kaffe och många 
        fler. Hitta din favoritsmak,
     3. Njut. 

Visa länkar till wikin:

    [Se alla sidor](/wiki/special:pages/)
    [Se senaste ändringarna](/wiki/special:changes/)
    [Se exempel](/wiki/tag:exempel/)

Visa senaste wikisidor:

    [wikichanges /wiki/ 0]
    [wikichanges /wiki/ 3]
    [wikichanges /wiki/ 10]

Visa lista med taggar:

    [wikitags /wiki/ 0]
    [wikitags /wiki/ 3]
    [wikitags /wiki/ 10]

Visa lista med sidor:

    [wikipages /wiki/ 0]
    [wikipages /wiki/ 3]
    [wikipages /wiki/ 10]

Visa lista med sidor, av en specifik författare eller tagg:

    [wikipages /wiki/ 10 Datenstrom]]
    [wikipages /wiki/ 10 - kaffe]
    [wikipages /wiki/ 10 - exempel]

Konfigurera en annan plats, URL med undermapp för kategorisering: 

    WikiLocation: /wiki/
    WikiNewLocation: /wiki/@tag/@title

## Inställningar

Följande inställningar kan konfigureras i filen `system/extensions/yellow-system.ini`:

`WikiLocation` = plats för wikin, tom betyder aktuell mappr  
`WikiNewLocation` = plats för nya wikisidor, [stödda platshållare](#inställningar-placeholders)  
`WikiPagesMax` = antal sidor att visa per förkortning, 0 för obegränsad  
`WikiPaginationLimit` = antal inlägg att visa per sida  

<a id="inställningar-placeholders"></a>Följande platshållare för nya wikisidor stöds:

`@title` = namn på sidan  
`@tag` = taggar för kategorisering av sidan  
`@author` = sedans författare  

<a id="inställningar-files"></a>Följande filer kan anpassas:

`content/shared/page-new-wiki.md` = innehållsfil för ny wikisida  
`system/layouts/wikipages.html` = layoutfil för huvudwikisida  
`system/layouts/wiki.html` = layoutfil för enskild wikisida  

## Installation

[Ladda ner tillägg](https://github.com/datenstrom/yellow-extensions/raw/master/zip/wiki.zip) och kopiera zip-fil till din `system/extensions` mapp. Högerklicka om du använder Safari.

## Utvecklare

Datenstrom. [Få hjälp](https://datenstrom.se/sv/yellow/help/).
