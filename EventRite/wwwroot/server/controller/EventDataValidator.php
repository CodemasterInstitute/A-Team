<?php

class EventDataValidator {

    function __construct() {
        
    }

    function check() {

        // Assign variables to $_POST Data
        $eventName = $_POST["event_name"];
        $category = $_POST["category"];
        $startDateDay = $_POST["start_date_day"];
        $startDateMonth = $_POST["start_date_month"];
        $startDateYear = $_POST["start_date_year"];
        $startTimeHour = $_POST["start_time_hour"];
        $startTimeMinute = $_POST["start_time_minute"];
        $endDateDay = $_POST["end_date_day"];
        $endDateMonth = $_POST["end_date_month"];
        $endDateYear = $_POST["end_date_year"];
        $endTimeHour = $_POST["end_time_hour"];
        $endTimeMinute = $_POST["end_time_minute"];
        $streetAddress = $_POST["street_address"];
        $suburb = $_POST["suburb"];
        $state = $_POST["state"];
        $country = $_POST["country"];
        $postcode = $_POST["postcode"];
        $price = $_POST["price"];
        $availableTickets = $_POST["available_tickets"];
        $description = $_POST["description"];

        // Establish Error Array
        $errorArray = array();


        // Check for invalid data.
        if (strlen($eventName) > 40) {
            $errorArray[] = "The event name provided has more than 40 characters. The event name field requires less than 40 characters.";
        }

        if (strlen($category) > 40) {
            $errorArray[] = "The category provided has more than 40 characters. The category field requires less than 40 characters.";
        }

        if (strlen($streetAddress) > 40) {
            $errorArray[] = "The street address provided has more than 40 characters. The street address field requires less than 40 characters.";
        }

        return $errorArray;
    }

    function pass() {

        // Assign variables to $_POST Data
        $eventName = $_POST["event_name"];
        $category = $_POST["category"];
        $startDateDay = $_POST["start_date_day"];
        $startDateMonth = $_POST["start_date_month"];
        $startDateYear = $_POST["start_date_year"];
        $startTimeHour = $_POST["start_time_hour"];
        $startTimeMinute = $_POST["start_time_minute"];
        $endDateDay = $_POST["end_date_day"];
        $endDateMonth = $_POST["end_date_month"];
        $endDateYear = $_POST["end_date_year"];
        $endTimeHour = $_POST["end_time_hour"];
        $endTimeMinute = $_POST["end_time_minute"];
        $streetAddress = $_POST["street_address"];
        $suburb = $_POST["suburb"];
        $state = $_POST["state"];
        $country = $_POST["country"];
        $postcode = $_POST["postcode"];
        $price = $_POST["price"];
        $availableTickets = $_POST["available_tickets"];
        $description = $_POST["description"];

        $startDateTime = $startDateYear . "-" . $startDateMonth . "-" . $startDateDay . " " . $startTimeHour . ":" . $startTimeMinute . ":00";

        $endDateTime = $endDateYear . "-" . $endDateMonth . "-" . $endDateDay . " " . $endTimeHour . ":" . $endTimeMinute . ":00";

        $address = $streetAddress . ", " . $suburb . ", " . $state . ", " . $country . ", " . $postcode;

        $eventArray = array();

        $eventArray[] = $eventName;
        $eventArray[] = $category;
        $eventArray[] = $startDateTime;
        $eventArray[] = $endDateTime;
        $eventArray[] = $address;
        $eventArray[] = $price;
        $eventArray[] = $availableTickets;
        $eventArray[] = $description;

        return $eventArray;
    }

}


?>