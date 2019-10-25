<?php

namespace Ecoes;

use GuzzleHttp\Command\ResultInterface;

abstract class AbstractResponse implements ResponseInterface {
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

  public function getErrors() {
    if ($this->hasErrors()) {
      return $this->data['Results'][0]['Errors'];
    }
    else {
      return array();
    }
  }

}
