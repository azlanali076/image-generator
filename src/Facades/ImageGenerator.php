<?php

namespace Azlanali076\ImageGenerator\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @property-read string QUALITY_STANDARD
 * @property-read string QUALITY_HD
 * @property-read string RESPONSE_FORMAT_URL
 * @property-read string RESPONSE_FORMAT_BASE64
 * @property-read string STYLE_NATURAL
 * @property-read string STYLE_VIVID
 * @method static array generate(string $prompt, int $width = 1024, int $height = 1024, string $quality = 'standard', string $style = 'vivid', string $responseFormat = 'url')
 */
class ImageGenerator extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'image-generator';
    }

}