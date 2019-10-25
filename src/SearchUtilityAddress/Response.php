<?php

namespace Ecoes\SearchUtilityAddress;

use Ecoes\AbstractResponse;

class Response extends AbstractResponse {

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
