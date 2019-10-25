<?php

namespace Ecoes\SearchUtilityAddress;

use Ecoes\KeyValueTrait;
use Ecoes\ResponseInterface;
use GuzzleHttp\Command\ResultInterface;

class Response implements ResponseInterface {
  use KeyValueTrait;
  protected $data;

  /**
   * Response constructor.
   *
   * @param $data
   */
  public function __construct(ResultInterface $data) {
    $this->data = $data;
  }

  public function hasErrors() {
    return !empty($this->data['Results'][0]['Errors']);
  }

  public function getUtilityAddressMatches() {
    $matches = array();
    if (isset($this->data['Results'][0]['UtilityAddressMatches']) && is_array($this->data['Results'][0]['UtilityAddressMatches'])) {
      foreach ($this->data['Results'][0]['UtilityAddressMatches'] as $match) {
        $this_match = array();
        if (isset($match['AddressDetails'])) {
          $this_match['AddressDetails'] = $this->convertEcoesKeyValueToArray($match['AddressDetails']);
        }
        $this_match['UtilityType'] = isset($match['UtilityType']) ? $match['UtilityType'] : NULL;
        $matches[] = $this_match;
      }
    }
    return $matches;
  }


}
