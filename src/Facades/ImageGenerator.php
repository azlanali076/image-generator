<?php

namespace Azlanali076\ImageGenerator\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @method static array generate(string $prompt, ?int $width = 1024, ?int $height = 1024, ?string $quality = 'standard', ?string $style = 'vivid', ?string $responseFormat = 'url')
 */
class ImageGenerator extends Facade {

    public const QUALITY_STANDARD = "standard";
    public const QUALITY_HD = 'hd';

    public const RESPONSE_FORMAT_URL = 'url';
    public const RESPONSE_FORMAT_BASE64 = 'b64_json';

    public const STYLE_NATURAL = 'natural';
    public const STYLE_VIVID = 'vivid';

    protected static function getFacadeAccessor()
    {
        return 'image-generator';
    }

}