<div align="center">

# Laravel Encoder Package

![Tests](https://github.com/nassiry/laravel-encoder/actions/workflows/tests.yml/badge.svg)
![Packagist Downloads](https://img.shields.io/packagist/dt/nassiry/laravel-encoder)
![Packagist Version](https://img.shields.io/packagist/v/nassiry/laravel-encoder)
![Laravel](https://img.shields.io/badge/Laravel-10%20%7C%2011-red)
![PHP](https://img.shields.io/badge/PHP-%5E8.1-blue)
![License](https://img.shields.io/github/license/nassiry/laravel-encoder)

![Header Image](./assets/laravel-encoder.png)

</div>

The Laravel Encoder package provides a robust and secure way to `encode` and `decode` **IDs** & **Strings** using customizable Base encoding mechanisms (Base62). With support for variable-length encoding, mappers for added security, and seamless integration with Laravel, this package is ideal for obfuscating sensitive data or creating URL-safe identifiers.

> ⚠️ **Note:** This package is meant for obfuscation, not encryption. Do not use it for storing or transmitting sensitive data securely.

## Table Of Contents
1. [Features](#features)
2. [Requirements](#requirements)
3. [Installation](#installation)
4. [Quick Example](#quick-example)
    - [Encode & Decode an ID](#encode--decode-an-id)
    - [Encode & Decode a String](#encode--decode-a-string)
5. [Documentation](#documentation)
    - [Laravel Integration](#laravel-integration)
    - [Standalone PHP Usage](#standalone-php-usage)
    - [Configuration](#configuration)
    - [Custom Bases](#custom-bases)
    - [Exception Handling](#exception-handling)
    - [Testing & Contributing](#testing--contributing)
6. [Why I Built This](#why-i-built-this)
7. [Why Base62?](#why-base62)
8. [Why Choose This Package?](#conclusion-why-choose-this-package)
9. [Contributing](#contributing)
10. [Changelog](#changelog)
11. [License](#license)

### Features
- **Base Encoding**: Supports customizable bases (Base62).
- **Variable-Length Encoding**: Allows encoding with custom lengths for obfuscation.
- **Mapper-Based Obfuscation**: Adds an extra layer of security by using configurable prime numbers and mappers.
- **Customizable Configuration**: Publish the configuration file to override default mappers.
- **Exception Handling**: Provides detailed exceptions for invalid inputs.
- **Laravel Integration**: Works seamlessly with Laravel’s service container and configuration system.
- **Security**: Protects sensitive IDs by ensuring encoded values are not easily reversible without the correct configuration.

### Requirements
- PHP 8.1 or higher
- Laravel 10 or higher (optional, for Laravel integration)
- PHP extensions: `bcmath`, `mbstring`
  
## Installation
**Step 1: Install via Composer**
```bash
composer require nassiry/laravel-encoder
```

### Quick Example
- #### Encode & Decode an ID
```php
use Nassiry\Encoder\Facades\Encoder;

$encoded = Encoder::encodeId(12345);
$decoded = Encoder::decodeId($encoded);

echo $encoded; // Encoded Strings
echo $decoded; // 12345
```

- #### Encode & Decode a String
```php
$encoded = Encoder::encodeString('Hello World');
$decoded = Encoder::decodeString($encoded);

echo $encoded; // Encoded Strings
echo $decoded; // Hello World
```

### Documentation

#### Laravel Integration

`Encode/decode` `strings` and `IDs` using Laravel container, facades, or dependency injection.

- [Laravel Usage](docs/laravel.md)

#### Standalone PHP Usage
Use in any PHP project, no Laravel required.

- [Standalone Guide](docs/standalone.md)

#### Configuration
Customize encoding behavior, mappers, and defaults.

- [Configuration Guide](docs/configuration.md)

#### Custom Bases 
Add your own Base58, Base64, or custom encoders.
- [Custom Bases Guide](docs/custom-bases.md)

#### Exception Handling
Covers validation, decoding issues, and base errors.

- [Exception Handling](docs/exceptions.md)

#### Testing & Contributing
Run the test suite or contribute improvements.

- [Testing Guide](docs/testing.md)

### Why I Built This
Laravel's `encryption` produced long `strings`, and Base64 needed extra steps to be URL-safe. I wanted a clean, simple way to encode IDs and strings short, URL-safe, and easy to configure.
[Full Story & Benefits](docs/why.md)

### Why Base62?
[Read the Reasoning](docs/base62.md)

### Conclusion: Why Choose This Package?
[ Final Thoughts](docs/conclusion.md)

### Contributing
Feel free to submit issues or pull requests to improve the package. Contributions are welcome! Let’s improve it together!

### Changelog

See [CHANGELOG](CHANGELOG.md) for release details.

### License
This package is open-source software licensed under the [MIT license](LICENSE).
