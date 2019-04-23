<?php 

class CardGenerator {

  private $array;

  function __construct($data) {
    $this->array = $data;
  }

  function printCard() {

    function truncate($text, $chars = 300) {
      if(strlen($text) > $chars) {
          $text = $text.' ';
          $text = substr($text, 0, $chars);
          $text = substr($text, 0, strrpos($text ,' '));
          $text = $text.'...';
      }
      return $text;
  }
    foreach($this->array as $val) {
      ?>
      
        <div class="event-card col-lg-8">
          <div class="card-image">
          <img src="https://via.placeholder.com/200" alt="Event Card Image" />
        </div>
        <div class="card-content">
          <div class="card-title"><?php echo $val["event_name"] ?></div>
          <div class="card-description">
          <?php
            echo truncate($val["description"]) . ' <a href="/event.php?id=' . $val["id"] . '">Find out more</a>' ;
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



