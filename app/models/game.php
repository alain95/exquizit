<?php
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 17.09.14
 * Time: 08:44
 */

namespace models;


class game extends \core\model {

    function __construct(){
        parent::__construct();
    }

    public function newGame($data)
    {
        $this->_db->insert(PREFIX.'spiel',$data);
        return $this->_db->lastInsertId('spielID');
    }

    public function closeGame($data, $where)
    {
        $this->_db->update(PREFIX.'spiel',$data, $where);
    }

    public function addCategory($data)
    {
        $this->_db->insert(PREFIX.'spiel2kategorie',$data);
    }

    public function getGame($id)
    {
        $data = $this->_db->select("SELECT * FROM ".PREFIX."spiel WHERE spielID = :id", array(':id' => $id));
        return $data[0];
    }

    public function updateGame($data, $where)
    {
        $this->_db->update(PREFIX.'spiel',$data, $where);
    }

    public function getCategories($id)
    {
        $data = $this->_db->select("SELECT kategorieID FROM ".PREFIX."spiel2kategorie WHERE spielID = :id", array(':id' => $id));
        return $data;
    }

    public function addRound($data)
    {
        $this->_db->insert(PREFIX.'runde',$data);
    }

    public function getRounds($id)
    {
        $data = $this->_db->select("SELECT frageID FROM ".PREFIX."runde WHERE spielID = :id", array(':id' => $id));
        return $data;
    }

    public function getFinishedGames()
    {
        $data = $this->_db->select("SELECT * FROM ".PREFIX."spiel WHERE (abgeschlossen = 2 AND gewichtetePunkte > 0) ORDER BY gewichtetePunkte DESC LIMIT 10");
        return $data;
    }


} 