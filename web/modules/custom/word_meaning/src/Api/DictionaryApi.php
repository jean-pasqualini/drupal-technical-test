<?php

namespace Drupal\word_meaning\Api;
use GuzzleHttp\ClientInterface;

/**
 * @class DictionaryApi
 * This class is a php client for the dictory api
 */
class DictionaryApi
{
  private ClientInterface $client;

  public function __construct(ClientInterface $client)
  {
    $this->client = $client;
  }

  /**
   * @param string $word
   * @return array ['definitions' => [['definition' => '', 'example' => '', 'synonyms' => [''], 'antonyms' => ['']]]
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  public function getDefinitions(string $word): array
  {
    $response = $this->client->get(sprintf('entries/en_US/%s', $word));

    if (200 != $response->getStatusCode()) {
      return [];
    }

    $raw = $response->getBody()->getContents();
    $data = json_decode($raw, true);

    return $data[0]["meanings"] ?? [];
  }
}
