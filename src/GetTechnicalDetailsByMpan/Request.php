<?php

namespace Ecoes\GetTechnicalDetailsByMpan;

use Ecoes\KeyValueTrait;
use Ecoes\RequestParametersInterface;

class Request implements RequestParametersInterface {
  use KeyValueTrait;
  protected $MPAN;
  protected $Permission = FALSE;

  /**
   * Request constructor.
   *
   * @param $MPAN
   * @param bool $Permission
   */
  public function __construct($MPAN, $Permission = FALSE) {
    $this->MPAN = $MPAN;
    $this->Permission = $Permission;
  }

  public function buildParameters() {
    $key_values = array();

    if (!empty($this->MPAN)) {
      $key_values['MPAN'] = $this->MPAN;
    }

    if (isset($this->Permission)) {
      $key_values['Permission'] = $this->Permission;
    }

    return $this->convertArrayToEcoesKeyValue($key_values);
  }

}
