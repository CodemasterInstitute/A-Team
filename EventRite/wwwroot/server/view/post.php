<?php
    // Include Database Login Credentials
    include "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php"; 
?>
  
  <div class="jumbotron jumbotron-fluid post">
  <div class="container">
    <h1 class="display-4">Post page title</h1>
    <!-- <p class="lead">Other text</p> -->
  </div>
  </div>

<div class="container">
[insert body]
</div>
</div>

<?php
    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php"; 
    
?>