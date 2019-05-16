<?php
  class Users extends Controller{
    public function __construct(){
      $this->userModel = $this->model('User');
    }

    public function register(){
      //check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Process form

        //sanitize data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'first_name' => trim($_POST['first_name']),
          'last_name' => trim($_POST['last_name']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'first_name_err' => '',
          'last_name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        //validate name
        if(empty($data['first_name'])){
          $data['first_name_err'] = 'Please enter your name';
        }

        if(empty($data['last_name'])){
          $data['last_name_err'] = 'Please enter your name';
        }

        //validate email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter your email';
        } else {
          //check if email exists
          if($this->userModel->findUserByEmail($data['email'])){
            $data['email_err'] = "That email is already in use";
          }
        }

        //validate password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter a password';
        }elseif(strlen($data['password']) < 6 ){
          $data['password_err'] = 'Password must be at least 6 characters';
        }

        //validate confirm password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Please confirm password';
        } else {
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Passwords do not match';
          }
        }

        //check if no errors
        if(empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
          //Validated
          
          //hash password
          $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

          //register user
          if($this->userModel->register($data)){
            flash('register_success', 'You are now registered and can log in');
            redirect('users/login');
          } else {
            die('Oops! Something went wrong.');
          }
        } else {
          //load view with errors
          $this->view('users/register', $data);
        }

        


      } else {
        //init data
        $data = [
          'first_name' => '',
          'last_name' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'first_name_err' => '',
          'last_name_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => ''
        ];

        //load view
        $this->view('users/register', $data);
      }
    }

    public function login(){
      //check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Process form
        //sanitize data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => ''
        ];

        //validate email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter your email';
        }
        
        //validate password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter your password';
        }

        //check for user email
        if($this->userModel->findUserByEmail($data['email'])) {
         //user exists
        } else {
          //user doesnt exist
          $data['email_err'] = 'No user found with that email';
          
        }
        
        //check if no errors
        if(empty($data['email_err']) && empty($data['password_err'])){
          //Validated
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);
          if($loggedInUser){
            //create session 
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password Incorrect';
            $this->view('users/login', $data);
          }
        } else {
          //load view with errors
          $this->view('users/login', $data);
        }


      } else {
        //init data
        $data = [
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => ''
        ];

        //load view
        $this->view('users/login', $data);
      }
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_name']);
      unset($_SESSION['user_email']);
      session_destroy();
      flash('logged_out', 'You are now logged out', 'alert alert-danger');
      redirect('users/login');
    }

    public function createUserSession($user){
      $_SESSION['user'] = $user;
      // $_SESSION['user_name'] = $user->first_name;
      // $_SESSION['user_email'] = $user->email;
      redirect('dashboards');
    }
  }