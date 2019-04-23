<?php 

class CardGenerator {

  private $array;

  function __construct($data) {
    $this->$array = $data;
  }

  function printCard() {

    foreach($this->$array as $val) {
      ?>
      
        <div class="event-card col-lg-8">
          <div class="card-image">
          <img src="<?php echo '/browser/images/events/' . $val['image'] ?>" alt="Event Card Image" />
        </div>
        <div class="card-content">
          <div class="card-title"><?php echo $val["event_name"] ?></div>
          <div class="card-description">
          <?php
            echo $val["description"] . ' <a href="/event.php?id=' . $val["id"] . '">Find out more</a>' ;
          ?>
          </div>
          </div>
        </div>
      <?php
    }
  ?>


    <?php
  }
}

?>



