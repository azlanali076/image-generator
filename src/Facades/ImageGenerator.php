<?php

namespace Azlanali076\ImageGenerator\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @method static array generate(string $prompt, int|null $width = 1024, int|null $height = 1024, string|null $quality = 'standard', string|null $style = 'vivid', string|null $responseFormat = 'url')
 */
class ImageGenerator extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'image-generator';
    }

}