<?php namespace controllers\admin;
use \core\view as View;
use \helpers\url as url;
use \helpers\Session as Session;
 
class Questions extends \core\controller{
 
	private $_questions;
    private $_categories;
    private $_answers;
 
	public function __construct(){
		parent::__construct();
		$this->_questions = new \models\questions();
        $this->_categories = new \models\category();
        $this->_answers = new \models\answer();
	}
 
	public function index(){
        if(Session::get('loggedIn') == false){
            url::redirect('');
        }

	    $data['title'] = 'Questions';
	    $data['questions'] = $this->_questions->getQuestions();
        $data['categories'] = $this->_categories->getCategories();
        $data['answers'] = $this->_answers->getAnswers();

        View::rendertemplate('adminHeader',$data);
        View::render('admin/question',$data);
        View::rendertemplate('footer',$data);
	 
	}

    public function manage(){

        $data['title'] = 'Fragen verwalten';

        if(isset($_REQUEST['submitNew']))
        {
            $postdata = array(
                'text' => $_REQUEST['text'],
                'kategorieID' => $_REQUEST['kategorieID']
            );

            $lastID = $this->_questions->addQuestion($postdata);

            if($lastID!= '')
            {
                $correctAnswerData = array(
                    'frageID' => $lastID,
                    'text' => $_REQUEST['correctAnswer'],
                    'korrekt' => true
                );

                $this->_answers->addAnswer($correctAnswerData);

                for ($i = 1; $i <= 3; $i++) {
                    $wrongAnswerData = array(
                        'frageID' => $lastID,
                        'text' => $_REQUEST['wrongAnswer'.$i],
                        'korrekt' => false
                    );

                    $this->_answers->addAnswer($wrongAnswerData);

                }

                $data['msg'] = 'Frage "'.$_REQUEST['text'].'" erfolgreich hinzugefügt';
            }
            else
            {
                $data['error'] = 'Fehler beim Hinzufügen der Frage ' . $_REQUEST['text'];
            }
            $data['categories'] = $this->_categories->getCategories();
            $data['questions'] = $this->_questions->getQuestions();
            $data['answers'] = $this->_answers->getAnswers();


            View::rendertemplate('adminHeader',$data);
            View::render('admin/question',$data);
            View::rendertemplate('footer',$data);
        }


    }

    public function update(){

        $postdata = array(
            'text' => $_REQUEST['text'],
            'kategorieID' =>  $_REQUEST['kategorieID'],

        );


        $where = array('frageID' => $_REQUEST['frageID']);

        $this->_questions->updateQuestion($postdata, $where);


        $postdata = array(
            'text' => $_REQUEST['correctAnswer']

        );
        $where = array('antwortID' => $_REQUEST['correctAnswerID']);
        $this->_answers->updateAnswer($postdata, $where);

        $postdata = array(
            'text' => $_REQUEST['wrongAnswer1']

        );
        $where = array('antwortID' => $_REQUEST['wrongAnswer1ID']);
        $this->_answers->updateAnswer($postdata, $where);

        $postdata = array(
            'text' => $_REQUEST['wrongAnswer2']

        );
        $where = array('antwortID' => $_REQUEST['wrongAnswer2ID']);
        $this->_answers->updateAnswer($postdata, $where);

        $postdata = array(
            'text' => $_REQUEST['wrongAnswer3']

        );
        $where = array('antwortID' => $_REQUEST['wrongAnswer3ID']);
        $this->_answers->updateAnswer($postdata, $where);

    }

    public function delete()
    {
            $postdata = array(
                'frageID' => $_REQUEST['id']
            );

            $this->_answers->deleteAnswer($postdata);

            $this->_questions->deleteQuestion($postdata);

    }



}