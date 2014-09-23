<?php
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 23.09.14
 * Time: 17:13
 */

namespace controllers;

use core\view as View;
use helpers\Session as Session;
use helpers\url as url;

class profile  extends \core\controller{

    public function index()
    {
        if(Session::get('userLoggedIn') == false){
            url::redirect('');
        }

        if(Session::get('userID') != $_REQUEST['id'])
        {
            url::redirect('');
        }

        $data['username'] = Session::get('benutzername');
        $data['userID'] =  Session::get('userID');

        View::rendertemplate('loggedInHeader',$data);
        View::render('profile/profile',$data);
        View::rendertemplate('footer',$data);
    }
} 