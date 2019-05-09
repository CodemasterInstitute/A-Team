<?php
  class Dashboards extends Controller {
    public function __construct(){
     
    }
    
    public function index(){
      $data = [
        'title' => 'Dashboard',
      ];
     
      $this->view('dashboard/index', $data);
    }

    public function details(){
      $data = [
        'title' => 'Account Details'
      ];

      $this->view('dashboard/details', $data);
    }

    public function events(){

      $data = [
        'title' => 'Your Events'
      ];
      $this->view('dashboard/events', $data);
    }

    public function orders(){

        $data = [
          'title' => 'Your Orders'
        ];
        $this->view('dashboard/orders', $data);
      }
  }