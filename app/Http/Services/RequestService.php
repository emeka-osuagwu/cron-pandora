<?php

namespace App\Http\Services;

use Log;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class RequestService
{
	function __construct(Client $http)
	{
		$this->http = $http;
	}

	/**
	 * {@inheritdoc}
	 */
	public function handle($method, $endpoint, $data=null)
	{
	    $data ? $data : json_encode($data);
	
	    try 
	    {
	        $response = $this->http->request($method, $endpoint, $data);

			Log::info($data);
	        return $data = json_decode($response->getBody(), true);
	    } 
	    catch (RequestException $exception) 
	    {
	        Log::info($exception->getMessage());
	    }
	}


}