<?php

// Include Database Login Credentials
include "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 

// Include Basic Templates for <head> and <header>
include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php"; 
include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/post.php";

$first_name = $last_name = $email = $mymessage = "";
if(isset($_POST['first_name'])) {
    $first_name = test_input($_POST['first_name']);
} else {
    $first_name = "";
}

if(isset($_POST['last_name'])) {
    $last_name = test_input($_POST['last_name']);
} else {
    $last_name = "";
}

if(isset($_POST['email'])) {
    $email = test_input($_POST['email']);
} else {
    $email = "";
}

if(isset($_POST['mymessage'])) {
    $mymessage = test_input($_POST['mymessage']);
} else {
    $mymessage = "";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// create connection

$mysqli = new mysqli($servername, $username, $password, $database);

// input into database
$sql = "INSERT INTO contactus (first_name, last_name, email, mymessage) VALUES (?, ?, ?, ?)";

// $stmt = $mysqli->prepare($sql);

// testing data - shows in browser
// var dump ($mysqli);

if($stmt = $mysqli->prepare($sql)){
    echo $mysqli->error;
}
$stmt->bind_param('ssss', $first_name, $last_name, $email, $mymessage);

// var dump ($stmt);

if($stmt->execute()) {
    $heading = "Your message has been successfully sent.";
} else {
    $heading = "Your message has been lost in cyberspace. Take it as a sign you were never supposed to send an email.";
}

$stmt->close();
$mysqli->close();
// close frees up resources, would not execute after close

// SELECT, UPDATE, DELETE, INSERT
?>

<form method="POST">
First name: <input type="text" name="first_name">
<BR><BR>
Last name: <input type="text" name="last_name">
<BR><BR>
Email: <input type="text" name="email">
<BR><BR>
Your message: <input type="text" name="mymessage">
<BR><BR>
<button type="Submit">Send</button>
</form>
<?php echo $heading;
?>