---
Title: Troubleshooting
ShowLanguageSelection: 1
---
Here's how to find and fix errors.

[toc]

## Problems with installation

The following error messages can happen:

```
Datenstrom Yellow requires write access!
```

Run the command `chmod -R a+rw *` in the installation folder. You can also use your FTP software to give write permissions to all files. It's recommended to give write permissions to all files and folders in the installation folder. As soon as the web server has sufficient write access in the `system` folder, the problem should be resolved.

```
Datenstrom Yellow requires configuration file!
```

Copy the supplied `.htaccess` file into the installation folder. Check if your FTP software has a setting to show all files. It sometimes happens that the `.htaccess` file was overlooked during installation. After the missing configuration file has been copied to the web server, the problem should be resolved.

```
Datenstrom Yellow requires rewrite support!
```

Configure the web server, see [Apache configuration](#problems-with-apache) and [Nginx configuration](#problems-with-nginx). You either need to change the configuration file or you use the built-in web server on your computer. The built-in web server is handy for developers. As soon as the web server forwards HTTP requests to the `yellow.php`, the problem should be resolved.

```
Datenstrom Yellow requires complete upload!
```

Copy all files again to the web server. Check if your FTP software shows an error message during upload. It sometimes happens that the data transfer was interrupted, then there are files with zero bytes on the web server. After all installation files have been copied to the web server, the problem should be resolved.

```
Datenstrom Yellow requires PHP extension!
```

Install the missing PHP extension on your web server. You need `curl gd mbstring zip`.

```
Datenstrom Yellow requires PHP 5.6 or higher!
```

Install the latest PHP version on your web server.

## Problems after installation

The following error message can happen:

```
Check the log file. Please activate the debug mode for more information.
```

Check the log file `system/extensions/yellow.log`. If there are write errors, then give write permissions to the affected files. If there are other errors, then contact the responsible developer/designer and [report a bug](contributing-guidelines). The log file gives you in any case a quick overview of what happens on your website. Here's an example:

```
2020-10-28 14:13:07 info Install Datenstrom Yellow 0.8.17, PHP 7.1.33, Apache 2.4.33, Mac
2020-10-28 14:13:07 info Install extension 'English 0.8.27'
2020-10-28 14:13:07 info Install extension 'German 0.8.27'
2020-10-28 14:13:07 info Install extension 'Swedish 0.8.27'
2020-10-28 14:13:17 info Add user 'Anna'
2020-12-18 21:02:42 info Update extension 'Core 0.8.42'
2020-12-18 21:02:42 error Can't write file 'system/extensions/yellow-system.ini'!
```

Activate the debug mode to show more information on the current page. You can use the debug mode to investigate the cause of a problem, to show the stack trace of a program or if you are curious about how Datenstrom Yellow works. This is how you activate the debug mode:

Open file `system/extensions/core.php` and change the first line to `<?php define("DEBUG", 1);`

```
YellowCore::sendPage Cache-Control: max-age=60
YellowCore::sendPage Content-Type: text/html; charset=utf-8
YellowCore::sendPage Content-Modified: Wed, 06 Feb 2019 13:54:17 GMT
YellowCore::sendPage Last-Modified: Thu, 07 Feb 2019 09:37:48 GMT
YellowCore::sendPage theme:stockholm language:en layout:blogpages parser:markdown
YellowCore::processRequest file:content/1-en/2-blog/page.md
YellowCore::request status:200 time:19 ms
```

Get file system information by increasing debug level to `<?php define("DEBUG", 2);`

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowUser::load file:system/extensions/yellow-user.ini
YellowLanguage::load file:system/extensions/english.txt
YellowLanguage::load file:system/extensions/german.txt
YellowLanguage::load file:system/extensions/swedish.txt
YellowLanguage::load file:system/extensions/yellow-language.ini
YellowLookup::findFileFromLocation /blog/ -> content/1-en/2-blog/page.md
```

Get maximum information by increasing debug level to `<?php define("DEBUG", 3);`

```
YellowSystem::load file:system/extensions/yellow-system.ini
YellowSystem::load Sitename:Datenstrom Yellow
YellowSystem::load Author:Datenstrom
YellowSystem::load Email:webmaster
YellowSystem::load Theme:stockholm
YellowSystem::load Language:en
YellowSystem::load Layout:default
```

## Problems with Apache

Here's a `.htaccess` configuration file for the Apache web server:

```apache
<IfModule mod_rewrite.c>
RewriteEngine on
DirectoryIndex index.html yellow.php
RewriteRule ^(cache|content|system)/ error [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ yellow.php [L]
</IfModule>
```

Here's a `.htaccess` configuration file for a subfolder, for example `http://website/yellow/`:

```apache
<IfModule mod_rewrite.c>
RewriteEngine on
RewriteBase /yellow/
DirectoryIndex index.html yellow.php
RewriteRule ^(cache|content|system)/ error [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ yellow.php [L]
</IfModule>
```

Here's a `.htaccess` configuration file for a subdomain, for example `http://sub.domain.website/`:

```apache
<IfModule mod_rewrite.c>
RewriteEngine on
RewriteBase /
DirectoryIndex index.html yellow.php
RewriteRule ^(cache|content|system)/ error [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ yellow.php [L]
</IfModule>
```

When your website doesn't work, then you have to [enable the rewrite module](https://stackoverflow.com/questions/869092/how-to-enable-mod-rewrite-for-apache-2-2) and [change the AllowOverride configuration](https://stackoverflow.com/questions/18740419/how-to-set-allowoverride-all). After the configuration has been changed, you may have to restart the Apache web server.

## Problems with Nginx

Here's a `nginx.conf` configuration file for the Nginx web server:

```nginx
server {
    listen 80;
    server_name website.com;
    root /var/www/website/;
    default_type text/html;
    index index.html yellow.php;

    location /cache {
        rewrite ^(.*)$ /error break;
    }

    location /content {
        rewrite ^(.*)$ /error break;
    }

    location /system {
        rewrite ^(.*)$ /error break;
    }

    location / {
        if (!-e $request_filename) {
            rewrite ^/(.*)$ /yellow.php last;
            break;
        }
    }

    location ~ \.php$ {
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index yellow.php;
        include fastcgi.conf;
    }
}
```

Here's a `nginx.conf` configuration file for a static website:

```nginx
server {
    listen 80;
    server_name website.com;
    root /var/www/website/;
    default_type text/html;
    error_page 404 /404.html;
}
```

When your website doesn't work, then check `server_name` and `root` in the configuration file. After the configuration has been changed, you may have to [restart the Nginx web server](https://stackoverflow.com/questions/21292533/reload-nginx-configuration).

## Related information

* [How to create a user account](https://github.com/datenstrom/yellow-extensions/tree/master/source/edit)
* [How to start the built-in web server](https://github.com/datenstrom/yellow-extensions/tree/master/source/serve)
* [How to show the current version](https://github.com/datenstrom/yellow-extensions/tree/master/source/update)

Do you have questions? [Get help](.) and [contribute](contributing-guidelines).
