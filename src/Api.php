<?php

namespace Naoray\LoLApi;

use Zttp\Zttp;

class Api
{
	/**
	 * Base Api Url.
	 * 
	 * @var string
	 */
	protected $baseUrl = 'https://EUW1.api.riotgames.com';

	/**
	 * Key used for authenticating on riot servers.
	 * 
	 * @var String
	 */
	protected $apiKey;

	/**
	 * Holds all available api urls.
	 * 
	 * @var Array
	 */
	protected $apiMap;

	/**
	 * Api which will be requested.
	 * 
	 * @var String
	 */
	protected $requestApi;
	
	/**
	 * Api constructor.
	 * 
	 * @param String $apiKey Api key for riot servers.
	 */
	function __construct($apiKey = null)
	{
		$this->apiKey = $apiKey ?: config('services.lol.key');
		$this->apiMap = config('lolapi');
	}

	/**
	 * Magic method!
	 * Gets called if requested property was not found in class.
	 * 
	 * @param  String $property Name of the property trying to call.
	 * @return Naoray\LoLApi\Api
	 */
	public function __get($property)
	{
		if (! array_key_exists($property, $this->apiMap)) {
			throw new \Exception("The api for $property is currently not supported!");
		}

		$this->setRequestApi($property);

		return $this;
	}

	/**
	 * Magic method!
	 * Gets called if called method was not found in class.
	 * 
	 * @param  String $method Name of the method trying to call.
	 * @param  Array  $params Arguments used for api call.
	 * @return String|JSON result
	 */
	public function __call($method, $params)
	{
		if (! array_key_exists($method, $this->apiMap[$this->requestApi])) {
			throw new \Exception("The method $method is currently not supported!");
		}

		$response = Zttp::get($this->buildUrl($method, $params), [
            'api_key' => $this->apiKey
        ]);

        return $response->json();
	}

	/**
	 * Build up the url for api call.
	 * 
	 * @param  String $method Method to get the last part of the url.
	 * @param  Array  $params   Params to pass into the api call.
	 * @return String url
	 */
	public function buildUrl($method, $params)
	{
		$api = $this->apiMap[$this->requestApi];

		return $this->baseUrl . $api['base_url'] . $this->replacePlaceholders($api[$method], $params);
	}

	/**
	 * Sets request api name.
	 * 
	 * @param String $name Name of the "sub" - api
	 */
	public function setRequestApi($name)
	{
		$this->requestApi = $name;
	}

	/**
	 * Replace placedholders with real values.
	 * 
	 * @param  String $url    Urls with placeholders.
	 * @param  Array $values Arguments for api call.
	 * @return String url
	 */
	public function replacePlaceholders($url, $values)
	{
		for ($i = 0; $i < count($values); $i++) {
			$url = preg_replace('/\{.*\}/', $values[$i], $url, 1);
		}

		return $url;
	}
}