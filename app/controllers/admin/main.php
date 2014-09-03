<?php namespace controllers\admin;
use \core\view as View;
use \helpers\Session as Session;
use \helpers\Url as Url;
 
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
        if(Session::get('loggedIn') == false){
            Url::redirect('admin/login');
        }

	   $data['title'] = 'Questions';
       $data['latestQuestions'] = $this->_questions->getRecentQuestions();
       $data['latestCategories'] = $this->_categories->getRecentCategories();

        View::rendertemplate('adminHeader',$data);
        View::render('admin/main',$data);
        View::rendertemplate('footer',$data);
	 
	}

    public function login(){

        if(Session::get('loggedIn') == true){
            Url::redirect('admin/main');
        }

        if(isset($_POST['submit'])){

            $username = $_POST['username'];
            $password = $_POST['password'];

            $password = sha1($password);
            $db_hash = $this->_admin->get_hash($username);
            $isadmin = $this->_admin->isAdmin($username);

            if($db_hash == $password && $isadmin)
            {
                Session::set('loggedIn',true);
                Url::redirect('admin/main');
            }
            else
            {
                Url::redirect('admin/login?error');
            }

        }

        $data['title'] = 'Login';

        $this->view->rendertemplate('header',$data);
        $this->view->render('admin/login',$data);
        $this->view->rendertemplate('footer',$data);
    }

    public function logout()
    {
        Session::destroy();
        Url::redirect('');
    }


	
}