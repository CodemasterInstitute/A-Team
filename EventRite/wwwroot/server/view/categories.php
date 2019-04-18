<?php

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/post.php";

    print
    '<div class="row">
        <div class="col-0 col-sm-2 aside-left">

        </div>
        <div class="col-12 col-sm-8 middle">
            <div class="row">
                <div class="col-12 event-container event-container--image">
                    <img alt="" src="/browser/images/banner.jpg" />
                </div>
                <div class="col-12 col-sm-8 event-container event-container--title">
                    <h3>CodeMaster Fyre Festival</h3>
                </div>
                <div class="col-12 col-sm-4 text-center event-container event-container--tickets">
                    <button type="button" class="btn btn-primary">Tickets</button>
                </div>
                <div class="col-12 col-sm-6 event-container event-container--date-time">
                    <h5>Date and Time</h5>
                    <h6>Sunday, 21st of April 2019</h6>
                    <h6>1:00 pm - 10:00pm AWST</h6>
                </div>
                <div class="col-12 col-sm-6 event-container event-container--location">
                    <h5>Location</h5>
                    <h6>Claremont Showgrounds</h6>
                    <h6>1 Graylands Road</h6>
                    <h6>Claremont, WA 6010</h6>
                </div>
                <div class="col-12 event-container event-container--description">
                    <h5>Description</h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi at lorem eleifend sem tempor placerat. Maecenas commodo libero lorem, sit amet faucibus urna consequat luctus. Aenean at viverra ipsum, id sodales urna. Integer velit neque, fringilla eget auctor eget, tristique vel augue. Phasellus egestas scelerisque semper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In congue facilisis porta. Phasellus fringilla scelerisque dolor, sed pharetra turpis accumsan et. Quisque aliquam quam felis.
                    </p>
                    <p>
                        Aliquam id ante convallis, consectetur mi in, fermentum est. Morbi a ultrices augue. Phasellus eu metus metus. Duis maximus, libero vel pulvinar ornare, dolor augue faucibus metus, sed porttitor mauris magna et sem. Donec ligula ex, aliquet nec ullamcorper a, commodo quis lorem. Nullam tempus dignissim pellentesque. Donec vel elit sed ipsum rutrum varius ac a orci. Sed pellentesque non lectus non elementum. Quisque vitae orci velit. Cras quis sem elementum, varius lorem in, ornare lectus. Vivamus sit amet est nec turpis iaculis tempor. Etiam sit amet neque convallis, volutpat mauris quis, viverra neque.
                    </p>
                </div>
                <div class="col-12 text-center event-container event-container--map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3384.4977496664796!2d115.78338305008975!3d-31.97451968112956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a32a44cba541e9f%3A0xd6710098215acd52!2sClaremont+Showground!5e0!3m2!1sen!2sau!4v1555477914006!5m2!1sen!2sau" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="col-0 col-sm-2 aside-right">

        </div>
    </div>';

    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php";

?>