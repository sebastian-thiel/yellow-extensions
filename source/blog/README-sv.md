<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Blog 0.8.13

Blogg för din webbplats

<p align="center"><img src="blog-screenshot.png?raw=true" width="795" height="836" alt="Skärmdump"></p>

## Hur man använder en blogg

Bloggen finns tillgänglig på din webbplats som `http://website/blog/` För att visa bloggen på startsidan, gå till din `content` mapp och ta bort `1-home` mappen. För att skapa en ny bloggsida, lägg till en ny fil i blogg-mappen. Ställ in `Published` och andra [sidinställningar](https://github.com/datenstrom/yellow-extensions/tree/master/source/core/README-sv.md#inställningar-page) högst upp på en sida. Publiceringsdatum kommer att användas för att sortera bloggsidor. Använd `Tag` för att gruppera liknande sidor. Du kan använda `[--more--]` för att lägga till en sidbrytning på önskad plats.

## Hur man visar blogginformation

Du kan använda förkortningar för att visa information om bloggen:

`[blogauthors]` för en lista över författare  
`[blogtags]` för en lista med taggar  
`[blogarchive]` för en lista med månader  
`[blogrelated]` för en lista med sidor, som är relaterade till den aktuella sidan  
`[blogpages]` för en lista med sidor, alfabetisk ordning  
`[blogchanges]` för en lista över sidor, publicerad ordning  

Följande argument är tillgängliga, alla utom det första argumentet är valfria:

`Location` = plats för bloggen  
`PagesMax` = antal sidor att visa per förkortning, 0 för obegränsad  
`Author` = visa sidor av en specifik författare, endast `[blogpages]` eller `[blogchanges]`  
`Tag` = visa sidor med en specifik tagg, endast `[blogpages]` eller `[blogchanges]`  

## Exempel

Innehållsfil med bloggsida:

    ---
    Title: Blogg exempel 
    Published: 2020-04-07
    Author: Datenstrom
    Layout: blog
    Tag: Exempel
    ---
    Detta är ett exempel på en bloggsida.

    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

Innehållsfil med bloggsida och sidbrytning:

    ---
    Title: Fika är bra för dig
    Published: 2020-06-01
    Author: Datenstrom
    Layout: blog
    Tag: Exempel, Kaffe
    ---
    Fika är en svensk sed. Det är en social kaffepaus där människor
    samlas för att ta en kopp kaffe eller te tillsammans. [--more--]
    
    Du kan ha fika med kollegor på jobbet. Du kan bjuda in dina vänner
    till fika. Fika är en så viktig del av vardagen i Sverige att det är
    både ett verb och ett substantiv. Hur ofta fikar du? 

Visa länkar till bloggen:

    [Se alla sidor](/blog/)
    [Se alla sidor av Datenstrom](/blog/author:datenstrom/)
    [Se exempel](/blog/tag:exempel/)

Visa senaste bloggsidor:

    [blogchanges /blog/ 0]
    [blogchanges /blog/ 3]
    [blogchanges /blog/ 10]

Visa lista med taggar:

    [blogtags /blog/ 0]
    [blogtags /blog/ 3]
    [blogtags /blog/ 10]

Visa lista med månader:

    [blogarchive /blog/ 0]
    [blogarchive /blog/ 3]
    [blogarchive /blog/ 10]

Konfigurera en annan plats, URL med undermapp för varje år:

    BlogLocation: /blog/
    BlogNewLocation: /blog/@year/@title

## Inställningar

Följande inställningar kan konfigureras i filen `system/extensions/yellow-system.ini`:

`BlogLocation` = plats för bloggen, tom betyder aktuell mapp  
`BlogNewLocation` = plats för nya bloggsidor, [stödda platshållare](#inställningar-placeholders)  
`BlogPagesMax` = antal sidor att visa per förkortning, 0 för obegränsad  
`BlogPaginationLimit` = antal inlägg att visa per sida  

<a id="inställningar-placeholders"></a>Följande platshållare för nya bloggsidor stöds:

`@title` = namn på sidan  
`@timestamp` = sidans publiceringsdatum som tidsstämpel  
`@date` = sidans publiceringsdatum, ÅÅÅÅ-MM-DD format  
`@year` = sidans publiceringsår  
`@month` = sidans publiceringsmånad  
`@day` = sidans publiceringsdag  
`@tag` = taggar för kategorisering av sidan  
`@author` = sedans författare  

<a id="inställningar-files"></a>Följande filer kan anpassas:

`content/shared/page-new-blog.md` = innehållsfil för ny bloggsida  
`system/layouts/blogpages.html` = layoutfil för huvudbloggsida  
`system/layouts/blog.html` = layoutfil för enskild bloggsida  

## Installation

[Ladda ner tillägg](https://github.com/datenstrom/yellow-extensions/raw/master/zip/blog.zip) och kopiera zip-fil till din `system/extensions` mapp. Högerklicka om du använder Safari.

## Utvecklare

Datenstrom. [Få hjälp](https://datenstrom.se/sv/yellow/help/).
