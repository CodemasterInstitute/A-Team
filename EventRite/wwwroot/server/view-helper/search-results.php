<?php
require "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 
$searchQuery = $_POST['searchQuery'];
$array = $_POST['array'];
$conn = new mysqli($servername, $username, $password, $database);


function truncate_phrase($phrase, $max_words) {
  $phrase_array = explode(' ',$phrase);
  if(count($phrase_array) > $max_words && $max_words > 0)
     $phrase = implode(' ',array_slice($phrase_array, 0, $max_words)).'...';
  return $phrase;
}

if($searchQuery == []) {
  echo $array;
} 
else {
  $sql = "SELECT * FROM events WHERE event_name LIKE ? AND address LIKE ? AND category LIKE ?";

  $eventName = "%{$searchQuery[0]}%";

  $eventLocation = "%{$searchQuery[1]}%";
  
  if($searchQuery[2] != "All") {
    $category = "$searchQuery[2]";
  } else {
    $category = "%%";
  }
  
  if(!($stmt = $conn->prepare($sql))) {
    echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
  }
  
  $stmt->bind_param('sss', $eventName, $eventLocation, $category);
  $stmt->execute();
  $res = $stmt->get_result();
  // var_dump(mysqli_num_rows($res));
  if(mysqli_num_rows($res) == 0){
    echo "No results matching search.";
  } else {

    while ($row = $res->fetch_assoc()) {
      ?>
        <div class="event-card col-lg-8">
          <div class="card-image">
          <img src="<?php echo '/browser/images/events/' . $row['image'] ?>" alt="<?php echo "Card image for: " . $row['event_name'] ?>" />
        </div>
        <div class="card-content">
          <div class="card-title"><?php echo $row["event_name"] ?></div>
          <div class="card-description">
            <?php echo truncate_phrase($row["description"], 30);?> <a href="/event.php?id=<?php echo $row["id"]?>">Find out more</a>
          </div>
          <div class="event-details">
            <p><?php echo date('jS M Y', strtotime($row["start_date"]))?></p>
            <p><?php echo $row["address"]?></p>
            <p><?php echo $row["price"]?></p>
          </div>
          </div>
        </div>
      <?php
        }
  }

 

  // echo $res;
}

?>