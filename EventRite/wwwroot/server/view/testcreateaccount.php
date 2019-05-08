
<?php
    // Include Database Login Credentials
    include "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/post.php";



// Getting upcoming events


//create connection

//$conn = new mysqli($servername, $username, $password, $database);

// //check connection

 //if($conn->connect_error) {
 // die("Connection Failed: " . $conn->connect_error);
 //}

// $Search_categories = "SELECT event_name, price FROM events";
// $result = $conn->query($Search_categories);

// if ($result->num_rows>0) {
//     //output data
//     while($row = $result->fetch_assoc()){
//         echo "Event: " . $row["event_name"] . " " . "price: " . $row["price"]. "<br>";
//     }} else {
//     echo "0 results";

// }

// $conn->close();




//posting to database

$fName = $lName = $email = $pword = "";
if(isset($_POST['fName'])){
    $fName = test_input($_POST["fName"]);
} else {
    $fName = "";
}

$lName = $lName = "";
if(isset($_POST['lName'])){
    $lName = test_input($_POST["lName"]);
} else {
    $lName = "";
}

$email = $email = "";
if(isset($_POST['email'])){
    $email= test_input($_POST["email"]);
} else {
    $email = "";
}

$pword = $pword = "";
if(isset($_POST['pword'])){
    $pword = test_input($_POST["pword"]);
} else {
    $pword = "";
}

function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// create database connection
$conn = new mysqli($servername, $username, $password, $database);

if($conn->connect_error) {
  die("Connection Failed: " . $conn->connect_error);
 }

$sql = "INSERT INTO users (fName, lName, email, pword) VALUES (?, ?, ?, ?)";


//for testing data
// var_dump ($conn);

if($stmt = $conn->prepare($sql)){
    echo $conn->error;
} else {
    echo "success";
}

// $stmt = "";
// if(!($stmt = $conn->prepare("INSERT INTO users (fName, lName, email, pword) VALUES(?, ?, ?, ?)"))){
//     die("Error preparing:(" .$conn->errno . ") " . $conn->error);
// }

// $fName = "Dan";
// $lName = "awesome";
// $email = "hello@mail.com";
// $pword = "hello";

// if(!($stmt->bind_param("ssss", $fName, $lName, $email, $pword))) {
//     die("error in bind_param: (" .$conn->errno . ")" . $conn->error);
// }



 $stmt->bind_param('ssss', $fName, $lName, $email, $pword);
 $stmt->execute();


// if ($stmt->execute()){
//     echo "hello";
// }else{
//     echo "goodbye";
// }

//var_dump("stmt");

$stmt->close();
$conn->close();  //close frees up resources.   Would not execute after close

// //select, update, delete, insert


?>



<div id="logreg-forms" class="new-account">
   <form class="form-signin" method= "POST">
       <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Create Account</h1>
       

       <div class="form-row">
           <div class="col-md-6">
             <input type="text" name ="fName" class="form-control" placeholder="First name">
           </div>
           <div class="col-md-6">
             <input type="text" name ="lName" class="form-control" placeholder="Last name">
           </div>
         </div>
        
       <input type="email" name = "email" id="inputEmail" class="form-control" placeholder="Email address" required=""
           autofocus="">
       </row>
       <row>
       <input type="password" name ="pword" id="inputPassword" class="form-control" placeholder="Password" required="">
  
       
       <p class="text-center"> Your password must be at least 8 characters</p>
       <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Create Account</button>
       <hr>
       

       
   </form>

   

   <form action="/signup/" class="form-signup">
       <div class="social-login">
           <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign
                   up with Facebook</span> </button>
       </div>
       <div class="social-login">
           <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign
                   up with Google+</span> </button>
       </div>

       <p style="text-align:center">OR</p>

       <input type="text" id="user-name" class="form-control" placeholder="Full name" required="" autofocus="">
       <input type="email" id="user-email" class="form-control" placeholder="Email address" required autofocus="">
       <input type="password" id="user-pass" class="form-control" placeholder="Password" required autofocus="">
       <input type="password" id="user-repeatpass" class="form-control" placeholder="Repeat Password" required
           autofocus="">

       <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
       <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>
   </form>
   <br>

</div>




<?php
echo $heading;



// Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php";

    ?>