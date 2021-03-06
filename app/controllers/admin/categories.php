<?php namespace controllers\admin;
use \core\view as View;
use \helpers\url as url;
use \helpers\Session as Session;


class Categories extends \core\controller{


    private $_categories;
 
	public function __construct(){
		parent::__construct();
        $this->_categories = new \models\category();
	}
 
	public function index(){
        if(Session::get('userLoggedIn') == false){
            url::redirect('');
        }

	   $data['title'] = 'Kategorien verwalten';
       $data['categories'] = $this->_categories->getCategories();

        View::rendertemplate('adminHeader',$data);
        View::render('admin/categories/main',$data);
        View::rendertemplate('footer',$data);
	 
	}

    public function manage()
    {
        $data['title'] = 'Kategorien verwalten';

        if(isset($_REQUEST['submitNew']))
        {

            $postdata = array(
                'bezeichnung' => $_REQUEST['categoryName'],
                'icon' => $_REQUEST['categoryIcon']
            );

            $lastID = $this->_categories->addCategory($postdata);

            if($lastID!= '')
            {
                $data['msg'] = 'Kategorie ' . $_REQUEST['categoryName'] . ' erfolgreich hinzugefügt';
            }
            else
            {
                $data['error'] = 'Fehler beim Hinzufügen von der Kategorie' . $_REQUEST['categoryName'];
            }

            $this->index();
        }

        if(isset($_REQUEST['delete']))
        {

            $questions = $this->_categories->getQuestions($_REQUEST['id']);

            $games = $this->_categories->getGames(($_REQUEST['id']));

            if(!empty($questions))
            {
                $data['msgDelError'] = 'Kategorie kann nicht gelöscht werden, dieser Kategorie sind noch Fragen zugeordnet!';
                $data['categories'] = $this->_categories->getCategories();

                View::rendertemplate('adminHeader',$data);
                View::render('admin/categories/main',$data);
                View::rendertemplate('footer',$data);
            }

            if(!empty($games))
            {
                $data['msgDelError'] = 'Kategorie kann nicht gelöscht werden, dieser Kategorie sind noch Spiele zugeordnet!';
                $data['categories'] = $this->_categories->getCategories();

                View::rendertemplate('adminHeader',$data);
                View::render('admin/categories/main',$data);
                View::rendertemplate('footer',$data);
            }

            $postdata = array(
                'kategorieID' => $_REQUEST['id']
            );
            $this->_categories->deleteCategory($postdata);

            $data['msgDel'] = 'Kategorie erfolgreich gelöscht ';
            $data['categories'] = $this->_categories->getCategories();

            View::rendertemplate('adminHeader',$data);
            View::render('admin/categories/main',$data);
            View::rendertemplate('footer',$data);
        }

        if(isset($_REQUEST['save']))
        {
            $postdata = array(
                'bezeichnung' => $_REQUEST['bezeichnung']
            );

            $where = array('kategorieID' => $_REQUEST['id']);

            $this->_categories->updateCategory($postdata, $where);
        }




        }
	
}