<?php

namespace Ecoes;

trait KeyValueTrait {

  protected function convertEcoesKeyValueToArray($key_values) {
    $array = array();
    foreach ($key_values as $pair) {
      if (isset($pair['Key'])) {
        $array[$pair['Key']] = isset($pair['Value']) ? $pair['Value'] : NULL;
      }
    }
    return $array;
  }

  protected function convertArrayToEcoesKeyValue($array) {
    $return = array();

    foreach ($array as $key => $value) {
      $return[] = array(
        'Key' => $key,
        'Value' => $value,
      );
    }

    return $return;
  }
}
