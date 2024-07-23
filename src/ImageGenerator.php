<?php

namespace Azlanali076\ImageGenerator;

use GuzzleHttp\Client;

class ImageGenerator {

    private array $headers;
    private Client $client;

    public function __construct(){
        $apiKey = config('imagegenerator.openai_api_key');
        $this->headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer '.$apiKey
        ];
        $this->client = new Client([
            'base_uri' => 'https://api.openai.com',
        ]);
    }

    /**
     * Generate Image
     * @param string $prompt
     * @param int|null $width
     * @param int|null $height
     * @param string|null $quality
     * @param string|null $style
     * @param string|null $responseFormat
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function generate(
        string $prompt, ?int $width = 1024, ?int $height = 1024, ?string $quality = 'standard',
        ?string $style = 'vivid', ?string $responseFormat = 'url'
    ): array
    {
        $size = $width.'x'.$height;
        $response = $this->client->post('/v1/images/generations',[
            'headers' => $this->headers,
            'body' => json_encode([
                'model' => 'dall-e-3',
                'prompt' => $prompt,
                'size' => $size,
                'n' => 1,
                'quality' => $quality,
                'style' => $style,
                'response_format' => $responseFormat
            ])
        ]);
        return json_decode($response->getBody(),true);
    }

}