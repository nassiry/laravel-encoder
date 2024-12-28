<?php
    /*
    | Copyright (c) A.S Nassiry
    |
    | For the full copyright and license information, please view the LICENSE
    | file that was distributed with this source code.
    |
    | @see https://github.com/nassiry/laravel-encoder
    |
    |--------------------------------------------------------------------------
    | Encoder Configuration File
    |--------------------------------------------------------------------------
    |
    | Note: This configuration file is applicable only when using the package with a Laravel application.
    | For standalone usage, you need to provide configuration directly while initializing the `Encoder` class.
    |
    | This file allows you to set up the default base encoder and customize its behavior within Laravel.
    | By default, the package uses the `base62` encoder, but you can define additional configurations
    | for Base62 or other custom Base classes that you may add via the Factory.
    |
    | Default Base62 Configuration
    | If you are using the default Base62 implementation, you can override its default mappers
    | by specifying custom mappings in the `config` array below. These mappers are used to obfuscate
    | the encoding process by applying prime numbers for variable-length encoding.
    |--------------------------------------------------------------------------
    | Example for overriding Base62 mappers:
    |--------------------------------------------------------------------------
    |
    | 'config' => [
    |     1 => '1',
    |     5 => '41',
    |     6 => '2377',
    |     7 => '147299',
    |     8 => '9132313',
    | ],
    |--------------------------------------------------------------------------
    | Custom Base Classes
    |--------------------------------------------------------------------------
    |
    | If you are implementing your own Base class (e.g., Base58 or Base64):
    | 1. Implement the `BaseEncoderInterface` in your class.
    | 2. Add your custom base to the `BaseFactory`.
    | 3. Use this `config` array to define any specific configuration required for your custom base.
    |
    |--------------------------------------------------------------------------
    | Usage in Laravel
    |--------------------------------------------------------------------------
    |
    | To publish this configuration file, run the following command:
    |
    | php artisan vendor:publish --provider="Nassiry\Encoder\EncoderServiceProvider"
    |
    | After publishing, you can modify the configuration here to suit your application's needs.
    |
    |--------------------------------------------------------------------------
    | Usage Outside Laravel
    |--------------------------------------------------------------------------
    |
    | For standalone usage, pass your configuration directly when creating an `Encoder` instance:
    |
    | use Nassiry\Encoder\Encoder;
    |
    | $config = [
    |     5 => 41,
    |     6 => 2377,
    |     7 => 147299,
    | ];
    |
    | $encoder = new Encoder('base62', $config);
    |
    */
return [
    // The default base encoder to use. Options include 'base62' or any custom base class added to the Factory.
    'base' => 'base62',

    // Configuration options for the base encoder. For Base62, you can override its default mappers here.
    'config' => [
        // Example: Define mappers for Base62
        // 1 => '1',
        // 5 => '41',
        // 6 => '2377',
        // Add additional mappings as needed for your encoding requirements.
    ],
];