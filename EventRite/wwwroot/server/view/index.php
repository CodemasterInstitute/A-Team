<?php
    // Include Database Login Credentials
    include "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php"; 
?>
  <div class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="browser/images/index/slider-image1.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="browser/images/index/slider-image2.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="browser/images/index/slider-image3.jpg" alt="Third slide">
      </div>
    </div>
  </div>

  <div class="search-sec">
    <div class="container">
        <form action="#" method="post" novalidate="novalidate">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-field" placeholder="Event Name">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <input type="text" class="form-control search-field" placeholder="City">
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <select class="form-control search-field" id="exampleFormControlSelect1">
                                <option>Category</option>
                                <option>Music</option>
                                <option>Theatre</option>
                                <option>Family</option>
                                <option>Comedy</option>
                                <option>Sport</option>
                                <option>Food & Wine</option>
                                <option>Free</option>
                                <option>Art</option>
                                <option>Markets</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="button" class="btn btn-danger wrn-btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="container card-container">
  
<h1>Upcoming Events</h1>
  <?php include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/card-list.php"; ?>
  <?php include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/card-list.php"; ?>
  <?php include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/card-list.php"; ?>
  <?php include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/card-list.php"; ?>
</div>
<?php

    
    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php"; 
    
?>