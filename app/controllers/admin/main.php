<?php namespace controllers\admin;
use \core\view as View;
 
class Main extends \core\controller{
 
	private $_questions;
    private $_categories;
 
	public function __construct(){
		parent::__construct();
		$this->_questions = new \models\questions();
        $this->_categories = new \models\category();
        $this->_admin = new \models\admin();
	}
 
	public function index(){
        if(\helpers\session::get('loggedIn') == false){
            \helpers\url::redirect('admin/login');
        }

	   $data['title'] = 'Questions';
       $data['latestQuestions'] = $this->_questions->getRecentQuestions();
       $data['latestCategories'] = $this->_categories->getRecentCategories();

        View::rendertemplate('adminHeader',$data);
        View::render('admin/main',$data);
        View::rendertemplate('footer',$data);
	 
	}

    public function login(){

        if(\helpers\session::get('loggedIn') == true){
            \helpers\url::redirect('admin/main');
        }

        if(isset($_POST['submit'])){

            $username = $_POST['username'];
            $password = $_POST['password'];

            $password = sha1($password);
            $db_hash = $this->_admin->get_hash($username);

            if($db_hash == $password)
            {
                \helpers\session::set('loggedIn',true);
                \helpers\url::redirect('admin/main');
            }
            else
            {
                print_r($db_hash);
                die('wrong username or password ' . $username . " x " . $password);
            }

        }

        $data['title'] = 'Login';

        $this->view->rendertemplate('header',$data);
        $this->view->render('admin/login',$data);
        $this->view->rendertemplate('footer',$data);
    }


	
}