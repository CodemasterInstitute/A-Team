<?php
  class Pages extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => 'Events Page',
      ];
     
      $this->view('pages/index', $data);
    }

    public function contact(){
      $data = [
        'title' => 'Contact'
      ];

      $this->view('pages/contact', $data);
    }
  }