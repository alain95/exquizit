<?php
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 03.09.14
 * Time: 07:53
 */

namespace controllers;
use core\view as View;
use \helpers\Url as Url;
use \helpers\Session as Session;


class register extends \core\controller{

    public function __construct(){
        parent::__construct();
        $this->user = new \models\user();
    }

    public function index()
    {
        $data['title'] = 'Registrieren';

        View::rendertemplate('header',$data);
        View::render('welcome/register',$data);
        View::rendertemplate('footer',$data);
    }


    public function register()
    {
        if($_REQUEST['password'] == $_REQUEST['password_confirm'])
        {
           if($this->user->usernameAvailable($_REQUEST['username']) == '')
           {
               $postdata = array(
                   'benutzername' => $_REQUEST['username'],
                   'email' => $_REQUEST['email'],
                   'passwort' => sha1($_REQUEST['password'])
               );

               $id = $this->user->add($postdata);
               if($id == '')
               {
                   Url::redirect('register?error=db');
               }
               else
               {
                   Session::set('userloggedIn',true);
                   Session::set('benutzerID',$id);
                   Session::set('benutzername', $_REQUEST['username']);
                   Url::redirect('quiz');
               }
           }
           else
           {
              Url::redirect('register?error=unna');
           }
        }
        else
        {
            Url::redirect('register?error=pdnm');
        }
    }

} 