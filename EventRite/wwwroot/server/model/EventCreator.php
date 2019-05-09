<?php

class EventCreator {

    function __construct() {
    }

    function set($conn, $eventDataArray) {
        
        // Set Event
        $sql = 'INSERT INTO `events` (`event_name`, `category`, `start_date`, `end_date`, `address`, `price`, `available_tickets`, `description`) VALUES
        ("' . $eventDataArray[0] . '", "' . $eventDataArray[1] . '", "' . $eventDataArray[2] . '", "' . $eventDataArray[3] . '", "' . $eventDataArray[4] . '", "' . $eventDataArray[5] . '", "' . $eventDataArray[6] . '", "' . $eventDataArray[7] . '")';
        $conn->query($sql);

        // Get Event
        $sql = "SELECT * FROM events WHERE event_name = '" . $eventDataArray[0] . "'";
        $result = $conn->query($sql);

        // output data of each row
        while($row = $result->fetch_assoc()) {
            $array[] = $row;
        }

        $result->free();
        return $array;
        
    }

}


?>