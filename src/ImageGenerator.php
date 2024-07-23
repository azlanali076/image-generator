<?php

namespace Azlanali076\ImageGenerator;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;

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
     */
    public function generate(
        string $prompt, ?int $width = 1024, ?int $height = 1024, ?string $quality = 'standard',
        ?string $style = 'vivid', ?string $responseFormat = 'url'
    ): array
    {
        try{
            $size = ($width ?? 1024).'x'.($height ?? 1024);
            $response = $this->client->post('/v1/images/generations',[
                'headers' => $this->headers,
                'body' => json_encode([
                    'model' => 'dall-e-3',
                    'prompt' => $prompt,
                    'size' => $size,
                    'n' => 1,
                    'quality' => $quality ?? 'standard',
                    'style' => $style ?? 'vivid',
                    'response_format' => $responseFormat ?? 'url'
                ])
            ]);
            $result = json_decode($response->getBody(),true);
            return [
                'success' => true,
                'data' => $result['data']
            ];
        }
        catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody(),true);
            return [
                'success' => false,
                'message' => $response['error']['message'],
                'code' => $response['error']['code']
            ];
        }
        catch (GuzzleException|\Exception $e) {
            return [
                'success' =>false,
                'message' => $e->getMessage()
            ];
        }
    }

}