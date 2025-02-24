<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Sitemap 0.8.10

Webbplatskarta med alla sidor.

<p align="center"><img src="sitemap-screenshot.png?raw=true" width="795" height="836" alt="Skärmdump"></p>

## Hur man använder en webbplatskarta 

Webbplatskartan är tillgänglig som `http://website/sitemap/` och `http://website/sitemap/page:sitemap.xml`. Det är en översikt över hela webbplatsen, endast synliga sidor ingår. Du kan lägga till en länk till webbplatskartan någonstans på din webbplats.

## Exempel

Innehållsfil med länk till webbplatskarta:

    ---
    Title: Exempelsida
    ---
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.
    
    [Se alla sidor](/sitemap/).

## Inställningar

Följande inställningar kan konfigureras i filen `system/extensions/yellow-system.ini`:

`SitemapLocation` = plats för webbplatskartan  
`SitemapFileXml` = filnamn för webbplatskartan med XML-information  
`SitemapPaginationLimit` = antal inlägg att visa per sida  

Följande filer kan anpassas:

`system/layouts/sitemap.html` = layoutfil för webbplatskarta  

## Installation

[Ladda ner tillägg](https://github.com/datenstrom/yellow-extensions/raw/master/zip/sitemap.zip) och kopiera zip-fil till din `system/extensions` mapp. Högerklicka om du använder Safari.

## Utvecklare

Datenstrom. [Få hjälp](https://datenstrom.se/sv/yellow/help/).
