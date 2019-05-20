<?php
  class Page {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function event($id) {
      
        $this->db->query('SELECT * FROM events WHERE event_id = :event_id');
        $this->db->bind(':event_id', $id);
        return $this->db->single();

    }
  }

?>