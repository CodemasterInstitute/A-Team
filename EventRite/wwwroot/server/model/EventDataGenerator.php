<?php   

    class EventDataGenerator {

        function __construct() {

        }

        function getData ($conn, $eventID) {

            $sql = "SELECT * FROM events WHERE id = '$eventID'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    if ($row["price"] != "Free") {
                        $row["price"] = "$ " . $row["price"];
                    }
                    return $row;
                }
            }

            $result->free();
        }

    }


?>