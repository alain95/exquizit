<?php namespace controllers\admin;
use \core\view as View;
 
class Main extends \core\controller{
 
	private $_questions;
    private $_categories;
 
	public function __construct(){
		parent::__construct();
		$this->_questions = new \models\questions();
        $this->_categories = new \models\category();
	}
 
	public function index(){
	   $data['title'] = 'Questions';
       $data['latestQuestions'] = $this->_questions->getRecentQuestions();
       $data['latestCategories'] = $this->_categories->getRecentCategories();

        View::rendertemplate('adminHeader',$data);
        View::render('admin/main',$data);
        View::rendertemplate('footer',$data);
	 
	}
	
}