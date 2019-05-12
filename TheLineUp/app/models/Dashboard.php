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
          phone_number = :phone_number 
        WHERE user_id = :user_id'
      );
     
      //bind values
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':first_name', $data['first_name']);
      $this->db->bind(':last_name', $data['last_name']);
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':phone_number', $data['phone_number']);

      $this->db->execute();

      $this->db->query('SELECT * FROM users WHERE user_id = :user_id');
      $this->db->bind(':user_id', $data['user_id']);
      return $this->db->single();
    }

    public function delete($userID){
      $this->db->query(
        'DELETE FROM users
        WHERE user_id = :user_id'
      );
      $this->db->bind('user_id', $userID);
      $this->db->execute();
    }

    public function categoryIdCheck($categoryName){

      $this->db->query('SELECT category_id FROM categories WHERE name = :name');
      $this->db->bind(':name', $categoryName);
      return $this->db->single();

    }

    public function categories(){

      $this->db->query('SELECT * FROM categories');
      return $this->db->resultSet();

    }

    public function createEvent($eventData) {

      $this->db->query('INSERT INTO events (event_name, start_date, end_date, event_price, tickets_available, event_description, is_featured, category_id, user_id, event_image) VALUES (:event_name, :start_date, :end_date, :event_price, :tickets_available, :event_description, :is_featured, :category_id, :user_id, :event_image)');

      //bind values
      $this->db->bind(':event_name', $eventData['event_name']);
      $this->db->bind(':start_date', $eventData['start_date']);
      $this->db->bind(':end_date', $eventData['end_date']);
      $this->db->bind(':event_price', $eventData['event_price']);
      $this->db->bind(':tickets_available', $eventData['tickets_available']);
      $this->db->bind(':event_description', $eventData['event_description']);
      $this->db->bind(':is_featured', $eventData['is_featured']);
      $this->db->bind(':category_id', $eventData['category_id']);
      $this->db->bind(':user_id', $eventData['user_id']);
      $this->db->bind(':event_image', $eventData['event_image']);

      $this->db->execute();
    }

    public function userEvents($userID) {

      $this->db->query('SELECT * FROM events WHERE user_id = :user_id');

      $this->db->bind(':user_id', $userID);

      return $this->db->resultSet();

    }

    public function event($eventID){

      $this->db->query('SELECT * FROM events WHERE event_id = :event_id');

      $this->db->bind(':event_id', $eventID);

      return $this->db->single();

    }

  }

?>