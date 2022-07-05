TBreadCrumbWithLink
======

[![Latest Stable Version](http://poser.pugx.org/lopescte/adianti-plugins/v)](https://packagist.org/packages/lopescte/adianti-plugins)
[![Total Downloads](http://poser.pugx.org/lopescte/adianti-plugins/downloads)](https://packagist.org/packages/lopescte/adianti-plugins)
[![PHP Version Require](http://poser.pugx.org/lopescte/adianti-plugins/require/php)](https://packagist.org/packages/lopescte/adianti-plugins)
[![License](http://poser.pugx.org/lopescte/adianti-plugins/license)](https://packagist.org/packages/lopescte/adianti-plugins)

This plugin provides a way to create BreadCrumbs with links, manual adding items or parsing XML file.

## Easy Installation

### Install with composer

To install with [Composer](https://getcomposer.org/), simply require the
latest version of this package.

```bash
composer require lopescte/adianti-plugins
```

Make sure that the autoload file from Composer is loaded.

```php
// somewhere early in your project's loading, require the Composer autoloader
// see: http://getcomposer.org/doc/00-intro.md
require 'vendor/autoload.php';

```

## Usage

Easy to use in your php files or classes, as below:

```php
use TBreadCrumbWithLink\TBreadCrumbWithLink;;

$breadcrumb = new TBreadCrumbWithLink;
$breadcrumb->addItem('You are here:',NULL,TRUE);
$breadcrumb->addItem('Home', 'MyHomeClassName',FALSE);
$breadcrumb->renderFromXML('MyMenu.xml', __CLASS__);
```

## Author

* **Marcelo Lopes** - *Developer* - [Site](https://www.reiselopes.com.br) | [Facebook](https://facebook.com/lopes.cte) | [Instagram](https://instagram.com/lopescte) | [Twitter](https://twitter.com/lopescte/) | [GitHub](https://github.com/lopescte)


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.