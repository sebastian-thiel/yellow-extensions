<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Core 0.8.53

Webbplatsens kärnfunktion.

<p align="center"><img src="core-screenshot.png?raw=true" width="795" height="836" alt="Skärmdump"></p>

## Hur man redigerar en webbplats i textredigeraren

Du kan använda din favorittextredigerare och ändra allt i filhanteraren. Mappen `content` innehåller webbplatsen innehållsfilerna. Du kan redigera webbplatsen här. Mappen `media` innehåller webbplatsens mediefiler. Du kan lagra bilder och andra filer här. Mappen `system` innehåller webbplatsens systemfilerna. Du kan anpassa webbplatsen och utveckla tillägg här.

## Hur man döljer en sida

Ställ `Status: unlisted` i [sidinställningarna](#inställningar-page) högst upp på en sida. Sidan är inte längre synlig i navigations- och sökresultat. Du kan välja mellan olika [statusvärden](#inställningar-status) för att kontrollera vem som kan se och komma åt en sida. 

## Hur man omdirigerar en sida

Ställ `Redirect` i [sidinställningarna](#inställningar-page) högst upp på en sida. Sidan omdirigeras till en annan sida eller URL. Du kan fortsätta att redigera sidan i [webbläsaren](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit/README-sv.md) och filsystemet. 

## Exempel

Innehållsfil med normal sida:

    ---
    Title: Normal sida
    ---
    Detta är en exempelsida.

Innehållsfil med olistad sida:

    ---
    Title: Olistad sida
    Status: unlisted
    ---
    Den här sidan är inte synlig i navigations- och sökresultat.

Innehållsfil med omdirigering:

    ---
    Title: Omdirigera sida
    Redirect: https://datenstrom.se/sv/yellow/
    ---
    Den här sidan omdirigeras till en annan sida.

## Inställningar

<a id="inställningar-system"></a>Följande inställningar kan konfigureras i filen `system/extensions/yellow-system.ini`:

`Sitename` = webbplatsens namn  
`Author` = webmasterns namn  
`Email` = webmasterns email  
`Theme` = standardtema  
`Language` = standardspråk  
`Layout` = standardlayout  
`Parser` = standard sidparser  
`Status` = standard sidstatus, [stödda statusvärden](#inställningar-status)  
`CoreStaticUrl` = URL för den statiska webbplatsen  
`CoreServerUrl` = URL av webbplatsen, `auto` för automatisk detektering  
`CoreServerTimezone` = webbplatsens tidszon  
`CoreMultiLanguageMode` = aktivera flerspråkigt läge, 1 eller 0  
`CoreTrashTimeout` = lagring av raderade filer i sekunder  

<a id="inställningar-page"></a>Följande inställningar kan konfigureras högst upp på en sida:

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
`Status` = sidans status, [stödda statusvärden](#inställningar-status)  
`Redirect` = omdirigera till en ny sida eller URL  
`Image` = sidans bild  
`ImageAlt` = beskrivning av sidans bild  
`Modified` = sidans ändringsdatum, ÅÅÅÅ-MM-DD format  
`Published` = sidans publiceringsdatum, ÅÅÅÅ-MM-DD format  
`Tag` = taggar för kategorisering av sidan, kommaseparerade  
`Build` = alternativ för att bygga en statisk webbplats, kommaseparerade  
`Comment` = alternativ för att visa kommentarer, kommaseparerade  

<a id="inställningar-status"></a>Följande sidstatusvärden stöds:

`public` = sidan är en vanlig sida  
`private` = sidan är inte synlig, användaren måste ange lösenord, [kräver private-tillägg](https://github.com/schulle4u/yellow-extensions-schulle4u/tree/master/private)  
`draft` = sidan är inte synlig, användaren måste logga in, [kräver draft-tillägg](https://github.com/datenstrom/yellow-extensions/tree/master/source/draft)  
`unlisted` = sidan är inte synlig, men kan nås med rätt länk  
`shared` = sidan är inte synlig, men kan ingå i andra sidor  

<a id="inställningar-files"></a>Följande filer kan anpassas:

`content/shared/page-error-404.md` = innehållsfil för felsida  
`system/layouts/default.html` = layoutfil för standardsidan  
`system/layouts/error.html` = layoutfil för felsidan  
`system/layouts/header.html` = layoutfil för standard HTML-header  
`system/layouts/footer.html` = layoutfil för standard HTML-footer  
`system/layouts/navigation.html` = layoutfil för standard HTML-navigering  
`system/layouts/pagination.html` = layoutfil för standard HTML-paginering  

## Installation

[Ladda ner tillägg](https://github.com/datenstrom/yellow-extensions/raw/master/zip/core.zip) och kopiera zip-fil till din `system/extensions` mapp. Högerklicka om du använder Safari.

## Utvecklare

Datenstrom. [Få hjälp](https://datenstrom.se/sv/yellow/help/).
