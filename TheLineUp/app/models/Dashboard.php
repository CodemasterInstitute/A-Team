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

      $this->db->query('INSERT INTO events (event_name, start_date, end_date, event_price, tickets_available, event_description, is_featured, category_id, user_id, event_image, street_number, street_name, street_type, suburb, state, country, postcode) VALUES (:event_name, :start_date, :end_date, :event_price, :tickets_available, :event_description, :is_featured, :category_id, :user_id, :event_image, :street_number, :street_name, :street_type, :suburb, :state, :country, :postcode)');

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
      $this->db->bind(':street_number', $eventData['street_number']);
      $this->db->bind(':street_name', $eventData['street_name']);
      $this->db->bind(':street_type', $eventData['street_type']);
      $this->db->bind(':suburb', $eventData['suburb']);
      $this->db->bind(':state', $eventData['state']);
      $this->db->bind(':country', $eventData['country']);
      $this->db->bind(':postcode', $eventData['postcode']);

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

    public function addOrder($userID, $eventID){


      $userID = (int)$userID;
      $this->db->query('SELECT * FROM users WHERE user_id = :user_id');
      $this->db->bind(':user_id', $userID);
      $user = $this->db->single();

      // decode JSON in event_ids
      $userOrders = json_decode($user->event_ids, true);

      // add event id
      if ($userOrders == "" || count($userOrders) == 0){
        $userOrders[0]->event_id = $eventID;
      } else {
        $userOrders[count($userOrders)]->event_id = $eventID;
      }

      // encode events_ids back to JSON
      $userOrders = json_encode($userOrders);

      // Insert orders back into user
      $this->db->query('UPDATE users SET event_ids = :event_ids WHERE user_id = :user_id');
      $this->db->bind('event_ids', $userOrders);
      $this->db->bind('user_id', $userID);
      $this->db->execute();

      // Reduce available tickets by 1
      $this->db->query('SELECT * FROM events WHERE event_id = :event_id');
      $this->db->bind(':event_id', $eventID);
      $event = $this->db->single();

      $ticketsAvailable = $event->tickets_available - 1;

      $this->db->query('UPDATE events SET tickets_available = :tickets_available WHERE event_id = :event_id');
      $this->db->bind('tickets_available', $ticketsAvailable);
      $this->db->bind('event_id', $eventID);
      $this->db->execute();

    }

    public function getOrders($userID){

      $this->db->query('SELECT event_ids FROM users WHERE user_id = :user_id');
      $this->db->bind('user_id', $userID);
      $userOrders = $this->db->single();
      $userOrders = json_decode($userOrders->event_ids, true);


      if (count($userOrders) > 0){
        
        for ($i = 0; $i < count($userOrders); $i++) {
          $this->db->query('SELECT * FROM events WHERE event_id = :event_id');
          $this->db->bind('event_id', $userOrders[$i]['event_id']);
          $orders[$i] = $this->db->single();
        }

        return $orders;

      } else {

        return null;

      }


    }

  }

?>