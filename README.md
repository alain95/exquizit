![Simple MVC Framework](http://simplemvcframework.com/app/templates/smvcf/img/logo.png)

#V2.1
#What is Simple MVC Framework?

Simple MVC Framework is a PHP 5.3 MVC system. It's designed to be lightweight and modular, allowing developers to build better and easy to maintain code with PHP.

The base framework comes with a range of helper classes.

## Documentation

Full docs & tutorials are available at [simplemvcframework.com](http://simplemvcframework.com)

##Requirements

 The framework requirements are limited

 - Apache Web Server or equivalent with mod rewrite support.
 - PHP 5.3 or greater is required

 Although a database is not required, if a database is to be used the system is designed to work with a MySQL database. The framework can be changed to work with another database type.

## Installation

1. Download the framework
2. Unzip the package.
3. To run composer, navigate to your project on a terminal/command prompt then run 'composer install' that will update the vendor folder. Or use the vendor folder as is (composer is not required for this step)
Upload the framework files to your server. Normally the index.php file will be at your root.
4. Open the index.php file with a text editor, setup your routes.
5. Open core/config.php and set your base URL and database credentials (if a database is needed). Set the default theme.
6. Edit .htaccess file and save the base path. (if the framework is installed in a folder the base path should reflect the folder path /path/to/folder/ otherwise a single / will do.
