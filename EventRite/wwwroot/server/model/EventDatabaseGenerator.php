<?php

class EventDatabaseGenerator {

    public $array;

    function __construct($conn) {

        $sql = "SELECT * FROM events";
        $result = $conn->query($sql);
            
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $array[] = $row;
        }

        $this->array = $array;
        $result->free();
        // mysqli_close($conn);
    }

    function search($searchQuery, $conn) {

      if($searchQuery == '') {
         
        return $this->array;
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

        // while($row = $res->fetch_assoc()) {
        //   $searchArray[] = $row;
        // }
  
        return $res;

      }
         

    //   foreach ($searchQuery as $val) {
    //     if (!empty($val)) {
          
    //     }
    // }

     



        // if ($category == "") {
        //     return $this->array;
        // } else {
        //     for ($i = 0; $i < sizeof($this->array); $i++) {
        //         $searchArray;
        //         if ($this->array[$i]["category"] == $category) {
        //             $searchArray[] = $this->array[$i];
        //         }
        //     }
        //     return $searchArray;
        // }
    }

    function getCategoryList() {
        $categories;
        for ($i = 0; $i < sizeOf($this->array); $i++) {
            $categories[$i] = $this->array[$i]["category"];
        }
        $new = array_unique($categories);
        $second = array_values($new);
        sort($second);
        return $second;
    }

}


?>