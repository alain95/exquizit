<?php

namespace models;


class category  extends \core\model {

    function __construct(){
        parent::__construct();
    }

    public function getCategories(){
        return $this->_db->select('SELECT kategorieID, bezeichnung FROM '.PREFIX.'kategorie');
    }

    public function  getRecentCategories(){
        return $this->_db->select('SELECT bezeichnung FROM '.PREFIX.'kategorie ORDER BY kategorieID DESC LIMIT 5');
    }

    public function getCategory($id)
    {
        return $this->_db->select("SELECT * FROM ".PREFIX."kategorie WHERE kategorieID = :id", array(':id' => $id));

    }

    public function addCategory($data)
    {
        $this->_db->insert(PREFIX.'kategorie',$data);
        return $this->_db->lastInsertId('kategorieID');
    }

    public function updateCategory($data, $where){
        $this->_db->update(PREFIX.'kategorie',$data, $where);
    }

    public function deleteCategory($data){
        $this->_db->delete(PREFIX.'kategorie', $data);
    }

    public function getQuestions($id)
    {
        return $this->_db->select("SELECT * FROM ".PREFIX."frage f INNER JOIN ".PREFIX."kategorie k ON k.kategorieID = f.kategorieID WHERE f.kategorieID = :id", array(':id' => $id));
    }

    public function getQuestionsCategories($where)
    {
        return $this->_db->selectIn(PREFIX.'frage', 'kategorieID', $where);
    }
}
