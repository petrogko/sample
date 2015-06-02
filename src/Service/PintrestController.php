<?php

namespace App\Service;
use Cake\Controller\Controller;

class PintrestController extends ApiController {

    public function initialize() {
        parent::initialize();
        $this->loadComponent('Flash');
    }

    public function get() {

    }
}