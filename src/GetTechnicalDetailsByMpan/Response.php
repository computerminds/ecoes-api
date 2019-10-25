<?php

namespace Ecoes\GetTechnicalDetailsByMpan;

use Ecoes\AbstractResponse;

class Response extends AbstractResponse {

  public function getUtilityMatches() {
    $matches = array();
    if (isset($this->data['Results'][0]['UtilityMatches'])) {
      foreach ($this->data['Results'][0]['UtilityMatches'] as $match) {
        $this_match = array();
        if (isset($match['UtilityDetails'])) {
          $this_match['UtilityDetails'] = $this->convertEcoesKeyValueToArray($match['UtilityDetails']);
        }
        $this_match['UtilityKey'] = isset($match['UtilityKey']) ? $match['UtilityKey'] : NULL;
        $this_match['UtilityType'] = isset($match['UtilityType']) ? $match['UtilityType'] : NULL;
        $meters = array();
        if (isset($match['Meters'])) {
          foreach ($match['Meters'] as $meter) {
            if (isset($meter['MeterDetails'])) {
              $meters[] = $this->convertEcoesKeyValueToArray($meter['MeterDetails']);
            }
          }
        }
        $this_match['Meters'] = $meters;
        $matches[] = $this_match;
      }
    }
    return $matches;
  }

  public function getUtilityMatch() {
    $matches = $this->getUtilityMatches();
    return reset($matches);
  }

}
