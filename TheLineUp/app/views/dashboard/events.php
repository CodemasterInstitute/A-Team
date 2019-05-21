<?php require APPROOT . '/views/inc/header.php'; ?>
<?php include APPROOT . '/views/inc/memdash.php'; ?>

    <div class="col-9">
    <?php if (isset($_GET['type']) && $_GET['type'] == 'create'): ?>

        <h3>Create Event</h3>
        <form class="form-group" method="post" action="events" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12">
                    <label>Event Name</label>
                    <input class="form-control" type="text" name="event_name" />
                </div>
            </div>
            <div class="row">
                <br />
            </div>
            <div class="row">
                <div class="col-6">
                    <label>Event Start</label>
                    <div class="row">
                        <div class="col-4">
                            <select class="form-control" name="start_date_day">
                                <option value="" disabled selected>Day</option>
                                <?php for($day = 1; $day < 32; $day++): ?>
                                    <option><?php echo $day; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-control" name="start_date_month">
                                <option value="" disabled selected>Month</option>
                                <?php for($month = 1; $month < 13; $month++): ?>
                                    <option><?php echo $month; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-control" name="start_date_year">
                                <option value="" disabled selected>Year</option>
                                <?php for($year = date('Y'); $year < date('Y')+10; $year++): ?>
                                    <option><?php echo $year; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <select class="form-control" name="start_time_hour">
                                <option value="" disabled selected>Hour</option>
                                <?php for($hour = 0; $hour < 24; $hour++): ?>
                                    <option><?php echo $hour; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-control" name="start_time_minute">
                                <option value="" disabled selected>Minute</option>
                                <?php for($minute = 0; $minute < 60; $minute++): ?>
                                    <option><?php echo $minute; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <label>Event End</label>
                    <div class="row">
                        <div class="col-4">
                            <select class="form-control" name="end_date_day">
                                <option value="" disabled selected>Day</option>
                                <?php for($day = 1; $day < 32; $day++): ?>
                                    <option><?php echo $day; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-control" name="end_date_month">
                                <option value="" disabled selected>Month</option>
                                <?php for($month = 1; $month < 13; $month++): ?>
                                    <option><?php echo $month; ?></option>
                                <?php endfor; ?>
                            </select>  
                        </div>
                        <div class="col-4">
                            <select class="form-control" name="end_date_year">
                                <option value="" disabled selected>Year</option>
                                <?php for($year = date('Y'); $year < date('Y')+10; $year++): ?>
                                    <option><?php echo $year; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <select class="form-control" name="end_time_hour">
                                <option value="" disabled selected>Hour</option>
                                <?php for($hour = 0; $hour < 24; $hour++): ?>
                                    <option><?php echo $hour; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-control" name="end_time_minute">
                                <option value="" disabled selected>Minute</option>
                                <?php for($minute = 0; $minute < 60; $minute++): ?>
                                    <option><?php echo $minute; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <br />
            </div>
            <div class="row">
                <div class="col-6">
                    <label>Price Per Ticket</label>
                    <input class="form-control" type="text" name="event_price" />
                </div>
                <div class="col-6">
                    <label>Total Tickets</label>
                    <input class="form-control" type="text" name="tickets_available" />
                </div>
            </div>
            <div class="row">
                <br />
            </div>
            <div class="row">
                <div class="col-12">
                    <label>Event Description</label>
                    <textarea rows="15" style="resize: none" class="form-control" name="event_description"></textarea>
                </div>
            </div>
            <div class="row">
                <br />
            </div>
            <div class="row">
                <div class="col-6">
                    <label>Event Category</label>
                    <select class="form-control" name="category_name">
                        <option value="" disabled selected>-</option>
                        <?php foreach($data['categories'] as $category): ?>
                            <option><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-6">
                    <label>Featured</label>
                    <select class="form-control" name="is_featured" >
                        <option default>No</option>
                        <option>Yes</option>
                    </select>
                </div>
            </div>
            <label>Event Image</label>
            <input class="form-control-file" type="file" name="event_image" />
            
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user']->user_id; ?>" />
            <input type="hidden" name="type" value="create" />
            <button class="dashboard-form-button" type="submit">Create</button>
        </form>

    <?php elseif (isset($_GET['type']) && $_GET['type'] == 'edit'): ?>

        <h3>Edit Event</h3>
        <form class="form-group" method="post" action="events">
            <div class="row">
                <div class="col-12">
                    <label>Event Name</label>
                    <input class="form-control" type="text" name="event_name" value="<?php echo $data['event']->event_name; ?>" />
                </div>
            </div>
            <div class="row">
                <br />
            </div>
            <div class="row">
                <div class="col-6">
                    <label>Event Start</label>
                    <div class="row">
                        <div class="col-4">
                            <select class="form-control" name="start_date_day">
                                <option value="" disabled selected>Day</option>
                                <?php for($day = 1; $day < 32; $day++): ?>
                                    <option><?php echo $day; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-control" name="start_date_month">
                                <option value="" disabled selected>Month</option>
                                <?php for($month = 1; $month < 13; $month++): ?>
                                    <option><?php echo $month; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-control" name="start_date_year">
                                <option value="" disabled selected>Year</option>
                                <?php for($year = date('Y'); $year < date('Y')+10; $year++): ?>
                                    <option><?php echo $year; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <select class="form-control" name="start_time_hour">
                                <option value="" disabled selected>Hour</option>
                                <?php for($hour = 0; $hour < 24; $hour++): ?>
                                    <option><?php echo $hour; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-control" name="start_time_minute">
                                <option value="" disabled selected>Minute</option>
                                <?php for($minute = 0; $minute < 60; $minute++): ?>
                                    <option><?php echo $minute; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <label>Event End</label>
                    <div class="row">
                        <div class="col-4">
                            <select class="form-control" name="end_date_day">
                                <option value="" disabled selected>Day</option>
                                <?php for($day = 1; $day < 32; $day++): ?>
                                    <option><?php echo $day; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-4">
                            <select class="form-control" name="end_date_month">
                                <option value="" disabled selected>Month</option>
                                <?php for($month = 1; $month < 13; $month++): ?>
                                    <option><?php echo $month; ?></option>
                                <?php endfor; ?>
                            </select>  
                        </div>
                        <div class="col-4">
                            <select class="form-control" name="end_date_year">
                                <option value="" disabled selected>Year</option>
                                <?php for($year = date('Y'); $year < date('Y')+10; $year++): ?>
                                    <option><?php echo $year; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <select class="form-control" name="end_time_hour">
                                <option value="" disabled selected>Hour</option>
                                <?php for($hour = 0; $hour < 24; $hour++): ?>
                                    <option><?php echo $hour; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <select class="form-control" name="end_time_minute">
                                <option value="" disabled selected>Minute</option>
                                <?php for($minute = 0; $minute < 60; $minute++): ?>
                                    <option><?php echo $minute; ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <br />
            </div>
            <div class="row">
                <div class="col-6">
                    <label>Price Per Ticket</label>
                    <input class="form-control" type="text" name="event_price"  value="<?php echo $data['event']->event_price; ?>"/>
                </div>
                <div class="col-6">
                    <label>Total Tickets</label>
                    <input class="form-control" type="text" name="tickets_available" value="<?php echo $data['event']->tickets_available; ?>" />
                </div>
            </div>
            <div class="row">
                <br />
            </div>
            <div class="row">
                <div class="col-12">
                    <label>Event Description</label>
                    <textarea rows="15" style="resize: none" class="form-control" name="event_description"><?php echo $data['event']->event_description; ?></textarea>
                </div>
            </div>
            <div class="row">
                <br />
            </div>
            <div class="row">
                <div class="col-6">
                    <label>Event Category</label>
                    <select class="form-control" name="category_name">
                        <option value="" disabled>-</option>
                        <?php foreach($data['categories'] as $category): ?>
                            <option><?php echo $category->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-6">
                    <label>Featured</label>
                    <select class="form-control" name="is_featured" >
                        <option default>No</option>
                        <option>Yes</option>
                    </select>
                </div>
            </div>
            <input type="hidden" name="type" value="edit" />
            <button class="dashboard-form-button" type="submit">Update</button>

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
            <?php foreach($data['user_events'] as $event): ?>
                <div class="row">
                    <div class="col-9">
                        <p><?php echo $event->event_name; ?></p>
                    </div>
                    <div class="col-3 text-right">
                        <a href="events?type=edit&event_id=<?php echo $event->event_id; ?>" class="members-link">Edit</a>
                        <a href="events?type=delete&event_id=<?php echo $event->event_id; ?>" class="members-link">Delete</a>
                    </div>
                    <hr />
                </div>
            <?php endforeach; ?>

        <?php endif; ?>

        </div>
        <div class="col-0 col-md-1 col-lg-2 aside-right">

        </div>
    </div>
</div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
