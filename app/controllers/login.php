<?php
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 03.09.14
 * Time: 10:35
 */

namespace controllers;

use \helpers\Session as Session;
use \helpers\Url as Url;


class login extends \core\controller{

    public function __construct(){
        parent::__construct();
        $this->_user = new \models\user();
    }

    function login(){
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        $password = sha1($password);
        $db_hash = $this->_user->get_hash($username);

        if($db_hash == $password)
        {
            Session::set('userLoggedIn',true);
            Session::set('benutzername', $username);
            Url::redirect('quiz');
        }
        else
        {
            Url::redirect('?error');
        }
    }
} 