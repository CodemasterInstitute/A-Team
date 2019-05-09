<?php
  class Dashboards extends Controller {
    public function __construct(){
      $this->dashboardModel = $this->model('Dashboard');
    }
    
    public function index(){
      $data = [
        'title' => 'Dashboard',
      ];
     
      $this->view('dashboard/index', $data);
    }

    public function details(){

      $user = $_SESSION['user'];

      if (isset($_POST['type']) && $_POST['type'] == 'edit'){

        $updateData = [
          'user_id' => $_SESSION['user']->user_id,
          'first_name' => $_POST['first_name'],
          'last_name' => $_POST['last_name'],
          'email' => $_POST['email'],
          'password' => $_POST['password'],
          'phone_number' => $_POST['phone_number']
        ];

        $user = $this->dashboardModel->update($updateData);

        $_SESSION['user'] = $user;

      } else if (isset($_POST['type']) && $_POST['type'] == 'delete') {

        if ($_POST['delete-check'] == 'DELETE'){
          $this->dashboardModel->delete($_SESSION['user']->user_id);

          unset($_SESSION['user']);
          redirect('/');
        } else {
          
          $errors = "You did not spell DELETE correctly";
          $data['errors'] = $errors;
          redirect('dashboards/details?type=delete');
          
        }

      }

      $data = [
        'user' => $user
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