<?php 

class CardGenerator {

  private $array;

  function __construct($data) {
    $this->$array = $data;
  }

  function printCard() {

    function truncate_phrase($phrase, $max_words) {
      $phrase_array = explode(' ',$phrase);
      if(count($phrase_array) > $max_words && $max_words > 0)
         $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
      return $phrase;
   }

    foreach($this->$array as $val) {
      // var_dump($val);      
      ?>
        <div class="event-card col-lg-8">
          <div class="card-image">
          <img src="<?php echo '/browser/images/events/' . $val['image'] ?>" alt="<?php echo "Card image for: " . $val['event_name'] ?>" />
        </div>
        <div class="card-content">
          <div class="card-title"><?php echo $val["event_name"] ?></div>
          <div class="card-description">
            <?php echo truncate_phrase($val["description"], 30);?> <a href="/event.php?id=<?php echo $val["id"]?>">Find out more</a>
          </div>
          <div class="event-details">
            <p><?php echo date('jS M Y', strtotime($val["start_date"]))?></p>
            <p><?php echo $val["address"]?></p>
            <p><?php echo $val["price"]?></p>
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



