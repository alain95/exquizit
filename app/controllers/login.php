<?php
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 03.09.14
 * Time: 10:35
 */

namespace controllers;


class login extends \core\controller{

    public function __construct(){
        parent::__construct();
        $this->user = new \models\user();
    }

    function login(){

    }
} 