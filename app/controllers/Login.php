<?php
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 03.09.14
 * Time: 08:02
 */

namespace controllers;
use core\view as View;

class Login extends \core\controller{

    public function __construct(){
        parent::__construct();
        $this->_user = new \models\user();
    }

    function logon()
    {
       $username =  $_REQUEST['username'];
       $password =  $_REQUEST['password'];

       $result = $this->_user->getPassword($username);

       $data['result'] = $result;


    }
} 