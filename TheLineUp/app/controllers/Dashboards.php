<?php
  class Dashboards extends Controller {
    public function __construct(){
      $this->dashboardModel = $this->model('Dashboard');
    }
    
    public function index(){
      
      if (!isset($_SESSION['user'])) {

        redirect('users/login');

      } else {
        $data = [
          'title' => 'Dashboard',
        ];
      }
     
      $this->view('dashboard/index', $data);
    }

    public function details(){

      if (!isset($_SESSION['user'])) {

        redirect('users/login');

      } else if (isset($_POST['type']) && $_POST['type'] == 'edit'){

        $updateData = [
          'user_id' => $_SESSION['user']->user_id,
          'first_name' => $_POST['first_name'],
          'last_name' => $_POST['last_name'],
          'email' => $_POST['email'],
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
        'user' => $_SESSION['user']
      ];

      $this->view('dashboard/details', $data);
    }

    public function events(){

      if (!isset($_SESSION['user'])) {

        redirect('users/login');

      } else if (isset($_GET['type']) && $_GET['type'] == 'create'){
      
        $categories = $this->dashboardModel->categories();
        $data['categories'] = $categories;
      
      } elseif (isset($_GET['type']) && $_GET['type'] == 'edit'){

        $event = $this->dashboardModel->event($_GET['event_id']);
        $categories = $this->dashboardModel->categories();

        $data['event'] = $event;
        $data['categories'] = $categories;

      } elseif (isset($_GET['type']) && $_GET['type'] == 'delete'){

      } else {

        if (isset($_POST['type']) && $_POST['type'] == 'create'){
          
          $target_dir = dirname(dirname(dirname(__FILE__))) . "/public/img/events/";
          $image_file = basename($_FILES["event_image"]["name"]);
          $target_file = $target_dir . $image_file;
          $uploadOk = 1;
          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

          $errors = array();

          // Check if image file is a actual image or fake image
          $check = getimagesize($_FILES["event_image"]["tmp_name"]);
          if($check !== false) {
              // echo "File is an image - " . $check["mime"] . ".";
              $uploadOk = 1;
          } else {
              array_push($errors, "File is not an image.");
              $uploadOk = 0;
          }

          // Check if file already exists
          if (file_exists($target_file)) {
            array_push($errors, "Sorry, file already exists.");
            $uploadOk = 0;
          }

          // Check file size
          if ($_FILES["event_image"]["size"] > 500000) {
            array_push($errors, "Sorry, your file is too large and must be under 500000 kB");
            $uploadOk = 0;
          }

          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" ) {
            array_push($errors, "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
              $uploadOk = 0;
          }

          // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) {
            array_push($errors, "Sorry, your file was not uploaded.");
          // if everything is ok, try to upload file
          } else {
            if (move_uploaded_file($_FILES["event_image"]["tmp_name"], $target_file)) {
                // echo "The file ". basename( $_FILES["event_image"]["name"]). " has been uploaded.";
            } else {
              array_push($errors, "Sorry, there was an error uploading your file.");
            }
          }
          
          if (sizeOf($errors) > 0) {
            $data['errors'] = $errors;
          } else {
            $startDate = $_POST['start_date_year'] . ':' . $_POST['start_date_month'] . ':' . $_POST['start_date_day'] . ':' . $_POST['start_time_hour'] . ':' . $_POST['start_time_minute'] . ':00';
            $endDate = $_POST['end_date_year'] . ':' . $_POST['end_date_month'] . ':' . $_POST['end_date_day'] . ':' . $_POST['end_time_hour'] . ':' . $_POST['end_time_minute'] . ':00';
          
            $categoryID = $this->dashboardModel->categoryIdCheck($_POST['category_name'])->category_id;
    
            $eventData = [
              'event_name' => $_POST['event_name'],
              'user_id' => $_POST['user_id'],
              'start_date' => $startDate,
              'end_date' => $endDate,
              'event_price' => $_POST['event_price'],
              'tickets_available' => $_POST['tickets_available'],
              'event_description' => $_POST['event_description'],
              'is_featured' => $_POST['is_featured'],
              'category_id' => $categoryID,
              'event_image' => $image_file,
              'street_number' => $_POST['street_number'],
              'street_name' => $_POST['street_name'],
              'street_type' => $_POST['street_type'],
              'suburb' => $_POST['suburb'],
              'state' => $_POST['state'],
              'country' => $_POST['country'],
              'postcode' => $_POST['postcode'],
            ];
    
            $this->dashboardModel->createEvent($eventData);
          }
        }

        $user = $_SESSION['user'];
        $userEvents = $this->dashboardModel->userEvents($user->user_id);
        $data['user_events'] = $userEvents;


      }

      $data['title'] = 'Your Events';

      $this->view('dashboard/events', $data);
    }

    public function orders(){
      
      if (!isset($_SESSION['user'])) {

        redirect('users/login');

      } else if (isset($_POST['type']) && $_POST['type'] == 'order'){

        // Add event id to user 'event_ids'
        $this->dashboardModel->addOrder($_SESSION['user']->user_id, $_POST['event_id']);
        $data = array();
        redirect('dashboards/orders');


      } else if (isset($_GET['event_id'])) {
        
        $event = $this->dashboardModel->event($_GET['event_id']);
        $data['event'] = $event;
        
      } else {

        // Get all orders
        $orders = $this->dashboardModel->getOrders($_SESSION['user']->user_id);
        $data['orders'] = $orders;
      }
        $this->view('dashboard/orders', $data);
      }
  }