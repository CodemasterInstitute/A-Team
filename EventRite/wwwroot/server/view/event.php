<?php

    //Include Model Classes
    include "$_SERVER[DOCUMENT_ROOT]/server/model/EventDataGenerator.php";

    // Include Database Login Credentials
    include "$_SERVER[DOCUMENT_ROOT]/../config/config.php";

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    };

    // GET eventID
    $eventID = $_GET["id"];

    // Create a new EventDataGenerator object and get event data
    $eventDataGenerator = new EventDataGenerator();
    $eventData = $eventDataGenerator->getData($conn, $eventID);


    print
    '<div class="row">
        <div class="col-0 col-md-1 col-lg-2 aside-left">

        </div>
        <div class="col-12 col-md-10 col-lg-8 middle">
            <div class="row">
                <div class="col-12 event-container event-container--image">
                    <img alt="" src="/browser/images/events/' . $eventData["image"] . '" />
                </div>
                <div class="col-6 event-container event-container--title">
                    <h3>' . $eventData["event_name"] . '</h3>
                </div>
                <div class="col-6 text-right event-container event-container--price">
                    <h3>' . $eventData["price"] . '</h3>
                </div>
                <div class="col-12 text-center event-container event-container--tickets">
                    <button type="button" class="btn btn-primary">Tickets</button>
                    <p style="padding-top:10px; margin-bottom:0; font-size: 0.8rem; color: grey;">There are ' . $eventData["available_tickets"] . ' tickets available for this event.</p>
                </div>
                <div class="col-12 col-md-6 event-container event-container--date-time">
                    <h5>Date and Time</h5>
                    <table class="table table-md table-borderless">
                        <tr>
                            <th>Start:</th>
                            <td>' . $eventData["start_date"] . '</td>
                        </tr>
                        <tr>
                            <th>End:</th>
                            <td>' . $eventData["end_date"] . '</td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 col-md-6 event-container event-container--location">
                    <h5>Location</h5>
                    <h6 id="address" value="' . $eventData["address"] . '">' . $eventData["address"] . '</h6>
                </div>
                <div class="col-12 event-container event-container--description">
                    <h5>Description</h5>
                    <p>' . $eventData["description"] . '</p>
                </div>
                <div class="col-12 text-center event-container event-container--map">
                    
                </div>
            </div>
        </div>
        <div class="col-0 col-md-1 col-lg-2 aside-right">

        </div>
    </div>';

    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php";

?>
<script>
    function initMap() {
        var map = new google.maps.Map(document.querySelector('.event-container--map'), {
          zoom: 15,
        });
        var geocoder = new google.maps.Geocoder();

        geocodeAddress(geocoder, map);
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').innerHTML;
        console.log(address);
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }

</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqXwats87-CGLD2NKvUWhqTvF7HqRbhl8&callback=initMap">
</script>