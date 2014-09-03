<?php

namespace models;


class user  extends \core\model {

    public function addUser($data)
    {
        $this->_db->insert(PREFIX.'spieler',$data);
        return $this->_db->lastInsertId('spielerID');
    }

    public function usernameAvailable($username)
    {

    }

    public function getUserData()
    {

    }

    public function getPassword($username)
    {
        $this->_db->select("SELECT passwort FROM ".PREFIX."spieler WHERE benutzername = :username",array(':username' => $username));
    }
}