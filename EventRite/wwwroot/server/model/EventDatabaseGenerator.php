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
    }

    function search($category) {
        
        if ($category == "") {
            return $this->array;
        } else {
            for ($i = 0; $i < sizeof($this->array); $i++) {
                $searchArray;
                if ($this->array[$i]["category"] == $category) {
                    $searchArray[] = $this->array[$i];
                }
            }
            return $searchArray;
        }
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