<?php

namespace App\Http\Services\RequestService

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class RequestService
{
	function __construct(GuzzleHttp $http)
	{
		$this->http = $http;
	}

	/**
	 * {@inheritdoc}
	 */
	public function handle($method, $endpoint, $data)
	{
	    $data = json_encode($data);

	    try 
	    {
	        $response = $this->http->request('GET', 'http://httpbin.org', [
	            'query' => ['foo' => 'bar']
	        ]);

	        return json_decode($response->getBody(), true);
	    } 
	    catch (ClientException $exception) 
	    {
	        Log::info($exception->getMessage());
	        // return $exception->getMessage();
	        return "error";
	    }
	}


}