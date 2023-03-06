<?php

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createUser($firstname, $infix, $lastname, $phone, $email, $password) {
        // call SP_createUser('John', '', 'Doe', '0612345678', 'johndoe@mail.com', 'password');
        $this->db->query('CALL SP_createUser(:firstname, :infix, :lastname, :phone, :email, :password)');
        $this->db->bind(':firstname', $firstname);
        $this->db->bind(':infix', $infix);
        $this->db->bind(':lastname', $lastname);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
