<?php
    // Include Database Login Credentials
    include "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/post.php";



// create connection

$conn = new mysqli($servername, $username, $password, $database);

// check connection

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

// when it doesn't fail

$search_categories = "SELECT event_name, price, available_tickets FROM events";
$result = $conn->query($search_categories);

if($result->num_rows>0){
    // output data
    while($row = $result->fetch_assoc()){
        echo "Event: " . $row["event_name"] . " " . $row["price"] . " " . $row["available_tickets"] . "<br>";
    }} else {
        echo "find a new job";
}

$conn->close();

?>