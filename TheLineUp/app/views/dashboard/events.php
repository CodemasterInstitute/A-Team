<?php require APPROOT . '/views/inc/header.php'; ?>
<?php include APPROOT . '/views/inc/memdash.php'; ?>

    <div class="col-9">
    <?php if (isset($_GET['type']) && $_GET['type'] == 'create'): ?>

        <h3>Create Event</h3>
        <form class="form-group">
            <label>Event Name</label>
            <input class="form-control" type="text" name="event_name" />
            <label>Event Category</label>
            <select class="form-control" name="category_id">
                <option></option>
                <option></option>
            </select>
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']->user_id; ?>" />
            <label>Start Date</label>
            <input class="form-control" type="text" name="start_date_year" placeholder="Year" />
            <input class="form-control" type="text" name="start_date_month" placeholder="Month" />
            <input class="form-control" type="text" name="start_date_day" placeholder="Day" />
            <label>Start Time</label>
            <input class="form-control" type="text" name="start_time_hour" placeholder="Hour" />
            <input class="form-control" type="text" name="start_date_minute" placeholder="Minute" />
            <br/>
            <label>End Date</label>
            <input class="form-control" type="text" name="end_date_year" placeholder="Year" />
            <input class="form-control" type="text" name="end_date_month" placeholder="Month" />
            <input class="form-control" type="text" name="end_date_day" placeholder="Day" />
            <label>End Time</label>
            <input class="form-control" type="text" name="end_time_hour" placeholder="Hour" />
            <input class="form-control" type="text" name="end_date_minute" placeholder="Minute" />
            <br/>
            <label>Price Per Ticket</label>
            <input class="form-control" type="text" name="event_price" />
            <label>Total Tickets</label>
            <input class="form-control" type="text" name="tickets_available" />
            <label>Event Description</label>
            <textarea class="form-control" name="event_description">
            </textarea>
            <label>Event Image</label>
            <input class="form-control" type="file" name="event_image" />
            <label class="form-check-label">Featured</label>
            <input class="form-check-input" type="checkbox" name="is_featured" />
            <button class="dashbaord-form-button" type="submit">Create</button>
        </form>

    <?php elseif (isset($_GET['type']) && $_GET['type'] == 'delete'): ?>

        <h3>Delete Event</h3>
        <p> If you are sure you want to DELETE your event "EVENT NAME" please enter your password below and select 'Delete'.</p>
                    <form class="members-form" method="post" action="members/events.php">
                        <input class="members-form-input" type="text" name="delete-check" />
                        <button class="members-form-button" type="submit">Delete</button>
                    </form>
                
        <?php else: ?>

        <h3>Your Events</h3>
        <a href="events?type=create" class="members-link">Create New Event</a>
        <hr/>
            <div class="row">
                <div class="col-9">
                    <p>Placeholder Event Name and Details</p>
                </div>
                <div class="col-3 text-right">
                    <a href="members/events.php?type=edit" class="members-link">Edit</a>
                    <a href="members/events.php?type=delete" class="members-link">Delete</a>
                </div>
                <hr />
            </div>
            <div class="row">
                <div class="col-9">
                    <p>Placeholder Event Name and Details</p>
                </div>
                <div class="col-3 text-right">
                    <a href="members/events.php?type=edit" class="members-link">Edit</a>
                    <a href="members/events.php?type=delete" class="members-link">Delete</a>
                </div>
                <hr />
            </div>
            <div class="row">
                <div class="col-9">
                    <p>Placeholder Event Name and Details</p>
                </div>
                <div class="col-3 text-right">
                    <a href="members/events.php?type=edit" class="members-link">Edit</a>
                    <a href="members/events.php?type=delete" class="members-link">Delete</a>
                </div>
                <hr />
            </div>

        <?php endif; ?>

        </div>
        <div class="col-0 col-md-1 col-lg-2 aside-right">

        </div>
    </div>
</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
