<?php
if(file_exists('vendor/autoload.php')){
	require 'vendor/autoload.php';
} else {
	echo "<h1>Please install via composer.json</h1>";
	echo "<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
	echo "<p>Once composer is installed navigate to the working directory in your terminal/command promt and enter 'composer install'</p>";
	exit;
}

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
	define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and production will hide them.
 */

if (defined('ENVIRONMENT')){

	switch (ENVIRONMENT){
		case 'development':
			error_reporting(E_ALL);
		break;
	
		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}

}

//create alias for Router
use \core\router as Router;

//define routes
Router::get('', '\controllers\welcome@index');
Router::any('quiz', '\controllers\quiz@index');
Router::any('quiz/start', '\controllers\quiz@start');
Router::post('quiz/check', '\controllers\quiz@checkAnswer');
Router::post('quiz/joker', '\controllers\quiz@joker');
Router::any('impressum', '\controllers\welcome@impressum');
Router::get('register', '\controllers\register@index');
Router::post('register', '\controllers\register@register');


Router::get('admin/login', '\controllers\admin\main@login');
Router::post('admin/login', '\controllers\admin\main@login');
Router::get('admin/main','\controllers\admin\main@index');
Router::get('admin/logout', '\controllers\admin\main@logout');

Router::get('admin/questions','\controllers\admin\questions@index');
Router::get('admin/categories','\controllers\admin\categories@index');
Router::post('admin/categories','\controllers\admin\categories@manage');
Router::post('admin/questions','\controllers\admin\questions@manage');
Router::post('admin/questions/delete','\controllers\admin\questions@delete');
Router::post('admin/questions/update','\controllers\admin\questions@update');

//if no route found
Router::error('\core\error@index');

//execute matched routes
Router::dispatch();
