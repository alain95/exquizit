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
}