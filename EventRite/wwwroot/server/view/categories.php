<?php

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/post.php";

    print
    
   ' <div class="container-fluid">
          <h2> EVENT CATEGORIES</h2>
      
          <br>
      <div class="container gallery">
          
          <div class="row">
            <a href="#" class="col-md-4 gallery">
              <img src="/browser/images/art.png" class="img-fluid galleryimage">
            </a>
            <a href="#" class="col-md-4 gallery">
              <img src="/browser/images/music.png" class="img-fluid galleryimage">
            </a>
            <a href="#" class="col-md-4 gallery">
              <img src="/browser/images/market.png" class="img-fluid galleryimage">
            </a>
          </div>
          <div class="row">
            <a href="#" class="col-md-4 gallery">
              <img src="/browser/images/food.png" class="img-fluid galleryimage">
            </a>
            <a href="#" class="col-md-4 gallery">
              <img src="/browser/images/comedy.png" class="img-fluid galleryimage">
            </a>
            <a href="#" class="col-md-4 gallery">
              <img src="/browser/images/sport.png" class="img-fluid galleryimage">
            </a>
          </div>
          <div class="row">
            <a href="#" class="col-md-4 gallery">
              <img src="/browser/images/family.png" class="img-fluid galleryimage">
            </a>
            <a href="#" class="col-md-4 gallery">
              <img src="/browser/images/theatre.png" class="img-fluid galleryimage">
            </a>
            <a href="#" class="col-md-4 gallery">
              <img src="/browser/images/other.png" class="img-fluid galleryimage">
            </a>
          </div>
        </div>
      </div>';

    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php";

?>