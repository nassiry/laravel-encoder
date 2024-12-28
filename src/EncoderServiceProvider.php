<?php
/**
 * Copyright (c) A.S Nassiry
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://github.com/nassiry/laravel-encoder
 */

namespace Nassiry\Encoder;

use Illuminate\Support\ServiceProvider;

class EncoderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('Encoder', function ($app) {
            $base = $app['config']->get('encoder.base', 'base62');
            $config = $app['config']->get('encoder.config', []);
            return new Encoder($base, $config);
        });

        $configPath = __DIR__ . '/../config/encoder.php';
        if (file_exists($configPath)) {
            $this->mergeConfigFrom($configPath, 'encoder');
        }
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/encoder.php' => config_path('encoder.php'),
        ], 'config');
    }
}
