<?php
/**
 * Created by PhpStorm.
 * User: Petro
 * Date: 5/28/15
 * Time: 11:55 PM
 */

namespace App\Service;
//use Cake\Controller\Controller;

class Api_TwitterController extends ApiController {

    public function initialize() {
        parent::initialize();
    }

    public function get() {
        $message = "";
        $isSuccess = true;
        $ar = array();

        $data = (array) $this->getData();

        $offset = 0;
        if (isset($data['offset'])) {
            $offset = $data['offset'];
        }

//        $ar = UserTable::getSinceDate($dt->format("Y-m-d H:i:s"), $limit, $offset);
        $response = array(
            "isSuccess" => $isSuccess,
            "message" => $message,
            "result" => $ar
        );

        return $this->sendData($response);
    }
} 