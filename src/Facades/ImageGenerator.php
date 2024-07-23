<?php

namespace Azlanali076\ImageGenerator\Facades;

use Illuminate\Support\Facades\Facade;


/**
 * @see \Azlanali076\ImageGenerator\ImageGenerator::RESPONSE_FORMAT_URL
 * @see \Azlanali076\ImageGenerator\ImageGenerator::RESPONSE_FORMAT_BASE64
 * @see \Azlanali076\ImageGenerator\ImageGenerator::STYLE_NATURAL
 * @see \Azlanali076\ImageGenerator\ImageGenerator::STYLE_VIVID
 * @see \Azlanali076\ImageGenerator\ImageGenerator::QUALITY_STANDARD
 * @see \Azlanali076\ImageGenerator\ImageGenerator::QUALITY_HD
 * @see \Azlanali076\ImageGenerator\ImageGenerator::generate()
 */
class ImageGenerator extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'image-generator';
    }

}