<?php
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 03.09.14
 * Time: 10:35
 */

namespace controllers;

use \helpers\Session as Session;
use \helpers\url as url;


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
            $userID = $this->_user->getUserID($username);

            Session::set('userLoggedIn',true);
            Session::set('userID', $userID);
            Session::set('benutzername', $username);

            url::redirect('quiz');
        }
        else
        {
            url::redirect('?error');
        }
    }
} 