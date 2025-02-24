---
Title: How to adjust system
---
All system files are located in the `system` folder. You can adjust your website here.

    ├── content
    ├── media
    └── system
        ├── extensions
        ├── layouts
        ├── themes
        └── trash

The `system/extensions` folder contains installed extensions and configuration files. You can adjust the appearance of your website in the `system/layouts` folder and `system/themes` folder. You can change layouts and themes as you like, knowledge of HTML, CSS and JavaScript is required. The `system/trash` folder contains deleted files.

## System settings

The main configuration file is `system/extensions/yellow-system.ini`. Here's an example:

    Sitename: Anna Svensson Design
    Author: Anna Svensson
    Email: anna@svensson.com
    Theme: stockholm
    Language: en
    Layout: default
    Parser: markdown
    Status: public

You can use a [web browser](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit) or text editor to change the system settings. The system settings contain the settings of your website and of all extensions. After a new installation be sure to check `Sitename`, `Author` and `Email`. The following settings can be configured:

`Sitename` = name of the website  
`Author` = name of the webmaster  
`Email` = email of the webmaster  
`Theme` = default theme  
`Language` = default language  
`Layout` = default layout  
`Parser` = default page parser  
`Status` = default page status  

## User settings

The user settings are stored in file `system/extensions/yellow-user.ini`. Here's an example:

    Email: anna@svensson.com
    Name: Anna Svensson
    Description: Designer
    Language: en
    Home: /
    Access: create, edit, delete, restore, upload, configure, install, uninstall, update
    Hash: $2y$10$j26zDnt/xaWxC/eqGKb9p.d6e3pbVENDfRzauTawNCUHHl3CCOIzG
    Stamp: 21196d7e857d541849e4
    Pending: none
    Failed: 0
    Modified: 2000-01-01 13:37:00
    Status: active

You can use a [web browser](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit) or the [command line](https://github.com/datenstrom/yellow-extensions/tree/master/source/command) to create new user accounts. A user account consists of `Email` and other settings. If you don't want that pages are modified in a web browser, then restrict user accounts. Open the configuration file, change `Home` and `Access`. Users are allowed to edit pages within their home page, but nowhere else.

## Language settings

The language settings are stored in file `system/extensions/yellow-language.ini`. Here's an example:

    Language: en
    CoreDateFormatShort: F Y
    CoreDateFormatMedium: Y-m-d
    CoreDateFormatLong: Y-m-d H:i
    EditMailFooter: @sitename
    ImageDefaultAlt: Image without description
    media/images/photo.jpg: This is an example image

You can define the language settings here. A language consist of `Language` and other settings. You can copy the [default settings from language files](https://github.com/datenstrom/yellow-extensions/blob/master/source/english/english.txt) and paste them into the configuration file. You can also add your own language settings to the configuration file, for example image captions.

## Page settings

The following settings can be configured at the top of a page:

`Title` = page title  
`TitleContent` = page title shown in content  
`TitleNavigation` = page title shown in navigation  
`TitleHeader` = page title shown in web browser  
`TitleSlug` = page title used for saving the page  
`Description` = page description  
`Author` = page author(s), comma separated  
`Email` = email of page author  
`Theme` = page theme  
`Language` = page language  
`Layout` = page layout  
`LayoutNew` = page layout for creating a new page  
`Parser` = page parser  
`Status` = page status  
`Redirect` = redirect to a new page or URL  
`Image` = page image  
`ImageAlt` = description of the page image  
`Modified` = page modification date, YYYY-MM-DD format  
`Published` = page publication date, YYYY-MM-DD format  
`Tag` = page tag(s) for categorisation, comma separated  
`Build` = page option(s) for building a static website, comma separated  
`Comment` = page option(s) for showing comments, comma separated  

Do you have questions? [Get help](.) and [contribute](contributing-guidelines).
