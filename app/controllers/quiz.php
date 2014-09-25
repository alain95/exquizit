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

        if(Session::get('gameStarted'))
        {
            url::redirect('quiz/start');
        }

        $data['title'] = 'Neues Spiel';
        $data['username'] = Session::get('benutzername');
        $data['userID'] =  Session::get('userID');

        $data['categories'] = $this->_categories->getCategories();
        $data['games'] = $this->getFinishedGames();

        View::rendertemplate('loggedInHeader',$data);
        View::render('game/start',$data);
        View::rendertemplate('footer',$data);
    }

    public function getFinishedGames()
    {
        $games = $this->_game->getFinishedGames();
        return $games;

    }

    public function start()
    {
        if(Session::get('userLoggedIn') == false){
            url::redirect('');
        }


        if(Session::get('spielID') == 0)
        {
            if(empty($_POST))
            {
                url::redirect('quiz');
            }
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
            Session::set('fiftyfiftyJoker', true);
            Session::set('skipJoker', true);

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

            Session::set('questionID', $question->frageID);


            $answers = $this->_questions->getAnswers($question->frageID);
            shuffle($answers);

            $data['answers'] = $answers;

            $data['question'] = $question;
        }
        else
        {
            $spielID = Session::get('spielID');
            $fiftyfifty = Session::get('fiftyfiftyJoker');

            if(!$fiftyfifty)
            {
                $data['fiftyfifty'] = 'disabled';
            }

            $skip = Session::get('skipJoker');

            if(!$skip)
            {
                $data['skip'] = 'disabled';
            }

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


            $data['playedQuestions'] = $playedQuestions;

            $questionIDs = array();
            foreach($questions as $question)
            {
                array_push($questionIDs, $question->frageID);
            }


            $playedQuestionsIDs = array();
            foreach($playedQuestions as $question)
            {
                array_push($playedQuestionsIDs, $question->frageID);
            }


            $availableQuestions = array_diff($questionIDs, $playedQuestionsIDs);

            $item = array_rand($availableQuestions);
            $id = $availableQuestions[$item];


            $question = $this->_questions->getQuestion($id);
            $answers = $this->_questions->getAnswers($question->frageID);

            shuffle($answers);

            $game = $this->_game->getGame($spielID);
            $data['points'] = $game->punktzahl;

            $data['answers'] = $answers;
            $data['question'] = $question;
            Session::set('questionID', $question->frageID);
        }
        $data['startTime'] = Session::get('startTime');
        $data['spielID'] = Session::get('spielID');
        $data['username'] = Session::get('benutzername');
        $data['userID'] =  Session::get('userID');

        View::rendertemplate('gameHeader',$data);
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
        $question = $this->_questions->getQuestion($frageID);

        $correctID = $this->_answer->getCorrectAnswer($frageID);


        if($question->frageID == Session::get('questionID'))
        {


            if($korrekt)
            {
                $richtigBeantwortet = $question->richtigBeantwortet;
                $beantwortet = $question->beantwortet;
                ++$richtigBeantwortet;
                ++$beantwortet;

                $questionData = array(
                    'beantwortet' => $beantwortet,
                    'richtigBeantwortet' => $richtigBeantwortet
                );

                $where = array('frageID' => $frageID);

                $this->_questions->updateQuestion($questionData, $where);

                $roundData = array(
                    'spielID' => $gameID,
                    'frageID' => $frageID
                );

                $this->_game->addRound($roundData);

                $game = $this->_game->getGame($gameID);
                $points = $game->punktzahl;
                $points = $points + 30;

                $gameData = array(
                  'punktzahl' => $points
                );

                $where = array('spielID' => $gameID);

                $this->_game->updateGame($gameData, $where);

            }
            else
            {
                $beantwortet = $question->beantwortet;
                ++$beantwortet;

                $questionData = array(
                    'beantwortet' => $beantwortet
                );

                $where = array('frageID' => $frageID);
                $this->_questions->updateQuestion($questionData, $where);

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
                Session::set('gameStarted', false);
            }

        }

        echo json_encode(array('korrekt' => $korrekt, 'id' => $antwortID, 'korrektID' => $correctID->antwortID));
    }

    public  function joker()
    {
        $id = $_REQUEST['id'];
        if($_REQUEST['jokerType'] == "fiftyfity" && Session::get('fiftyfiftyJoker'))
        {
            $result = $this->_answer->getWrongAnswers($id);

            shuffle($result);
            array_pop($result);

            Session::set('fiftyfiftyJoker', false);

            echo json_encode($result);
        }
        elseif($_REQUEST['jokerType'] == "skip" && Session::get('skipJoker'))
        {
            $gameID = Session::get('spielID');
            $roundData = array(
                'spielID' => $gameID,
                'frageID' => $id
            );

            $this->_game->addRound($roundData);
            Session::set('skipJoker', false);
        }
    }

    public function finish()
    {
        $id = $_REQUEST['id'];

        $game = $this->_game->getGame($id);
        $start = strtotime($game->start);


        $timestamp = time();
        $timestampDB = date('Y-m-d G:i:s', $timestamp);

        $difference = $timestamp - $start;

        $points = $game->punktzahl;

        $weightedPoints = round(($points / $difference), 2);

        $postdata = array(
            'abgeschlossen' => 2,
            'ende' => $timestampDB,
            'gewichtetePunkte' => $weightedPoints
        );

        $where = array('spielID' => $id);

        $this->_game->closeGame($postdata, $where);
        Session::set('spielID', 0);
        Session::set('gameStarted', false);
        Session::set('questionID', 0);
        $data['username'] = Session::get('benutzername');
        $data['userID'] =  Session::get('userID');

        $this->index();
    }


}