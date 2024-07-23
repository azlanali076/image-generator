# Laravel Image Generator Package

A Laravel package for generating images using the OpenAI API. This package provides an easy-to-use interface for interacting with the OpenAI API to generate images based on text prompts.

## Installation

You can install the package via Composer:

```bash
composer require azlanali076/image-generator
```

## Configuration

### 1. Publish the Configuration File
Publish the configuration file to your application's config directory:
```bash
php artisan vendor:publish --provider="Azlanali076\ImageGenerator\ImageGeneratorServiceProvider"
```

### 2. Set Up Your API Key
Make sure to add your API key to your `.env` file:
```makefile
OPENAI_API_KEY=your-openai-api-key
```

## Usage
You can use the package by calling the `generate` method on the facade `ImageGenerator`.

```php
use Azlanali076\ImageGenerator\Facades\ImageGenerator;

// Generate an image
$imageResponse = ImageGenerator::generate(
    "A Cute White Cat"
);

// Check if the response is successful
if ($imageResponse['success']) {
    // Retrieve the image URL
    $url = $imageResponse['data'][0]['url'];
    echo "Image URL: " . $url;
} else {
    // Handle the error
    echo "Error: " . $imageResponse['message'];
}
```
### Constants
- `ImageGenerator::QUALITY_STANDARD` Constant for the `standard` image quality.
- `ImageGenerator::QUALITY_HD` Constant for the `hd` image quality.
- `ImageGenerator::STYLE_NATURAL` Constant for the `natural` image style.
- `ImageGenerator::STYLE_VIVID` Constant for the `vivid` image style.
- `ImageGenerator::RESPONSE_FORMAT_URL` Constant for the `url` response format.
- `ImageGenerator::RESPONSE_FORMAT_BASE64` Constant for the `b64_json` (base 64) response format.
### Parameters
- `string $prompt` The text prompt for generating the image.
- `int|null $width` The width of the generated image (default is 1024 if null).
- `int|null $height` The height of the generated image (default is 1024 if null).
- `string|null $quality` The quality of the image (default is 'standard').
- `string|null $style` The style of the image (default is 'vivid').
- `string|null $responseFormat` The format of the response (default is 'url').
### Response Format
- `success` A boolean indicating whether the request was successful.
- `data` The data returned from the API (includes the image URL if successful).
- `message` An error message if the request was not successful.
- `code` An error code if the request was not successful.