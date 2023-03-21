<?php

namespace Drupal\Tests\word_meaning\Unit\Api;

use Drupal\word_meaning\Api\DictionaryApi;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use http\Env\Response;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class DictionaryApiTest extends TestCase
{
  private DictionaryApi $api;
  private MockHandler $mockHttp;

  public function setUp(): void
  {
    $this->mockHttp = new MockHandler();

    $this->api = new DictionaryApi(
      new Client(['handler' => HandlerStack::create($this->mockHttp), 'http_errors' => false]),
    );
  }

  public function testConstruct()
  {
    $this->assertInstanceOf(DictionaryApi::class, $this->api);
  }

  public function testGetDefinitions()
  {
    $this->mockHttp->append(
      new \GuzzleHttp\Psr7\Response(
        200,
        ['Content-Type' => 'application/json'],
        json_encode([
          [
            'meanings' => [
              [
                'definitions' => [
                  'definition' => 'used as a greeting or to begin a phone conversation.',
                  'example' => 'hello there, Katie!',
                  'synonyms' => ['a', 'b'],
                  'antonyms' => ['c', 'd'],
                ]
              ]
            ]
          ]
        ]),
      )
    );

    $this->assertEquals([
      [
        'definitions' => [
          'definition' => 'used as a greeting or to begin a phone conversation.',
          'example' => 'hello there, Katie!',
          'synonyms' => ['a', 'b'],
          'antonyms' => ['c', 'd'],
        ]
      ]
    ], $this->api->getDefinitions('run'));
  }

  public function testGetDefinitionWhenReturnIsNot200() {
    $this->mockHttp->append(
      new \GuzzleHttp\Psr7\Response(
        500,
        ['Content-Type' => 'application/json'],
        json_encode([
          [
            'meanings' => [
              [
                'definitions' => [
                  'definition' => 'used as a greeting or to begin a phone conversation.',
                  'example' => 'hello there, Katie!',
                  'synonyms' => ['a', 'b'],
                  'antonyms' => ['c', 'd'],
                ]
              ]
            ]
          ]
        ]),
      )
    );

    $this->assertEquals([], $this->api->getDefinitions('run'));
  }

  public function testGetDefinitionWhenKeyMeaningsDoenstExists() {
    $this->mockHttp->append(
      new \GuzzleHttp\Psr7\Response(
        200,
        ['Content-Type' => 'application/json'],
        json_encode([
          [
            'meaningsa' => [
              [
                'definitions' => [
                  'definition' => 'used as a greeting or to begin a phone conversation.',
                  'example' => 'hello there, Katie!',
                  'synonyms' => ['a', 'b'],
                  'antonyms' => ['c', 'd'],
                ]
              ]
            ]
          ]
        ]),
      )
    );

    $this->assertEquals([], $this->api->getDefinitions('run'));
  }
}
