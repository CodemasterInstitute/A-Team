<?php
  class Events extends Controller{
    public function __construct(){
      $this->eventModel = $this->model('Event');
    }

    public function all(){
      $events = $this->eventModel->getAllEvents();
      echo json_encode($events);
    }

    public function search(){
      $events = $this->eventModel->getEventsBySearch();
      echo json_encode($events);
    }
    
    public function categories(){
      $categories = $this->eventModel->getCategoryList();
      echo json_encode($categories);
    }
  }
