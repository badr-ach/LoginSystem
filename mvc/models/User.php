<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (username, email, password) VALUES(:username, :email, :password)');

        //insere les valeurs
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute la requette
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password) {
        $this->db->query('SELECT * FROM users WHERE username = :username');

        //insere les valeurs
        $this->db->bind(':username', $username);

        $row = $this->db->single();

        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    //trouve l'utilisateur par mail
    public function findUserByEmail($email) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
  
        $this->db->bind(':email', $email);
        //verifie s'il l'email est déja utilisé
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
