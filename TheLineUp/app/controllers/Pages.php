<?php
  class Pages extends Controller {
    public function __construct(){
      $this->pageModel = $this->model('Page');
    }
    
    public function index(){
      $data = [
        'title' => 'Events Page',
      ];
     
      $this->view('pages/index', $data);
    }

    public function event(){

      $eventID = $_GET['event_id'];

      $event = $this->pageModel->event($eventID);

      $data = [
        'event' => $event
      ];

      $this->view('pages/event', $data);
    }

    public function contact(){
      $data = [
        'title' => 'Contact'
      ];

      $this->view('pages/contact', $data);
    }
  }