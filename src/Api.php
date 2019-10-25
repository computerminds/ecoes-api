<?php

namespace Ecoes;

use Guzzle\Service\Loader\YamlLoader;
use GuzzleHttp\Command\ServiceClientInterface;
use Symfony\Component\Config\FileLocator;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\GuzzleClient as GuzzleCommandClient;

class Api {

  /**
   * Api constructor.
   *
   * @param $apiKey
   * @param $client
   */
  public function __construct($apiKey, $client = NULL) {
    $this->apiKey = $apiKey;
    if (!is_null($client)) {
      $this->client = $client;
    }
    else {
      $this->client = self::getClient();
    }
  }

  public static function getClient(ServiceClientInterface $guzzle_client = NULL) {
    $configDirectories = array(__DIR__ . '/api');
    $locator = new FileLocator($configDirectories);

    $yamlLoader = new YamlLoader($locator);

    $description = $yamlLoader->load($locator->locate('ecoes.yml'));
    $description = new Description($description);

    if (is_null($guzzle_client)) {
      $guzzle_client = new Client();
    }

    return new GuzzleCommandClient($guzzle_client, $description);
  }

  protected $apiKey;

  protected $client;

  public function SearchUtilityAddress(RequestParametersInterface $request) {
    $full_request = array();
    $full_request['Authentication']['Key'] = $this->apiKey;
    $full_request['ParameterSets'][] = array(
      'Parameters' => $request->buildParameters(),
    );

    return new SearchUtilityAddress\Response($this->client->SearchUtilityAddress($full_request));
  }

  public function GetTechnicalDetailsByMpan(RequestParametersInterface $request) {
    $full_request = array();
    $full_request['Authentication']['Key'] = $this->apiKey;
    $full_request['ParameterSets'][] = array(
      'Parameters' => $request->buildParameters(),
    );

    return new GetTechnicalDetailsByMpan\Response($this->client->GetTechnicalDetailsByMpan($full_request));
  }

}
