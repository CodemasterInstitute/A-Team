<?php
    // Include Database Login Credentials
    include "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/model/EventDatabaseGenerator.php";

    $conn = new mysqli($servername, $username, $password, $database);
    $dbData = new EventDatabaseGenerator($conn);

    if ($_GET) {
      $category = $_GET["category"];
      $data = $dbData->search($category);
    } else {
      $data = $dbData->search("");
    }

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
        <form action="index.php" method="get" novalidate="novalidate">
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
                            <select name="category" class="form-control search-field" id="exampleFormControlSelect1">
                            <?php
                                $categories = $dbData->getCategoryList();
                                for ($i = 0; $i < sizeOf($categories); $i++) {
                                    print '<option>';
                                    print $categories[$i];
                                    print '</option>';
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                            <button type="submit" value="submit" class="btn btn-danger wrn-btn">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="container card-container">
  
<h1>Upcoming Events</h1>
  <?php
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/CardGenerator.php"; 
    $list = new CardGenerator($data);
    $list->printCard();
  ?>
</div>
<?php

    
    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php"; 
    
?>