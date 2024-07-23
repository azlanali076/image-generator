<?php

namespace Azlanali076\ImageGenerator\Providers;

use Azlanali076\ImageGenerator\ImageGenerator;
use Illuminate\Support\ServiceProvider;

class ImageGeneratorServiceProvider extends ServiceProvider {

    public function register(){
        $this->app->bind('image-generator', function($app) {
            return new ImageGenerator();
        });
        $this->mergeConfigFrom(__DIR__.'/../../config/image-generator.php','imagegenerator');
    }
    public function boot(){
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/image-generator.php' => config_path('imagegenerator.php'),
            ], 'config');
        }
    }

}