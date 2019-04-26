<?php

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php";
?>
    <div class="row">
        <div class="col-0 col-md-1 col-lg-2 aside-left">';

        
    <!-- Navigation Bar Goes Here. -->


    </div>
        <div class="col-12 col-md-10 col-lg-8 middle">
            <div class="row">
                <div class="col-12">
                    <h3>Details</h3>
                </div>
                <div class="col-12">
                    <h5>First Name</h5>
                    <h5>Last Name</h5>
                    <h5>Email</h5>
                    <h5>Address</h5>
                    <button>Update Details</button>
                    <button>Change Password</button>
                </div>
            </div>
        </div>
        <div class="col-0 col-md-1 col-lg-2 aside-right">

        </div>
    </div>

<?php
    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php"; 

?>