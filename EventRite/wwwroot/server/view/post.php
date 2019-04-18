<?php
    // Include Database Login Credentials
    include "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/nav.php"; 
?>
  
  <div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4, text-center">Support</h1>
    <!-- <p class="lead">Other text</p> -->
  </div>
  </div>

  <div class="container">
<div class="row contact">
<div class="card contact" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Organiser</h5>
    <p class="card-text">Maybe more text</p>
  </div>
</div>

<div class="card contact" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Attendee</h5>
    <p class="card-text">Maybe more text</p>
  </div>
</div>

<div class="card contact" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Advertiser</h5>
    <p class="card-text">Maybe more text</p>
  </div>
</div>
</div>
</div>

<div class="container">
<h3 style="text-align: center; color: red;">Div changes depending on box seleteced</h3>
</div>
</div>

<?php
    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php"; 
    
?>