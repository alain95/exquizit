<?php
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 03.09.14
 * Time: 07:53
 */

namespace controllers;
use core\view as View;


class Register extends \core\controller{

    public function index()
    {
        $data['title'] = 'Registrieren';

        View::rendertemplate('header',$data);
        View::render('welcome/register',$data);
        View::rendertemplate('footer',$data);
    }

} 