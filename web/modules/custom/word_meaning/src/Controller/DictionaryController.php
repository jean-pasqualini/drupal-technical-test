<?php
/**
 * @file
 * Contains \Drupal\hello_world\Controller\HelloController.
 */
namespace Drupal\word_meaning\Controller;
use Drupal\Core\Controller\ControllerBase;
use Drupal\word_meaning\Api\DictionaryApi;

class DictionaryController extends ControllerBase {
  private DictionaryApi $api;

  public function __construct(DictionaryApi $api) {
    $this->api = $api;
  }

  public function searchDefinitions(string $word): array {
    return [
      '#theme' => 'show-definitions',
      '#meanings' => $this->api->getDefinitions($word),
    ];
  }
}
