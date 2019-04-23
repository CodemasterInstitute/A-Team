<?php

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/post.php";

    include "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/model/EventDatabaseGenerator.php";
    
    $conn = new mysqli($servername, $username, $password, $database);
    $dbData = new EventDatabaseGenerator($conn);
    $data = $dbData->search();

    print '<pre>';
    print_r($data);
    print '</pre>';


    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php";

?>