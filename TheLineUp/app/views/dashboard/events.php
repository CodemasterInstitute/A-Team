<?php require APPROOT . '/views/inc/header.php'; ?>
<?php include APPROOT . '/views/inc/memdash.php'; ?>

    <div class="col-9">
    <?php if (isset($_GET['type']) && $_GET['type'] == 'edit'): ?>



    <?php elseif (isset($_GET['type']) && $_GET['type'] == 'delete'): ?>

        <h3>Delete Event</h3>
        <p> If you are sure you want to DELETE your event "EVENT NAME" please enter your password below and select 'Delete'.</p>
                    <form class="members-form" method="post" action="members/events.php">
                        <input class="members-form-input" type="text" name="delete-check" />
                        <button class="members-form-button" type="submit">Delete</button>
                    </form>
                
        <?php else: ?>

        <h3>Your Events</h3>
        <a class="members-link">Create New Event</a>
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
