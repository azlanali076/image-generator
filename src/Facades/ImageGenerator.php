<?php

namespace Azlanali076\ImageGenerator\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @method static array generate(string $prompt, int|null $width, int|null $height, string|null $quality, string|null $style, string|null $responseFormat)
 */
class ImageGenerator extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'image-generator';
    }

}