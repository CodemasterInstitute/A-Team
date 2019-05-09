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

    public function about(){
      $data = [
        'title' => 'About Us'
      ];

      $this->view('pages/about', $data);
    }

    public function dashboard(){

      $data = [
        'title' => 'User Dashboard'
      ];
      $this->view('pages/dashboard', $data);
    }
  }