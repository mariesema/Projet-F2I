<?php

namespace Library\Controller;

abstract class Controller
{
	private $_responseHeader = 'application/json';
	private $_responseStatus = 200;
	private $_responseBody;

	public function getResponseHeader()
	{
		return $this->_responseHeader;
	}

	protected function setResponseHeader($type)
	{
		$possibilities = array(
							'txt'	=> 'text/plain',
							'html'	=> 'text/html',
							'css'	=> 'text/css',
							'js'	=> 'application/js',
							'json'	=> 'application/json',
							'xml'	=> 'application/xml'
							);
		if (array_key_exists(strtolower($type), $possibilities))
		{
			$this->_responseHeader = $possibilities[$type];
			return true;
		}
		return false;
	}

	protected function setResponseBody($response, $apiErrorMessage="")
	{
		$this->_responseBody					= new \stdClass();
		$this->_responseBody->response 			= $response;
		$this->_responseBody->apiError			= empty($apiErrorMessage)?false:true;
		$this->_responseBody->apiErrorMessage	= $apiErrorMessage;
		exit;
	}

	protected function setResponseStatus($code)
	{
		if (is_numeric($code))
		{
			$this->_responseStatus = $code;
		}
	}

	public function __construct()
	{
		
	}

	public function __destruct()
	{
		header("Content-type: " . $this->getResponseHeader() . "; charset = utf-8");
		http_response_code($this->_responseStatus);

		if($this->_responseStatus !== 204)
		{
			echo json_encode($this->_responseBody, JSON_PRETTY_PRINT | JSON_NUMERIC_CHECK);
		}
	}
}