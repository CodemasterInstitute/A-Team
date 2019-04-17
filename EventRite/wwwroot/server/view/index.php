<?php
    // Include Database Login Credentials
    include "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/nav.php"; 
?>
  <div id="heroSlider" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="https://via.placeholder.com/1920x500/333333" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://via.placeholder.com/1920x500/37f286" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="https://via.placeholder.com/1920x500/9a76cd" alt="Third slide">
      </div>
    </div>
  </div>

<?php
    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php"; 
    
?>