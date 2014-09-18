<?php namespace controllers;
use core\view as View;
use helpers\Session as Session;
use helpers\url as url;
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 04.08.14
 * Time: 16:49
 */
class quiz extends \core\controller{

    private $_categories;
    private $_game;

    /**
     * call the parent construct
     */
    public function __construct(){
        parent::__construct();
        $this->_categories = new \models\category();
        $this->_questions = new \models\questions();
        $this->_answer = new \models\answer();

        $this->_game = new \models\game();
    }

    /**
     * define page title and load template files
     */
    public function index(){
        if(Session::get('userLoggedIn') == false){
            url::redirect('');
        }

        $data['title'] = 'Neues Spiel';
        $data['username'] = Session::get('benutzername');


        $data['categories'] = $this->_categories->getCategories();

        View::rendertemplate('loggedInHeader',$data);
        View::render('game/start',$data);
        View::rendertemplate('footer',$data);
    }

    public function start()
    {
        if(Session::get('userLoggedIn') == false){
            url::redirect('');
        }


        if(Session::get('spielID') == 0)
        {
            $timestamp = time();
            $timestampDB = date('Y-m-d G:i:s', $timestamp);
            $timestampGame = date('d.m.Y G:i:s', $timestamp);

            $gameData = array(
                'spielerID' => Session::get('userID'),
                'start' => $timestampDB
            );

            $spielID = $this->_game->newGame($gameData);

            Session::set('startTime', $timestampGame);
            $data['startTime'] = $timestampGame;
            Session::set('gameStarted', true);
            Session::set('spielID', $spielID);

            $categories = array();
            $where = '';
            foreach($_REQUEST as $key => $value)
            {
                if($key == ('kat'.$value))
                {
                    $where .= $value . ',';

                    $postdata = array(
                        'spielID' => $spielID,
                        'kategorieID' => $value
                    );

                    $this->_game->addCategory($postdata);

                    $category = $this->_categories->getCategory($value);
                    array_push($categories, $category);
                }
            }

            $data['categories'] = $categories;

            $questions = $this->_categories->getQuestionsCategories($where);


            $item = array_rand($questions);
            $question = $questions[$item];


            $answers = $this->_questions->getAnswers($question->frageID);
            shuffle($answers);


            $data['answers'] = $answers;

            $data['question'] = $question;
        }
        else
        {
            $spielID = Session::get('spielID');

            $gameCategories = $this->_game->getCategories($spielID);

            $where = '';
            $categories = array();
            foreach($gameCategories as $category)
            {

                    $where .= $category->kategorieID . ',';


                    $category = $this->_categories->getCategory($category->kategorieID);
                    array_push($categories, $category);
            }

            $data['categories'] = $categories;

            $questions = $this->_categories->getQuestionsCategories($where);
            $playedQuestions = $this->_game->getRounds($spielID);


            $data['playedQuestions'] = array();

            $questionIDs = array();
            for ($i = 0; $i < count($questions); ++$i) {
                foreach($questions[$i] as $question)
                {
                    array_push($questionIDs, $question->frageID);
                }
            }

            $availableQuestions = array_diff($questionIDs, $playedQuestions);

            $data['availableQuestions'] = $availableQuestions;

            $item = array_rand($availableQuestions);

            $this->_questions->getQuestion($item);


            $answers = $this->_questions->getAnswers($question->frageID);
            shuffle($answers);


            $data['answers'] = $answers;

            $data['question'] = $question;

}







        View::rendertemplate('loggedInHeader',$data);
        View::render('game/quiz',$data);
        View::rendertemplate('footer',$data);
    }

    public  function checkAnswer()
    {
        $id = $_REQUEST['id'];
        $result = $this->_answer->isCorrect($id);

        $korrekt = $result->korrekt;
        $antwortID = $result->antwortID;
        $frageID = $result->frageID;
        $gameID = Session::get('spielID');

        if($korrekt)
        {
            $roundData = array(
                'spielID' => $gameID,
                'frageID' => $frageID
            );

            $this->_game->addRound($roundData);
        }
        else
        {
            $roundData = array(
                'spielID' => $gameID,
                'frageID' => $frageID
            );

            $this->_game->addRound($roundData);

            $postdata = array(
                'abgeschlossen' => 1
            );


            $where = array('spielID' => $gameID);

            $this->_game->closeGame($postdata, $where);
            Session::set('spielID', 0);
        }

        echo json_encode(array('korrekt' => $korrekt, 'id' => $antwortID));
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