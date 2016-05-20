<?php

class RestServer
{
    /**
     * Target Service class
     * @var Service
     */
    private $service;
    /**
     * Target method of the service
     * @var string
     */
    private $serviceMethod;
    /**
     * HTTP Request Type
     * @var string
     */
    private $httpMethod;
    /**
     * Array of params
     * @var array
     */
    private $requestParam;
    /**
     * @var string
     */
    private $userAgent;
    /**
     * JSON Response
     * @var string
     */
    private $json;

    /**
     * Constructor
     * @param Service $service
     */
    public function __construct($service)
    {
        header("Content-type: application/json");
        $service = '\src\services\\' . $service;

        $this->json                     = new stdClass();
        $this->json->response           = null;
        $this->json->apiError           = false;
        $this->json->apiErrorMessage    = null;
        $this->json->serverError        = false;
        $this->json->serverErrorMessage = null;

        $this->httpMethod               = strtoupper($_SERVER['REQUEST_METHOD']);
        $this->userAgent                = $_SERVER['HTTP_USER_AGENT'];

        if (class_exists($service)) {
            $this->service = new $service;
        } else {
            $this->showMessageError('Service not found');
        }

        switch ($this->httpMethod) {
            case 'GET'    :
            case 'DELETE' :
                $p = $_GET;
                break;
            case 'POST'   :
            case 'PUT'    :
                parse_str(file_get_contents('php://input'), $p);
                break;
            default       :
                $this->showMessageError('HTTP method is not valid');
                break;
        }

        if (isset($p['method'])) {
            $this->serviceMethod = strtolower($p['method']);
            if (!method_exists($this->service, $this->serviceMethod)) {
                $this->showMessageError('Service method not found');
            }
            unset($p['service']);
            unset($p['method']);
            $this->requestParam = $p;
        } else {
            $this->showMessageError('Method not exists');
        }
    }

    /**
     * Return an error message
     * @param string $msg
     */
    private function showMessageError($msg)
    {
        $this->json->serverError           = true;
        $this->json->serverErrorMessage    = "error : $msg";
        //var_dump($json);
        exit;
    }

    /**
     * Handle request and params
     */
    public function handle()
    {
        $res = call_user_func_array(array($this->service, $this->serviceMethod), $this->requestParam);
        $this->json->response        = $res->response;
        $this->json->apiError        = $res->apiError;
        $this->json->apiErrorMessage = $res->apiErrorMessage;
        exit;
    }

    public function __destruct()
    {
        //header("Content-Type: application/json;charset=utf-8");
       // echo json_encode($this->json);
        //print_r($this->json);
       echo json_encode($this->json,JSON_PRETTY_PRINT);
    }
}