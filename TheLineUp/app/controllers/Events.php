<?php
  class Events extends Controller{
    public function __construct(){
      $this->eventModel = $this->model('Event');
    }

    public function index(){
      redirect('pages/notfound');
    }

    public function all(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $events = $this->eventModel->getAllEvents();
        echo json_encode($events);
      } else {
        redirect('pages/notfound');
      }

    }

    public function search(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $events = $this->eventModel->getEventsBySearch();
        echo json_encode($events);
      } else {
        redirect('pages/notfound');
      }
    }
    
    public function categories(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $categories = $this->eventModel->getCategoryList();
        echo json_encode($categories);    
      } else {
        redirect('pages/notfound');
      }
    }

    public function locations(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $locations = $this->eventModel->getLocations();
        echo json_encode($locations);
      } else {
        redirect('pages/notfound');
      }
    }

    public function eventNames(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $names = $this->eventModel->getNames();
        echo json_encode($names);    
      } else {
        redirect('pages/notfound');
      }
    }
  }
