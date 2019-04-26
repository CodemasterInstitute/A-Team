<?php
    // Include Database Login Credentials
    include "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/post.php";



// Getting upcoming events


//create connection

$conn = new mysqli($servername, $username, $password, $database);

//check connection

if($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

$Search_categories = "SELECT event_name, price FROM events";
$result = $conn->query($Search_categories);

if ($result->num_rows>0) {
    //output data
    while($row = $result->fetch_assoc()){
        echo "Event: " . $row["event_name"] . " " . "price: " . $row["price"]. "<br>";
    }} else {
    echo "0 results";

}

$conn->close();




?>
<?php

   // Inculde Basic Template for <footer>
   include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php";

   ?>