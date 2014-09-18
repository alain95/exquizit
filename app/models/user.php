<?php
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 03.09.14
 * Time: 10:08
 */

namespace models;


class user extends \core\model {

    function __construct(){
        parent::__construct();
    }


    public function get_hash($username)
    {
        $data = $this->_db->select("SELECT passwort FROM ".PREFIX."spieler WHERE benutzername = :username",array(':username' => $username));
        return $data[0]->passwort;
    }

    function add($data)
    {
        $this->_db->insert(PREFIX.'spieler',$data);
        return $this->_db->lastInsertId('spielerID');
    }


    function getUserID($username)
    {
        $data = $this->_db->select("SELECT spielerID FROM ".PREFIX."spieler WHERE benutzername = :username",array(':username' => $username));
        return $data[0]->spielerID;
    }
} 