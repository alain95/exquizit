<?php
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 11.07.14
 * Time: 11:14
 */

namespace models;


class answer extends \core\model {

    function __construct(){
        parent::__construct();
    }

    public function addAnswer($data)
    {
        $this->_db->insert(PREFIX.'antwort',$data);
        return $this->_db->lastInsertId('antwortID');
    }

    public function getAnswers(){
        return $this->_db->select('SELECT antwortID, frageID, text, korrekt FROM '.PREFIX.'antwort');
    }

    public  function isCorrect($id)
    {
        $data = $this->_db->select("SELECT antwortID, korrekt, frageID FROM ".PREFIX."antwort WHERE antwortID = :id", array(':id' => $id));
        return $data[0];
    }

    public function getWrongAnswers($id)
    {
        return $this->_db->select("SELECT antwortID FROM ".PREFIX."antwort WHERE korrekt = 0 AND frageID = :id", array(':id' => $id));
    }

    public function getCorrectAnswer($id)
    {
        $data =  $this->_db->select("SELECT antwortID FROM ".PREFIX."antwort WHERE korrekt = 1 AND frageID = :id", array(':id' => $id));
        return $data[0];
    }

    public function deleteAnswer($data){
            $this->_db->delete(PREFIX.'antwort', $data);
    }

    public function updateAnswer($data, $where)
    {
        $this->_db->update(PREFIX.'antwort',$data, $where);
    }

} 