<?php
/**
 * Created by PhpStorm.
 * User: Petro
 * Date: 5/28/15
 * Time: 11:55 PM
 */

namespace App\Service;
use Cake\Controller\Controller;

class TwitterController extends ApiController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function get() {

    }
} 