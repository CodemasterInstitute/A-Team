<?php
    // Include Database Login Credentials
    include "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php";

    // Include Controllers
    include "$_SERVER[DOCUMENT_ROOT]/server/controller/EventDataValidator.php";


    // Include Methods
    include "$_SERVER[DOCUMENT_ROOT]/server/model/EventCreator.php";

    print
    '<div class="row">
        <div class="col-0 col-md-1 col-lg-2 aside-left">


        </div>
        <div class="col-12 col-md-10 col-lg-8 middle">
            <div class="row">';


    if (isset($_POST["event_name"])) {

        $eventDataValidator = new EventDataValidator();
        $errorArray = $eventDataValidator->check();
        if (sizeOf($errorArray) > 0) {

            print
                '<div class="col-12">
                    <h3>Errors</h3>
                </div>
                <div class="col-12">';

            for ($i = 0; $i < sizeOf($errorArray); $i++) {

                print
                '<p>' . $errorArray[$i] . '</p>';

            }

            print
            '</div>
            </div>';

        } else {
            $eventDataArray = $eventDataValidator->pass();

            $eventCreator = new EventCreator();
            $conn = new mysqli($servername, $username, $password, $database);
            $eventCreator->set($conn, $eventDataArray);


            header("Location: /members/events.php");
            die();
        }

    } else {
        // Generate view that displays form.
        print
        '<div class="col-12">
            <h3>Create Event</h3>
        </div>
        <div class="col-3">';
                
                include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/memdash.php";
                
        print
        '</div>
        <div class="col-9">
            <div class="create-event-form row">
                <form action="members/create-event.php" method="post">
                    <div class="form-group col">
                        <div class="row">
                            <div class="col-6">
                                <label>Event Name:</label>
                                <input class="form-control" name="event_name" type="text" />
                            </div>
                            <div class="col-6">
                                <label>Category:</label>
                                <input class="form-control" name="category" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label>Start Date/Time:</label>
                        <div class="row">
                            <div class="col-4 form-group">
                                <input class="form-control" name="start_date_day" type="text" placeholder="Day" />
                            </div>
                            <div class="col-4 form-group">
                                <input class="form-control" name="start_date_month" type="text" placeholder="Month" />
                            </div>
                            <div class="col-4 form-group">
                                <input class="form-control" name="start_date_year" type="text" placeholder="Year" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <input class="form-control" name="start_time_hour" type="text" placeholder="Hour" />
                            </div>
                            <div class="col-6 form-group">
                                <input class="form-control" name="start_time_minute" type="text" placeholder="Minute" />
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label>End Date/Time:</label>
                        <div class="row">
                            <div class="col-4 form-group">
                                <input class="form-control" name="end_date_day" type="text" placeholder="Day" />
                            </div>
                            <div class="col-4 form-group">
                                <input class="form-control" name="end_date_month" type="text" placeholder="Month" />
                            </div>
                            <div class="col-4 form-group">
                                <input class="form-control" name="end_date_year" type="text" placeholder="Year" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <input class="form-control" name="end_time_hour" type="text" placeholder="Hour" />
                            </div>
                            <div class="col-6 form-group">
                                <input class="form-control" name="end_time_minute" type="text" placeholder="Minute" />
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <label>Location:</label>
                        <div class="row">
                            <div class="col form-group">
                                <input class="form-control" name="street_address" type="text" placeholder="Street Address" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <input class="form-control" name="suburb" type="text" placeholder="Suburb" />
                            </div>
                            <div class="col form-group">
                                <input class="form-control" name="state" type="text" placeholder="State" />
                            </div>
                            <div class="col form-group">
                                <input class="form-control" name="country" type="text" placeholder="Country" />
                            </div>
                            <div class="col form-group">
                                <input class="form-control" name="postcode" type="text" placeholder="Postcode" />
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-6 form-group">
                                <label>Price:</label>
                                <input class="form-control" name="price" type="text" />
                            </div>
                            <div class="col-6 form-group">
                                <label>Tickets Available</label>
                                <input class="form-control" name="available_tickets" type="text" />
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="form-group col">
                                <label>Description</label>
                                <textarea class="form-control" name="description">
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="form-group col">
                                <label name="image">Image</label>
                                <input class="form-control-file" type="file" />
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="form-group col">
                                <button class="btn btn-primary" type="submit">Create Event</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>';

    }

    print
                '</div>
            </div>
        <div class="col-0 col-md-1 col-lg-2 aside-right">

        </div>
    </div>';

    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php"; 

?>