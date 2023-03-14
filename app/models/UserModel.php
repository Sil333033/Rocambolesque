<?php

class UserModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function createUser($firstname, $infix, $lastname, $phone, $email, $password)
    {
        // call SP_createUser('John', '', 'Doe', '0612345678', 'johndoe@mail.com', 'password');
        $this->db->query('CALL SP_createUser(:firstname, :infix, :lastname, :phone, :email, :password)');
        $this->db->bind(':firstname', $firstname);
        $this->db->bind(':infix', $infix);
        $this->db->bind(':lastname', $lastname);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', password_hash($password, PASSWORD_ARGON2I));

        return $this->db->single();

        // if ($this->db->single()) {
        //     return $this->db->single();
        // } else {
        //     return false;
        // }
    }

    public function getUsers()
    {
        $this->db->query('select * 
        from User as usr
        inner join person as prs
            on usr.personId = prs.id
        inner join contact as ctt
            on usr.personId = ctt.personId
        inner join UserPerRole as upr
            on usr.id = upr.userId');

        return $this->db->resultSet();
    }


    public function findUserByEmail($email)
    {
        $this->db->query('SELECT p.firstName as firstname
                                ,u.id as userid
                                ,c.email as email
                                ,u.password as password
                          FROM person p
                          inner join contact c on c.personId = p.id
                          inner join user u on u.personId = p.id
                          where c.email = :email ');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if($this->db->rowCount() > 0) {
            return $row;
        }
        else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $row = $this->findUserByEmail($email);
        if($row == false) return false;
        $hashedPassword = $row->password;
        if (password_verify($password, $hashedPassword))
        {
            return $row;
        } else {
            return false;
        }
    }
}
