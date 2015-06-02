<?php

namespace App\Service;

use Cake\Controller\Controller;
use Cake\Network\Request;
use Cake\Network\Response;

class ApiController extends Controller
{

    /**
     * TODO - Create method to check if user has right to call API
     */

    const STATUS_SUCCESS = "ok";
    const STATUS_FAILED = "error";

    protected $output = true;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function __construct(Request $request, Response $response, array $invokeArgs = array()) {
        parent::__construct($request, $response, $invokeArgs);
        $this->getHelper('viewRenderer')->setNoRender();
        $this->_helper->layout()->disableLayout();
    }

    protected function prepareData($status, $res, $message) {
        $data = array();
        $data['status'] = $status;
        $data['message'] = $message;
        $data['result'] = $res;

        return $data;
    }

    protected function prepareAndSendData($status, $res, $message) {
        return $this->sendData($this->prepareData($status, $res, $message));
    }

    protected function sendData($data, $mime = null) {
        if ($this->output) {
            ob_clean();
            $data = json_encode($data);

            if (!$mime) {
                $mime = 'application/json';
            }

            header("Cache-Control: no-cache, must-revalidate");
            header("Expires: 0");
            header('Content-Type: ' . $mime);

            print($data);
        } else {
            return $data;
        }
    }

    protected function getData() {
        $data = $this->getRequest()->getRawBody();
        $data = stripslashes($data);
        return json_decode($data, 1);
    }

    protected function handleError($status_code, $error_message = NULL) {
        $message = $this->_codes[$status_code]
            . (!$error_message ? '' : ': ' . $error_message);

        $data = array(
            'error' => array(
                'code' => $status_code,
                'message' => $message
            )
        );

        $this->output = true;
        $this->sendData($data);
        exit;
    }

    public function setOutput($output) {
        $this->output = $output;
    }

    public function getOutput() {
        return $this->output;
    }

    private $_codes = array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => '(Unused)',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported'
    );
}