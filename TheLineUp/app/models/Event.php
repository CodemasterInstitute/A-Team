<?php
  class Event {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function getAllEvents(){
      $this->db->query('SELECT * FROM events');
      $results = $this->db->resultSet();
      return $results;
    }

    public function getEventsBySearch(){
      $data = json_decode(file_get_contents('php://input'), true);
      $name = $data['name'];
      $name = "%".$name."%";
      $location = $data['location'];
      $location = "%".$location."%";
      $categoryID = $data['category'];
      if($categoryID == 'All') {
        $this->db->query('SELECT * FROM events WHERE event_name LIKE :name AND suburb LIKE :location');
      } else {
        $this->db->query('SELECT * FROM events WHERE event_name LIKE :name AND suburb LIKE :location AND category_id = :category ORDER BY start_date DESC');
        $this->db->bind(':category', $categoryID);
      }
      $this->db->bind(':name', $name);
      $this->db->bind(':location', $location);
      
      $results = $this->db->resultSet();
      return $results;
    }

    public function getCategoryList(){
      $this->db->query('SELECT * FROM categories');
      $results = $this->db->resultSet();
      return $results;
    }

    public function getLocations(){
      $this->db->query('SELECT DISTINCT suburb FROM events');
      $results = $this->db->resultSet();
      return $results;
    }

    public function getNames(){
      $this->db->query('SELECT event_name FROM events');
      $results = $this->db->resultSet();
      return $results;
    }
  }
