<?php

namespace Ecoes\SearchUtilityAddress;

use Ecoes\KeyValueTrait;
use Ecoes\RequestParametersInterface;

class Request implements RequestParametersInterface {
  use KeyValueTrait;
  protected $Postcode = NULL;
  protected $BuildingNumber = NULL;
  protected $SubBuilding = NULL;
  protected $BuildingName = NULL;
  protected $DependentThoroughfare = NULL;
  protected $ThoroughfareName = NULL;
  protected $DoubleDependentLocality = NULL;
  protected $DependentLocality = NULL;
  protected $PostTown = NULL;
  protected $MeterSerialNumber = NULL;
  protected $ReturnDataForSingleResult = FALSE;
  protected $Permission = FALSE;

  /**
   * Request constructor.
   *
   * @param null $Postcode
   * @param null $BuildingNumber
   * @param null $SubBuilding
   * @param null $BuildingName
   * @param null $DependentThoroughfare
   * @param null $ThoroughfareName
   * @param null $DoubleDependentLocality
   * @param null $DependentLocality
   * @param null $PostTown
   * @param null $MeterSerialNumber
   * @param bool $ReturnDataForSingleResult
   * @param bool $Permission
   */
  public function __construct($Postcode = NULL, $BuildingNumber = NULL, $SubBuilding = NULL, $BuildingName = NULL, $DependentThoroughfare = NULL, $ThoroughfareName = NULL, $DoubleDependentLocality = NULL, $DependentLocality = NULL, $PostTown = NULL, $MeterSerialNumber = NULL, $ReturnDataForSingleResult = FALSE, $Permission = FALSE) {
    $this->Postcode = $Postcode;
    $this->BuildingNumber = $BuildingNumber;
    $this->SubBuilding = $SubBuilding;
    $this->BuildingName = $BuildingName;
    $this->DependentThoroughfare = $DependentThoroughfare;
    $this->ThoroughfareName = $ThoroughfareName;
    $this->DoubleDependentLocality = $DoubleDependentLocality;
    $this->DependentLocality = $DependentLocality;
    $this->PostTown = $PostTown;
    $this->MeterSerialNumber = $MeterSerialNumber;
    $this->ReturnDataForSingleResult = $ReturnDataForSingleResult;
    $this->Permission = $Permission;
  }

  public function buildParameters() {
    $key_values = array();

    if (!empty($this->Postcode)) {
      $key_values['Postcode'] = $this->Postcode;
    }
    if (!empty($this->BuildingNumber)) {
      $key_values['BuildingNumber'] = $this->BuildingNumber;
    }
    if (!empty($this->SubBuilding)) {
      $key_values['SubBuilding'] = $this->SubBuilding;
    }
    if (!empty($this->BuildingName)) {
      $key_values['BuildingName'] = $this->BuildingName;
    }
    if (!empty($this->DependentThoroughfare)) {
      $key_values['DependentThoroughfare'] = $this->DependentThoroughfare;
    }
    if (!empty($this->ThoroughfareName)) {
      $key_values['ThoroughfareName'] = $this->ThoroughfareName;
    }
    if (!empty($this->DoubleDependentLocality)) {
      $key_values['DoubleDependentLocality'] = $this->DoubleDependentLocality;
    }
    if (!empty($this->PostTown)) {
      $key_values['PostTown'] = $this->PostTown;
    }
    if (!empty($this->MeterSerialNumber)) {
      $key_values['MeterSerialNumber'] = $this->MeterSerialNumber;
    }

    if (isset($this->ReturnDataForSingleResult)) {
      $key_values['ReturnDataForSingleResult'] = $this->ReturnDataForSingleResult;
    }
    if (isset($this->Permission)) {
      $key_values['Permission'] = $this->Permission;
    }

    return $this->convertArrayToEcoesKeyValue($key_values);
  }

}
