<?php namespace controllers;
use core\view as View;
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 04.08.14
 * Time: 16:49
 */
class quiz extends \core\controller{

    private $_categories;

    /**
     * call the parent construct
     */
    public function __construct(){
        parent::__construct();
        $this->_categories = new \models\category();
        $this->_questions = new \models\questions();
        $this->_answer = new \models\answer();
    }

    /**
     * define page title and load template files
     */
    public function index(){

        $data['title'] = 'Neues Spiel';


        $data['categories'] = $this->_categories->getCategories();

        View::rendertemplate('header',$data);
        View::render('game/start',$data);
        View::rendertemplate('footer',$data);
    }

    public  function start()
    {
        $where = '';
        $categories = array();
        foreach($_REQUEST as $key => $value)
        {
            if($key == ('kat'.$value))
            {
                $where .= $value . ',';

                $category = $this->_categories->getCategory($value);
                array_push($categories, $category);
            }
        }
        $data['id'] = $where;
        $data['questions'] =  $this->_categories->getQuestionsCategories($where);

        $where = '';
        foreach($data['questions'] as $question)
        {
            $where .= $question->frageID . ',';
        }

        $data['answers'] =  $this->_questions->getAnswersQuestions($where);
        $data['categories'] = $categories;

        View::rendertemplate('header',$data);
        View::render('game/quiz',$data);
        View::rendertemplate('footer',$data);
    }

    public  function checkAnswer()
    {
        $id = $_REQUEST['id'];
        $result = $this->_answer->isCorrect($id);

        foreach($result as $answer)
        {
           $correct = $answer->korrekt;
           $antwortID = $answer->antwortID;
        }

        echo json_encode(array('korrekt' => $correct, 'id' => $antwortID));
    }

    public  function joker()
    {
        $id = $_REQUEST['id'];
        $result = $this->_answer->getWrongAnswers($id);

        shuffle($result);
        array_pop($result);

        echo json_encode($result);
    }

}