<?php
/**
 * Created by PhpStorm.
 * User: alain.buetler
 * Date: 03.09.14
 * Time: 09:04
 */

namespace models;


class admin extends \core\model {

    function __construct(){
        parent::__construct();
    }

    public function get_hash($username)
    {
       $data = $this->_db->select("SELECT passwort FROM ".PREFIX."spieler WHERE benutzername = :username",array(':username' => $username));
       return $data[0]->passwort;
    }

    public function isAdmin($username)
    {
        $data = $this->_db->select("SELECT admin FROM ".PREFIX."spieler WHERE benutzername = :username",array(':username' => $username));
        return $data[0]->admin;
    }
} 