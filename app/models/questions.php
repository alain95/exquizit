<?php namespace models;
class Questions extends \core\model {
	
	function __construct(){
		parent::__construct();
	}

    public function getQuestion($id)
    {
        return $this->_db->select("SELECT * FROM ".PREFIX."frage WHERE frageID = :id", array(':id' => $id));
    }
	
	public function getQuestions(){
		return $this->_db->select('SELECT frageID, bezeichnung, text, f.kategorieID FROM '.PREFIX.'frage f INNER JOIN '.PREFIX.'kategorie k ON f.kategorieID = k.kategorieID ORDER BY f.frageID DESC');
	}

    public function  getRecentQuestions(){
        return $this->_db->select('SELECT text FROM '.PREFIX.'frage ORDER BY frageID DESC LIMIT 5');
    }


    public function addQuestion($data)
    {
        $this->_db->insert(PREFIX.'frage',$data);
        return $this->_db->lastInsertId('frageID');
    }

    public function updateQuestion($data, $where)
    {
        $this->_db->update(PREFIX.'frage',$data, $where);
    }

    public function deleteQuestion($data){
        $this->_db->delete(PREFIX.'frage', $data);
    }

    public function getAnswers($id)
    {
        return $this->_db->select("SELECT a.text, a.antwortID, a.korrekt FROM ".PREFIX."antwort a INNER JOIN ".PREFIX."frage f ON f.frageID = a.frageID WHERE a.frageID = :id", array(':id' => $id));
    }

}