<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
        <div class="col-0 col-md-1 col-lg-2 aside-left">

        </div>
        <div class="col-12 col-md-10 col-lg-8 middle">
            <div class="row">
                <div class="col-12 event-container event-container--image">
                    <img alt="" src="<?php echo URLROOT . '/public/img/events/' . $data['event']->event_image; ?>" />
                </div>
                <div class="col-6 event-container event-container--title">
                    <h3><?php echo $data['event']->event_name; ?></h3>
                </div>
                <div class="col-6 text-right event-container event-container--price">
                    <h3><?php echo $data['event']->event_price; ?></h3>
                </div>
                <div class="col-12 text-center event-container event-container--tickets">
                    <?php if ($data['event']->tickets_available != "0") : ?>
                        <a href="<?php echo URLROOT . '/dashboards/orders?event_id=' . $data['event']->event_id; ?>" class="btn btn-primary">Tickets</a>
                    <?php else : ?>
                        <a class="btn btn-warning">Unavailable</a>
                    <?php endif; ?>
                    <p style="padding-top:10px; margin-bottom:0; font-size: 0.8rem; color: grey;">There are <?php echo $data['event']->tickets_available; ?> tickets available for this event.</p>
                </div>
                <div class="col-12 col-md-6 event-container event-container--date-time">
                    <h5>Date and Time</h5>
                    <table class="table table-md table-borderless">
                        <tr>
                            <th>Start:</th>
                            <td><?php echo $data['event']->start_date; ?></td>
                        </tr>
                        <tr>
                            <th>End:</th>
                            <td><?php echo $data['event']->end_date; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-12 col-md-6 event-container event-container--location">
                    <h5>Location</h5>
                    <h6 id="address" value=""></h6>
                </div>
                <div class="col-12 event-container event-container--description">
                    <h5>Description</h5>
                    <p><?php echo $data['event']->event_description; ?></p>
                </div>
                <div class="col-12 text-center event-container event-container--map">
                    
                </div>
            </div>
        </div>
        <div class="col-0 col-md-1 col-lg-2 aside-right">

        </div>
    </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
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