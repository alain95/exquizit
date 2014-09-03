<?php namespace controllers;
use core\view as View;
use \helpers\Url as Url;
use \helpers\Session as Session;

/*
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Welcome extends \core\controller{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();
	}

	/**
	 * define page title and load template files
	 */
	public function index(){
        if(Session::get('userLoggedIn') == true){
            Url::redirect('quiz');
        }

        $data['title'] = 'Welcome';

        View::rendertemplate('header',$data);
        View::render('welcome/welcome',$data);
        View::rendertemplate('footer',$data);


	}

    public function impressum()
    {
        $data['title'] = 'Welcome';

        View::rendertemplate('header',$data);
        View::render('impressum',$data);
        View::rendertemplate('footer',$data);

    }



}