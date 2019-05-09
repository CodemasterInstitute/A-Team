<?php
  class Dashboard {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function update($data) {
      $this->db->query(
        'UPDATE users
        SET
          first_name = :first_name,
          last_name = :last_name,
          email = :email,
          password = :password,
          phone_number = :phone_number 
        WHERE user_id = :user_id'
      );
     
      //bind values
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':first_name', $data['first_name']);
      $this->db->bind(':last_name', $data['last_name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password']);
      $this->db->bind(':phone_number', $data['phone_number']);

      $this->db->execute();

      $this->db->query('SELECT * FROM users WHERE user_id = :user_id');
      $this->db->bind(':user_id', $data['user_id']);
      return $this->db->single();
    }
  }

?>