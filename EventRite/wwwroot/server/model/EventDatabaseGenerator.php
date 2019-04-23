<?php

class EventDatabaseGenerator {

    private $array;

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

    function search() {
        
        return $this->array;

    }

}


?>