<?php namespace core;
/*
 * config - setup system wide settings
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Config {

	public function __construct(){

		//turn on output buffering
		ob_start();

		//start sessions
		\helpers\session::init();

		//turn on custom error handling
		set_exception_handler('core\logger::exception_handler');
		set_error_handler('core\logger::error_handler');

		//set timezone
		date_default_timezone_set('Europe/Zurich');

		//site address
		define('DIR','http://localhost/exquizit/');

		//database details ONLY NEEDED IF USING A DATABASE
		define('DB_TYPE','mysql');
		define('DB_HOST','localhost');
		define('DB_NAME','quiz');
		define('DB_USER','root');
		define('DB_PASS','');
		define('PREFIX','exq_');

		//set prefix for sessions
		define('SESSION_PREFIX','exq_');

		//optionall create a constant for the name of the site
		define('SITETITLE','exQuizit');

		//set the default template
		\helpers\session::set('template','default');
		
	}

}