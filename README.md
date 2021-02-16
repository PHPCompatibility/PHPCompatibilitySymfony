# PHPCompatibilitySymfony

[![Latest Stable Version](https://img.shields.io/packagist/v/phpcompatibility/phpcompatibility-symfony?label=stable)][packagist]
[![Latest Unstable Version](https://img.shields.io/badge/unstable-dev--develop-e68718.svg?maxAge=2419200)][packagist]
[![License](https://img.shields.io/github/license/PHPCompatibility/PHPCompatibilitySymfony?color=00a7a7)](https://github.com/PHPCompatibility/PHPCompatibilitySymfony/blob/master/LICENSE)
[![Build Status](https://github.com/PHPCompatibility/PHPCompatibilitySymfony/actions/workflows/ci.yml/badge.svg?branch=master)](https://github.com/PHPCompatibility/PHPCompatibilitySymfony/actions/workflows/ci.yml)

Using PHPCompatibilitySymfony, you can analyse the codebase of a project using any of the [Symfony polyfill libraries], for PHP cross-version compatibility.


## What's in this repo ?

A set of rulesets for PHP_CodeSniffer to check for PHP cross-version compatibility issues in projects, while accounting for polyfills provided by the Symfony polyfill libraries.

These rulesets prevent false positives from the [PHPCompatibility standard][PHPCompatibility] by excluding back-fills and polyfills which are provided by those libraries.

| Symfony Polyfill Library | Corresponding PHPCompatibility Ruleset | Includes                                                             |
|--------------------------|----------------------------------------|----------------------------------------------------------------------|
| [`polyfill-php54`]       | `PHPCompatibilitySymfonyPolyfillPHP54` |                                                                      |
| [`polyfill-php55`]       | `PHPCompatibilitySymfonyPolyfillPHP55` | [`PHPCompatibilityPasswordCompat`][PHPCompatibilityPasswordCompat]   |
| [`polyfill-php56`]       | `PHPCompatibilitySymfonyPolyfillPHP56` |                                                                      |
| [`polyfill-php70`]       | `PHPCompatibilitySymfonyPolyfillPHP70` | [`PHPCompatibilityParagonieRandomCompat`][PHPCompatibilityParagonie] |
| [`polyfill-php71`]       | `PHPCompatibilitySymfonyPolyfillPHP71` |                                                                      |
| [`polyfill-php72`]       | `PHPCompatibilitySymfonyPolyfillPHP72` |                                                                      |
| [`polyfill-php73`]       | `PHPCompatibilitySymfonyPolyfillPHP73` |                                                                      |
| [`polyfill-php74`]       | `PHPCompatibilitySymfonyPolyfillPHP74` |                                                                      |
| [`polyfill-php80`]       | `PHPCompatibilitySymfonyPolyfillPHP80` |                                                                      |
| [`polyfill-php81`]       | `PHPCompatibilitySymfonyPolyfillPHP81` |                                                                      |

> [!NOTE]
> About "Includes":
> Some polyfills have other polyfills as dependencies. If the PHPCompatibility project offers a dedicated ruleset for the polyfill dependency, that ruleset will be included in the ruleset for the higher level polyfill.
>
> For example:
> As the `polyfill-php70` library declares `random_compat` [as a dependency](https://github.com/symfony/polyfill-php70/blob/master/composer.json), the `PHPCompatibilitySymfonyPolyfillPHP70` ruleset includes the `PHPCompatibilityParagonieRandomCompat` ruleset.
>
> In practice, this means that if your project uses several polyfills, you can use the information in "Includes" to help you decide which rulesets to use.


## Funding

**This project needs funding.**

The project team has spend thousands of hours creating and maintaining the PHPCompatibility packages. This is unsustainable without funding.

If you use PHPCompatibility, please fund this work by setting up a monthly contribution to the [PHP_CodeSniffer Open Collective].


## Requirements

* PHP > 5.4
* [PHP_CodeSniffer] >= 3.13.3.
    Use the latest stable release of PHP_CodeSniffer for the best results.
* [PHPCompatibility] 10.0.0+.
* [PHPCompatibilityParagonie] 2.0.0+.
* [PHPCompatibilityPasswordCompat] 2.0.0+.


## Installation instructions

The only supported installation method is via [Composer].

[Composer] will automatically install the project dependencies and register the external rulesets with PHP_CodeSniffer using the [Composer PHPCS plugin].

Run the following from the root of your project:
```bash
composer config allow-plugins.dealerdirect/phpcodesniffer-composer-installer true
composer require --dev phpcompatibility/phpcompatibility-symfony:"^2.0@dev"
```

Next, run:
```bash
vendor/bin/phpcs -i
```
If all went well, you will now see that the PHPCompatibility and a range of PHPCompatibilitySymfony and other PHPCompatibility standards are installed for PHP_CodeSniffer.


## Upgrade instructions

To upgrade this package, run the following command:
```bash
composer update --dev phpcompatibility/phpcompatibility-symfony --with-dependencies
```

> [!TIP]
> If you have a _root_ requirement in your project for one of the packages used by this project, you may need to update with `--with-all-dependencies` instead.

## How to use

You can now use the following commands to inspect the code in your project for PHP cross-version compatibility:
```bash
vendor/bin/phpcs -p . --standard=PHPCompatibilitySymfonyPolyfillPHP54
vendor/bin/phpcs -p . --standard=PHPCompatibilitySymfonyPolyfillPHP55
vendor/bin/phpcs -p . --standard=PHPCompatibilitySymfonyPolyfillPHP56
vendor/bin/phpcs -p . --standard=PHPCompatibilitySymfonyPolyfillPHP70
vendor/bin/phpcs -p . --standard=PHPCompatibilitySymfonyPolyfillPHP71
vendor/bin/phpcs -p . --standard=PHPCompatibilitySymfonyPolyfillPHP72
vendor/bin/phpcs -p . --standard=PHPCompatibilitySymfonyPolyfillPHP73
vendor/bin/phpcs -p . --standard=PHPCompatibilitySymfonyPolyfillPHP74
vendor/bin/phpcs -p . --standard=PHPCompatibilitySymfonyPolyfillPHP80
vendor/bin/phpcs -p . --standard=PHPCompatibilitySymfonyPolyfillPHP81

# You can also combine the standards if your project uses several:
vendor/bin/phpcs -p . --standard=PHPCompatibilitySymfonyPolyfillPHP55,PHPCompatibilitySymfonyPolyfillPHP70,PHPCompatibilitySymfonyPolyfillPHP73
```

By default, you will only receive notifications about deprecated and/or removed PHP features.

To get the most out of the PHPCompatibilitySymfony rulesets, you should specify a `testVersion` to check against. That will enable the checks for both deprecated/removed PHP features as well as the detection of code using new PHP features.

For example:
```bash
# For a project which should be compatible with PHP 5.3 up to and including PHP 7.0:
vendor/bin/phpcs -p . --standard=PHPCompatibilitySymfonyPolyfillPHP56 --runtime-set testVersion 5.3-7.0

# For a project which should be compatible with PHP 7.2 and higher:
vendor/bin/phpcs -p . --standard=PHPCompatibilitySymfonyPolyfillPHP73 --runtime-set testVersion 7.2-
```

For more detailed information about setting the `testVersion`, see the README of the generic [PHPCompatibility]([PHPCompatibility-testVersion] standard.


### Testing PHP files only

By default PHP_CodeSniffer < 4.0 will analyse PHP, JavaScript and CSS files. As the PHPCompatibility sniffs only target PHP code, you can make the run slightly faster by telling PHP_CodeSniffer to only check PHP files, like so:
```bash
vendor/bin/phpcs -p . --standard=PHPCompatibilitySymfonyPolyfillPHP71 --extensions=php --runtime-set testVersion 5.3-
```

## License

All code within the PHPCompatibility organisation is released under the GNU Lesser General Public License (LGPL). For more information, visit <https://www.gnu.org/licenses/lgpl-3.0.html>.


[packagist]:                       https://packagist.org/packages/phpcompatibility/phpcompatibility-symfony
[Composer]:                        https://getcomposer.org/
[Composer PHPCS plugin]:           https://github.com/PHPCSStandards/composer-installer/
[PHP_CodeSniffer]:                 https://github.com/PHPCSStandards/PHP_CodeSniffer
[PHP_CodeSniffer Open Collective]: https://opencollective.com/php_codesniffer
[PHPCompatibility]:                https://github.com/PHPCompatibility/PHPCompatibility
[PHPCompatibility-testVersion]:    https://github.com/PHPCompatibility/PHPCompatibility#sniffing-your-code-for-compatibility-with-specific-php-versions
[PHPCompatibilityParagonie]:       https://github.com/PHPCompatibility/PHPCompatibilityParagonie
[PHPCompatibilityPasswordCompat]:  https://github.com/PHPCompatibility/PHPCompatibilityPasswordCompat

[Symfony polyfill libraries]: https://github.com/symfony?utf8=?&q=polyfill
[`polyfill-php54`]:           https://github.com/symfony/polyfill-php54
[`polyfill-php55`]:           https://github.com/symfony/polyfill-php55
[`polyfill-php56`]:           https://github.com/symfony/polyfill-php56
[`polyfill-php70`]:           https://github.com/symfony/polyfill-php70
[`polyfill-php71`]:           https://github.com/symfony/polyfill-php71
[`polyfill-php72`]:           https://github.com/symfony/polyfill-php72
[`polyfill-php73`]:           https://github.com/symfony/polyfill-php73
[`polyfill-php74`]:           https://github.com/symfony/polyfill-php74
[`polyfill-php80`]:           https://github.com/symfony/polyfill-php80
[`polyfill-php81`]:           https://github.com/symfony/polyfill-php81
