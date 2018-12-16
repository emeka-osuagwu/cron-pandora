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

	        $data = json_decode($response->getBody(), true);
			Log::info($data);
	    } 
	    catch (RequestException $exception) 
	    {
	        Log::info($exception->getMessage());
	    }
	}


}