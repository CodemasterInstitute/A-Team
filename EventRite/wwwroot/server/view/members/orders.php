<?php

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php";
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/memdash.php";
    ?>

<div class="col-9">

<h3>Your Orders</h3>
<hr/>
<?php  ?>
    <div class="row">
        <div class="col-9">
            <p>Placeholder Event Name and Details</p>
        </div>
        <div class="col-3 text-right">
            <a href="event.php?event_id=1" class="members-link">Go To Event</a>
        </div>
        <hr />
    </div>
    <div class="row">
        <div class="col-9">
            <p>Placeholder Event Name and Details</p>
        </div>
        <div class="col-3 text-right">
            <a href="event.php?event_id=1" class="members-link">Go To Event</a>
        </div>
        <hr />
    </div>
    <div class="row">
        <div class="col-9">
            <p>Placeholder Event Name and Details</p>
        </div>
        <div class="col-3 text-right">
            <a href="event.php?event_id=1" class="members-link">Go To Event</a>
        </div>
        <hr />
    </div>

<?php  ?>

</div>
<div class="col-0 col-md-1 col-lg-2 asevent_ide-right">

</div>
</div>
</div>
</div>

    <?php
    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php"; 

?>