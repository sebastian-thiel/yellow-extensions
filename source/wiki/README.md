<p align="right"><a href="README-de.md">Deutsch</a> &nbsp; <a href="README.md">English</a> &nbsp; <a href="README-sv.md">Svenska</a></p>

# Wiki 0.8.13

Wiki for your website.

<p align="center"><img src="wiki-screenshot.png?raw=true" width="795" height="836" alt="Screenshot"></p>

## How to use a wiki

The wiki is available on your website as `http://website/wiki/`. To show the wiki on the home page, go to your `content` folder and delete the `1-home` folder. To create a new wiki page, add a new file to the wiki folder. Set `Title` and other [page settings](https://github.com/datenstrom/yellow-extensions/tree/master/source/core#settings-page) at the top of a page. Use `Tag` to group similar pages together.

## How to show wiki information

You can use shortcuts to show information about the wiki:

`[wikiauthors]` for a list of authors  
`[wikitags]` for a list of tags  
`[wikirelated]` for a list of pages, related to the current page    
`[wikipages]` for a list of pages, alphabetic order  
`[wikichanges]` for a list of pages, modified order  

The following arguments are available, all but the first argument are optional:

`Location` = wiki location  
`PagesMax` = number of pages to show per shortcut, 0 for unlimited  
`Author` = show pages by a specific author, `[wikipages]` or `[wikichanges]` only  
`Tag` = show pages with a specific tag, `[wikipages]` or `[wikichanges`] only  

## Examples

Content file with wiki page:

    ---
    Title: Wiki page
    Layout: wiki
    Tag: Example
    ---
    This is an example wiki page.

    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
    labore et dolore magna pizza. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit 
    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt 
    in culpa qui officia deserunt mollit anim id est laborum.

Content file with wiki page:

    ---
    Title: Coffee is good for you
    Layout: wiki
    Tag: Example, Coffee
    ---
    Coffee is a beverage made from the roasted beans of the coffee plant.
    
    1. Start with fresh coffee. Coffee beans start losing quality immediately 
       after roasting and grinding. The best coffee is made from beans ground 
       right after roasting. 
    2. Brew a cup of coffee. Coffee is prepared with different methods and 
       additional flavorings such as milk and sugar. There are Espresso, Filter 
       coffee, French press, Italian Moka, Turkish coffee and many more. Find 
       out what's your favorite.
    3. Enjoy.

Showing links to wiki:

    [See all pages](/wiki/special:pages/)
    [See recent changes](/wiki/special:changes/)
    [See examples](/wiki/tag:example/)

Showing latest wiki pages:

    [wikichanges /wiki/ 0]
    [wikichanges /wiki/ 3]
    [wikichanges /wiki/ 10]

Showing list of tags:

    [wikitags /wiki/ 0]
    [wikitags /wiki/ 3]
    [wikitags /wiki/ 10]

Showing list of pages:

    [wikipages /wiki/ 0]
    [wikipages /wiki/ 3]
    [wikipages /wiki/ 10]

Showing list of pages, by a specific author or tag:

    [wikipages /wiki/ 10 Datenstrom]
    [wikipages /wiki/ 10 - coffee]
    [wikipages /wiki/ 10 - example]

Configuring different location, URL with subfolder for categorisation:

    WikiLocation: /wiki/
    WikiNewLocation: /wiki/@tag/@title

## Settings

The following settings can be configured in file `system/extensions/yellow-system.ini`:

`WikiLocation` = wiki location, empty means current folder  
`WikiNewLocation` = location for new wiki pages, [supported placeholders](#settings-placeholders)  
`WikiPagesMax` = number of pages to show per shortcut, 0 for unlimited  
`WikiPaginationLimit` = number of entries to show per page  

<a id="settings-placeholders"></a>The following placeholders for new wiki pages are supported:

`@title` = page title  
`@tag` = page tag for categorisation  
`@author` = page author  

<a id="settings-files"></a>The following files can be customised:

`content/shared/page-new-wiki.md` = content file for new wiki page  
`system/layouts/wikipages.html` = layout file for main wiki page  
`system/layouts/wiki.html` = layout file for individual wiki page  

## Installation

[Download extension](https://github.com/datenstrom/yellow-extensions/raw/master/zip/wiki.zip) and copy zip file into your `system/extensions` folder. Right click if you use Safari.

## Developer

Datenstrom. [Get help](https://datenstrom.se/yellow/help/).
