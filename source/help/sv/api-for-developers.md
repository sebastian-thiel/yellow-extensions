---
Title: API för utvecklare
---
Vi <3 människor som kodar. 

[toc]

## Mappstruktur

Följande mappar är tillgängliga i standardinstallationen:

```
├── content               = innehållsfiler
│   ├── 1-home            = hemsida
│   ├── 9-about           = informationssida
│   └── shared            = delade filer
├── media                 = mediefiler
│   ├── downloads         = filer för nedladdning
│   ├── images            = bildfiler för innehåll
│   └── thumbnails        = miniatyrbilder för innehåll
└── system                = systemfiler
    ├── extensions        = installerade tillägg och konfigurationsfilar
    ├── layouts           = konfigurerbara layoutfiler
    ├── themes            = konfigurerbara temafiler
    └── trash             = raderade filer
```

Mappen `content` innehåller webbplatsen innehållsfilerna. Du kan redigera webbplatsen här. Mappen `media` innehåller webbplatsens mediefiler. Du kan lagra bilder och andra filer här. Mappen `system` innehåller webbplatsens systemfilerna. Du kan anpassa webbplatsen och utveckla tillägg här. 

## Objekt

Följande objekt är tillgängliga: 

`$this->yellow->page` = [tillgång till aktuella sidan](#yellow-page)  
`$this->yellow->content` = [tillgång till innehållsfiler](#yellow-content)  
`$this->yellow->media` = [tillgång till mediefiler](#yellow-media)  
`$this->yellow->system` = [tillgång till systeminställningar](#yellow-system)  
`$this->yellow->user` = [tillgång till användarinställningar](#yellow-user)  
`$this->yellow->language` = [tillgång till språkinställningar](#yellow-language)  
`$this->yellow->extension` = [tillgång till tillägg](#yellow-extension)  
`$this->yellow->toolbox` = [tillgång till verktygslådan med hjälpfunktioner](#yellow-toolbox)  

Med hjälp av `$this->yellow` kan man komma åt webbplatsen. API:et är uppdelat i flera objekt och speglar i princip filsystemet. I verktygslådan hittar man hjälpfunktioner och filåtgärder för egna tillägg. Källkoden för hela API finns i filen `system/extensions/core.php`. 

### Yellow page

Yellow page ger tillgång till aktuella sidan:

**page->get($key)**  
Returnera [sidinställning](how-to-adjust-system#sidinställningar) 

**page->getHtml($key)**  
Returnera [sidinställning](how-to-adjust-system#sidinställningar), HTML-kodad  

**page->getDate($key, $format = "")**  
Returnera [sidinställning](how-to-adjust-system#sidinställningar) som [språkspecifikt datum](how-to-adjust-system#språkinställningar)  

**page->getDateHtml($key, $format = "")**  
Returnera [sidinställning](how-to-adjust-system#sidinställningar) som [språkspecifikt datum](how-to-adjust-system#språkinställningar), HTML-kodad  

**page->getDateRelative($key, $format = "", $daysLimit = 30)**  
Returnera [sidinställning](how-to-adjust-system#sidinställningar) som [språkspecifikt datum](how-to-adjust-system#språkinställningar), i förhållande till idag 

**page->getDateRelativeHtml($key, $format = "", $daysLimit = 30)**  
Returnera [sidinställning](how-to-adjust-system#sidinställningar) som [språkspecifikt datum](how-to-adjust-system#språkinställningar), i förhållande till idag, HTML-kodad

**page->getDateFormatted($key, $format)**  
Returnera [sidinställning](how-to-adjust-system#sidinställningar) som [datum](https://www.php.net/manual/en/function.date.php)  

**page->getDateFormattedHtml($key, $format)**  
Returnera [sidinställning](how-to-adjust-system#sidinställningar) som [datum](https://www.php.net/manual/en/function.date.php), HTML-kodad  

**page->getContent($rawFormat = false, $sizeMax = 0)**  
Returnera sidinnehåll, HTML-kodat eller råformat

**page->getParent()**  
Returnera överordnad sida, null om ingen

**page->getParentTop($homeFallback = false)**  
Returnera överordnad sida på toppnivå, null om ingen 

**page->getSiblings($showInvisible = false)**  
Returnera [page collection](#yellow-page-collection) med sidor på samma nivå 

**page->getChildren($showInvisible = false)**  
Returnera [page collection](#yellow-page-collection) med barnsidor

**page->getChildrenRecursive($showInvisible = false, $levelMax = 0)**  
Returnera [page collection](#yellow-page-collection) med barnsidor rekursivt

**page->getPages($key)**  
Returnera [page collection](#yellow-page-collection) med ytterligare sidor

**page->getPage($key)**  
Returnera delad sida

**page->getUrl()**  
Returnera sidans URL

**page->getBase($multiLanguage = false)**  
Returnera sidans bas

**page->getLocation($absoluteLocation = false)**  
Returnera sidans plats

**page->getRequest($key)**  
Returnera requestargument av sidan

**page->getRequestHtml($key)**  
Returnera requestargument av sidan, HTML-kodad

**page->getHeader($key)**  
Returnera responseheader av sidan

**page->getExtra($name)**  
Returnera extra data för sidan

**page->getModified($httpFormat = false)**  
Returnera sidans ändringsdatum, Unix-tid eller HTTP-format

**page->getLastModified($httpFormat = false)**  
Returnera sidans senaste ändringsdatum, Unix-tid eller HTTP-format

**page->getStatusCode($httpFormat = false)**  
Returnera sidans statuskod, nummer eller HTTP-format

**page->error($statusCode, $pageError = "")**  
Svara med felsidan

**page->clean($statusCode, location = "")**  
Svara med statuskod, inget sidinnehåll

**page->isAvailable()**  
Kontrollera om sidan är tillgänglig

**page->isVisible()**  
Kontrollera om sidan är synlig

**page->isActive()**  
Kontrollera om sidan ligger inom aktuella HTTP-begäran

**page->isCacheable()**  
Kontrollera om sidan är cachningsbar 

**page->isError()**  
Kontrollera om sidan med fel

**page->isExisting($key)**  
Kontrollera om [sidinställning](how-to-adjust-system#sidinställningar) finns  

**page->isRequest($key)**  
Kontrollera om requestargument finns 

**page->isHeader($key)**  
Kontrollera om responseheader finns

**page->isPage($key)**  
Kontrollera om delad sida finns

Här är en exempellayout för att visa sidinnehåll:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php echo $this->yellow->page->getContent() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att visa sidinnehåll och författare:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p><?php echo $this->yellow->page->getHtml("author") ?></p>
<?php echo $this->yellow->page->getContent() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att visa sidinnehåll och modifieringsdatum:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p><?php echo $this->yellow->page->getDateHtml("modified") ?></p>
<?php echo $this->yellow->page->getContent() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow page collection

Yellow page collection ger tillgång till flera sidor:

**pages->filter($key, $value, $exactMatch = true)**  
Filtrera page collection efter [sidinställning](how-to-adjust-system#sidinställningar)

**pages->match($regex = "/.*/")**  
Filtrera page collection efter filnamn

**pages->sort($key, $ascendingOrder = true)**  
Sortera page collection efter [sidinställning](how-to-adjust-system#sidinställningar)

**pages->similar($page, $ascendingOrder = false)**  
Sortera page collection efter inställningslikhet

**pages->merge($input)**  
Beräkna union, lägg till en page collection

**pages->intersect($input)**  
Beräkna korsningen, ta bort sidor som inte finns i en annan page collection

**pages->diff($input)**  
Beräkna skillnaden, ta bort sidor som finns i en annan page collection

**pages->append($page)**  
Lägg till slutet av page collection

**pages->prepend($page)**  
Placera i början av page collection

**pages->limit($pagesMax)**  
Begränsa antalet sidor i page collection

**pages->reverse()**  
Omvänd page collection

**pages->shuffle()**  
Gör page collection slumpmässig

**pages->pagination($limit, $reverse = true)**  
Skapa en paginering för page collection

**pages->getPaginationNumber()**  
Returnera aktuellt sidnummer i paginering

**pages->getPaginationCount()**  
Returnera högsta sidnummer i paginering

**pages->getPaginationLocation($absoluteLocation = true, $pageNumber = 1)**  
Returnera plats för en sida i paginering 

**pages->getPaginationPrevious($absoluteLocation = true)**  
Returnera plats för föregående sida i paginering

**pages->getPaginationNext($absoluteLocation = true)**  
Returnera plats för nästa sida i paginering

**pages->getPagePrevious($page)**  
Returnera föregående sida i page collection, null om ingen 

**pages->getPageNext($page)**  
Returnera nästa sida i page collection, null om ingen 

**pages->getFilter()**  
Returnera nuvarande sidfilter 

**pages->getModified($httpFormat = false)**  
Returnera ändringsdatum för page collection, Unix-tid eller HTTP-format  

**pages->isPagination()**  
Kontrollera om det finns en paginering

Här är en exempellayout för att visa tre slumpmässiga sidor:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index()->shuffle()->limit(3) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att visa senaste sidor:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index()->sort("modified", false) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att visa draftsidor:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index(true, true)->filter("status", "draft") ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow content

Yellow content ger tillgång till innehållsfiler:

**content->find($location, $absoluteLocation = false)**  
Returnera [page](#yellow-page), null om det inte finns

**content->index($showInvisible = false, $multiLanguage = false, $levelMax = 0)**  
Returnera [page collection](#yellow-page-collection) med alla sidor

**content->top($showInvisible = false, $showOnePager = true)**  
Returnera [page collection](#yellow-page-collection) med navigering på toppnivå

**content->path($location, $absoluteLocation = false)**  
Returnera [page collection](#yellow-page-collection) med sökväg i navigering

**content->multi($location, $absoluteLocation = false, $showInvisible = false)**  
Returnera [page collection](#yellow-page-collection) med flera språk i flerspråkigt läge

**content->clean()**  
Returnera [page collection](#yellow-page-collection) som är tom

Här är en exempellayout för att visa alla sidor:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->index(true, true) ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att visa sidor under en viss plats:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->find("/help/")->getChildren() ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("title") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att visa navigationssidor på toppnivå:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $pages = $this->yellow->content->top() ?>
<?php $this->yellow->page->setLastModified($pages->getModified()) ?>
<ul>
<?php foreach ($pages as $page): ?>
<li><?php echo $page->getHtml("titleNavigation") ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow media

Yellow media ger tillgång till mediefiler:

**media->find($location, $absoluteLocation = false)**  
Returnera [page](#yellow-page) med information om mediefilen, null om det inte finns

**media->index($showInvisible = false, $multiPass = false, $levelMax = 0)**  
Returnera [page collection](#yellow-page-collection) med alla mediefiler

**media->clean()**  
Returnera [page collection](#yellow-page-collection) som är tom

Här är en exempellayout för att visa alla mediefiler:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $files = $this->yellow->media->index(true) ?>
<?php $this->yellow->page->setLastModified($files->getModified()) ?>
<ul>
<?php foreach ($files as $file): ?>
<li><?php echo $file->getLocation(true) ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att visa senaste mediefiler:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $files = $this->yellow->media->index()->sort("modified", false) ?>
<?php $this->yellow->page->setLastModified($files->getModified()) ?>
<ul>
<?php foreach ($files as $file): ?>
<li><?php echo $file->getLocation(true) ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att visa mediefiler av en viss typ:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $files = $this->yellow->media->index()->filter("type", "pdf") ?>
<?php $this->yellow->page->setLastModified($files->getModified()) ?>
<ul>
<?php foreach ($files as $file): ?>
<li><?php echo $file->getLocation(true) ?></li>
<?php endforeach ?>
</ul>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow system

Yellow system ger tillgång till systeminställningar:

**system->get($key)**  
Returnera [systeminställning](how-to-adjust-system#systeminställningar)

**system->getHtml($key)**  
Returnera [systeminställning](how-to-adjust-system#systeminställningar), HTML-kodad

**system->getSettings($filterStart = "", $filterEnd = "")**  
Returnera [systeminställningar](how-to-adjust-system#systeminställningar)

**system->getValues($key)**  
Returnera stödda värden för en [systeminställning](how-to-adjust-system#systeminställningar), tom om det inte är känt

**system->getModified($httpFormat = false)**  
Returnera ändringsdatum for [systeminställningar](how-to-adjust-system#systeminställningar), Unix-tid eller HTTP-format

**system->isExisting($key)**  
Kontrollera om [systeminställning](how-to-adjust-system#systeminställningar) finns

Här är en exempellayout för att visa webbansvarig:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php echo "Name: ".$this->yellow->system->getHtml("author")."<br />" ?>
<?php echo "Email: ".$this->yellow->system->getHtml("email")."<br />" ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att kontrollera om en specifik inställning är aktiverad: 

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php $multiLanguageMode = $this->yellow->system->get("coreMultiLanguageMode") ?>
Multi language mode is <?php echo htmlspecialchars($multiLanguageMode ? "on" : "off") ?>.
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att visa core-inställningar: 

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->system->getSettings("core") as $key=>$value): ?>
<?php echo htmlspecialchars("$key: $value") ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow user

Yellow user ger tillgång till användarinställningar:

**user->getUser($key, $email = "")**  
Returnera [användarinställning](how-to-adjust-system#användarinställningar)

**user->getUserHtml($key, $email = "")**  
Returnera [användarinställning](how-to-adjust-system#användarinställningar), HTML encoded

**user->getSettings($email = "")**  
Returnera [användarinställningar](how-to-adjust-system#användarinställningar)

**user->getModified($httpFormat = false)**  
Returnera ändringsdatum för [användarinställningar](how-to-adjust-system#användarinställningar), Unix-tid eller HTTP-format

**user->isUser($key, $email = "")**  
Kontrollera om [användarinställning](how-to-adjust-system#användarinställningar) finns

**user->isExisting($email)**  
Kontrollera om användaren finns

Här är en exempellayout för att visa den aktuella användaren:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php echo "Name: ".$this->yellow->user->getUserHtml("name")."<br />" ?>
<?php echo "Email: ".$this->yellow->user->getUserHtml("email")."<br />" ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att kontrollera om en användare är inloggad:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $found = $this->yellow->user->isUser("name") ?>
<p>You are <?php echo htmlspecialchars($found? "" : "not") ?> logged in.</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att visa användare och deras status:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->system->getValues("email") as $email): ?>
<?php echo $this->yellow->user->getUserHtml("name", $email) ?> - 
<?php echo $this->yellow->user->getUserHtml("status", $email) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow language

Yellow language ger tillgång till språkinställningar:

**language->getText($key, $language = "")**  
Returnera [språkinställning](how-to-adjust-system#språkinställningar)

**language->getTextHtml($key, $language = "")**  
Returnera [språkinställning](how-to-adjust-system#språkinställningar), HTML-kodad

**language->getSettings($filterStart = "", $filterEnd = "", $language = "")**  
Returnera [språkinställningar](how-to-adjust-system#språkinställningar)

**language->getModified($httpFormat = false)**  
Returnera ändringsdatum för [språkinställningar](how-to-adjust-system#språkinställningar), Unix-tid eller HTTP-format

**language->isText($key, $language = "")**  
Kontrollera om [språkinställning](how-to-adjust-system#språkinställningar) finns

**language->isExisting($language)**  
Kontrollera om språket finns

Här är en exempellayout för att visa en språkinställning:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p><?php echo $this->yellow->language->getTextHtml("wikiModified") ?> 
<?php echo $this->yellow->page->getDateHtml("modified") ?></p>
<?php echo $this->yellow->page->getContent() ?>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att kontrollera om ett specifikt språk finns:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $found = $this->yellow->language->isExisting("sv") ?>
<p>Swedish language <?php echo htmlspecialchars($found? "" : "not") ?> installed.</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att visa språk och översättare:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach ($this->yellow->system->getValues("language") as $language): ?>
<?php echo $this->yellow->language->getTextHtml("languageDescription", $language) ?> - 
<?php echo $this->yellow->language->getTextHtml("languageTranslator", $language) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

### Yellow extension

Yellow extension ger tillgång till tillägg:

**extension->get($key)**  
Returnera tillägg

**extension->getModified($httpFormat = false)**  
Returnera ändringsdatum för tilläg, Unix-tid eller HTTP-format

**extension->isExisting($key)**  
Kontrollera om tilläget finns

Här är en exempellayout för att visa tillägg:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<p>
<?php foreach($this->yellow->extension->data as $key=>$value): ?>
<?php echo htmlspecialchars($key." ".$value["version"]) ?><br />
<?php endforeach ?>
</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempellayout för att kontrollera om ett specifikt tillägg finns:

``` html
<?php $this->yellow->layout("header") ?>
<div class="content">
<div class="main" role="main">
<h1><?php echo $this->yellow->page->getHtml("titleContent") ?></h1>
<?php $found = $this->yellow->extension->isExisting("search") ?>
<p>Search extension <?php echo htmlspecialchars($found ? "" : "not") ?> installed.</p>
</div>
</div>
<?php $this->yellow->layout("footer") ?>
```

Här är en exempelkod för att anropa en funktion från ett annat tillägg:

``` php
if ($this->yellow->extension->isExisting("image")) {
    $fileName = $this->yellow->system->get("coreImageDirectory")."photo.jpg";
    list($src, $width, $height) = $this->yellow->extension->get("image")->getImageInformation($fileName, "100%", "100%");
    echo "<img src=\"".htmlspecialchars($src)."\" width=\"".htmlspecialchars($width)."\" height=\"".htmlspecialchars($height)."\" />";
}
```

### Yellow toolbox

Yellow toolbox ger tillgång till verktygslådan med hjälpfunktioner:

**toolbox->getCookie($key)**  
Returnera webbläsarkakan för aktuella HTTP-begäran

**toolbox->getServer($key)**  
Returnera serverargument för aktuella HTTP-begäran

**toolbox->getDirectoryEntries($path, $regex = "/.*/", $sort = true, $directories = true, $includePath = true)**  
Returnera filer och kataloger

**toolbox->getDirectoryEntriesRecursive($path, $regex = "/.*/", $sort = true, $directories = true, $levelMax = 0)**  
Returnera filer och kataloger rekursivt

**toolbox->readFile($fileName, $sizeMax = 0)**  
Läs fil, tom sträng om den inte hittas

**toolbox->createFile($fileName, $fileData, $mkdir = false)**  
Skapa fil  

**toolbox->appendFile($fileName, $fileData, $mkdir = false)**  
Lägg till fil

**toolbox->copyFile($fileNameSource, $fileNameDestination, $mkdir = false)**  
Kopiera fil

**toolbox->renameFile($fileNameSource, $fileNameDestination, $mkdir = false)**  
Byt namn på en fil

**toolbox->renameDirectory($pathSource, $pathDestination, $mkdir = false)**  
Byt namn på en mapp

**toolbox->deleteFile($fileName, $pathTrash = "")**  
Radera fil  

**toolbox->deleteDirectory($path, $pathTrash = "")**  
Radera mapp  

**toolbox->modifyFile($fileName, $modified)**  
Ställ in ändringsdatum för fil/mapp, Unix-tid 

**toolbox->getFileModified($fileName)**  
Returnera ändringsdatum för fil/mapp, Unix-tid 

**toolbox->getFileType($fileName)**  
Returnera filtyp

**toolbox->getTextLines($text)**  
Returnera rader från text, inklusive radbrytningar

**toolbox->getTextList($text, $separator, $size)**  
Returnera array med specifik storlek från text 

**toolbox->getTextArguments($text, $optional = "-", $sizeMin = 9)**  
Returnera array med variabel storlek från text, separerade av mellanslag

**toolbox->createTextDescription($text, $lengthMax = 0, $removeHtml = true, $endMarker = "", $endMarkerText = "")**  
Skapa textbeskrivning, med eller utan HTML

**toolbox->normaliseArguments($text, $appendSlash = true, $filterStrict = true)**  
Normalisera platsargument

**toolbox->normaliseData($text, $type = "html", $filterStrict = true)**  
Normalisera element och attribut i HTML/SVG-data 

**toolbox->normalisePath($text)**  
Normalisera relativa sökvägsandelar 

Här är en exempelkod för att läsa textrader från filen:

``` php
$fileName = $this->yellow->system->get("coreExtensionDirectory").$this->yellow->system->get("coreSystemFile");
$fileData = $this->yellow->toolbox->readFile($fileName);
foreach ($this->yellow->toolbox->getTextLines($fileData) as $line) {
    echo $line;
}
```

Här är en exempelkod för att visa filer i en mapp:

``` php
$path = $this->yellow->system->get("coreExtensionDirectory");
foreach ($this->yellow->toolbox->getDirectoryEntries($path, "/.*/", true, false) as $entry) {
    echo "Found file $entry\n";
}
```

Här är en exempelkod för att ändra text i flera filer:

``` php
$path = $this->yellow->system->get("coreContentDirectory");
foreach ($this->yellow->toolbox->getDirectoryEntriesRecursive($path, "/^.*\.md$/", true, false) as $entry) {
    $fileData = $fileDataNew = $this->yellow->toolbox->readFile($entry);
    $fileDataNew = str_replace("I drink a lot of water", "I drink a lot of coffee", $fileDataNew);
    if ($fileData!=$fileDataNew && !$this->yellow->toolbox->createFile($entry, $fileDataNew)) {
        $this->yellow->log("error", "Can't write file '$entry'!");
    }
}
```

## Händelser

Följande händelser är tillgängliga:

```
onLoad ───────▶ onStartup ───────────────────────────────────────────┐
                    │                                                │
                    ▼                                                │
                onRequest ───────────────────┐                       │
                    │                        │                       │
                    ▼                        ▼                       ▼
                onParseMeta              onEditContentFile       onCommand  
                onParseContentRaw        onEditMediaFile         onCommandHelp
                onParseContentShortcut   onEditSystemFile            │
                onParseContentHtml       onEditUserAccount           │
                onParsePageLayout            │                       ▼
                onParsePageExtra             │                   onUpdate
                onParsePageOutput            │                   onLog
                    │                        │                       │
                    ▼                        │                       │
                onShutDown ◀─────────────────┴───────────────────────┘
```

När en sida visas laddas tilläggen och `onLoad` anropas. Så snart alla tillägg har laddats kallas `onStartup`. Sidan kan hanteras med olika `onParse` händelser. Sedan genereras sidinnehållet. Om ett fel har inträffat genereras en felsida. Slutligen matas sidan ut och `onShutdown` anropas.

När en sida redigeras laddas tilläggen och `onLoad` anropas. Så snart alla tillägg har laddats kallas `onStartup`. Ändringar av sidan kan hanteras med olika `onEdit` händelser. Sedan sparas sidan. Slutligen skickas en statuskod för omladdning av sidan och `onShutdown` anropas.

När ett kommando körs laddas tilläggen och `onLoad` anropas. Så snart alla tillägg har laddats kallas `onStartup`. Kommandot kan hanteras med `onCommand`. Om inget kommando har angetts anropas `onCommandHelp` och tillägg kan ge hjälp. Slutligen skickas en returkod och `onShutdown` anropas.

### Yellow core händelser

Yellow core händelser meddelar när en sida visas eller ett tillstånd ändras:

**public function onLoad($yellow)**  
Hantera initialisering

**public function onStartup()**  
Hantera start

**public function onUpdate($action)**  
Hantera uppdatering

**public function onRequest($scheme, $address, $base, $location, $fileName)**  
Hantera begäran

**public function onParseMeta($page)**  
Hantera [metadata av en sida](how-to-adjust-system#sidinställningar)

**public function onParseContentRaw($page, $text)**  
Hantera sidinnehåll i råformat

**public function onParseContentShortcut($page, $name, $text, $type)**  
Hantera sidinnehåll av förkortning

**public function onParseContentHtml($page, $text)**  
Hantera sidinnehåll i HTML-format

**public function onParsePageLayout($page, $name)**  
Hantera sidlayout

**public function onParsePageExtra($page, $name)**  
Hantera extra data för sidan

**public function onParsePageOutput($page, $text)**  
Hantera output data för sidan

**public function onLog($action, $message)**  
Hantera loggning

**public function onShutdown()**  
Hantera avstängningen

Här är ett exempel tillägg för hantering av en `[example]` förkortning:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.1";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle page content of shortcut
    public function onParseContentShortcut($page, $name, $text, $type) {
        $output = null;
        if ($name=="example" && ($type=="block" || $type=="inline")) {
            $output = "<div class=\"".htmlspecialchars($name)."\">";
            $output .= "Add more HTML code here";
            $output .= "</div>";
        }
        return $output;
    }
}
```

### Yellow edit händelser

Yellow edit händelser meddelar när en sida redigeras:

**public function onEditContentFile($page, $action, $email)**  
Hantera innehållsfiländringar

**public function onEditMediaFile($file, $action, $email)**  
Hantera mediefiländringar

**public function onEditSystemFile($file, $action, $email)**  
Hantera systemfiländringar

**public function onEditUserAccount($action, $email, $password)**  
Hantera ändringar av användarkonton

Här är ett exempel på tillägg för hantering av en fil:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.2";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle media file changes
    public function onEditMediaFile($file, $action, $email) {
        if ($action=="upload") {
            $fileName = $file->fileName;
            $fileType = $this->yellow->toolbox->getFileType($file->get("fileNameShort"));
            // Add more code here
        }
    }
}
```

### Yellow command händelser

Yellow command händelser när ett kommando körs:

**public function onCommand($command, $text)**  
Hantera kommandon

**public function onCommandHelp()**  
Hantera hjälp för kommandon

Här är ett exempel på tillägg för hantering av ett kommando:

``` php
<?php
class YellowExample {
    const VERSION = "0.1.3";
    public $yellow;         // access to API
    
    // Handle initialisation
    public function onLoad($yellow) {
        $this->yellow = $yellow;
    }
    
    // Handle command
    public function onCommand($command, $text) {
        $statusCode = 0;
        if ($command=="example") {
            echo "Yellow $command: Add more text here\n";
            $statusCode = 200;
        }
        return $statusCode;
    }

    // Handle command help
    public function onCommandHelp() {
        return "example\n";
    }
}
```

## Diverse

Följande funktioner utökar PHP-strängfunktioner: 

**strtoloweru($string)**  
Konvertera sträng till gemener, UTF-8-kompatibel

**strtoupperu($string)**  
Konvertera sträng till versaler, UTF-8-kompatibel

**strlenu($string)** + **strlenb($string)**  
Returnera stränglängd, UTF-8 tecken eller byte

**strposu($string, $search)** + **strposb($string, $search)**  
Returnera strängposition för första träffen, UTF-8 tecken eller byte

**strrposu($string, $search)** + **strrposb($string, $search)**  
Returnera strängposition för senaste träffen, UTF-8 tecken eller byte

**substru($string, $start, $length)** + **substrb($string, $start, $length)**  
Returnera en del av en sträng, UTF-8-tecken eller byte

**strempty($string)**  
Kontrollera om strängen är tom

Här är en exempelkod för att använda olika strängfunktioner:

```php
$string = "Datenstrom Yellow är för människor som skapar små webbsidor";
echo strtoloweru($string);    // datenstrom yellow är för människor som skapar små webbsidor
echo strtoupperu($string);    // DATENSTROM YELLOW ÄR FÖR MÄNNISKOR SOM SKAPAR SMÅ WEBBSIDOR

$string = "Text med UTF-8 tecken åäö";
echo strlenu($string);        // 25
echo strposu($string, "UTF"); // 9
echo substru($string, -3, 3); // åäö

var_dump(strempty("text"));   // bool(false)
var_dump(strempty("0"));      // bool(false)
var_dump(strempty(""));       // bool(true)
```

## Relaterad information

* [Hur man använder kommandoraden](https://github.com/datenstrom/yellow-extensions/blob/master/source/command/README-sv.md)
* [Hur man utökar en webbplats](https://github.com/datenstrom/yellow-extensions/blob/master/source/update/README-sv.md)
* [Hur man publicerar ett tillägg](https://github.com/datenstrom/yellow-extensions/tree/master/source/publish/README-sv.md)

Har du några frågor? [Få hjälp](.) och [engagera dig](contributing-guidelines).
