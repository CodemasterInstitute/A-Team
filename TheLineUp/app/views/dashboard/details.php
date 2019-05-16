<?php require APPROOT . '/views/inc/header.php'; ?>
<?php include APPROOT . '/views/inc/memdash.php'; ?>
                
                
                <div class="col-9">
                

                <?php if (isset($_GET['type']) && $_GET['type'] == 'edit'): ?>

                    <!-- If type = edit display this -->
                    <!-- Add form with all palceholders filled -->
                    <h3>Edit Account Details</h3>
                    <form class="dashboard-form" method="post" action="details">
                        <label>First Name</label>
                        <input class="dashboard-form-input" type="text" name="first_name" value="<?php echo $data['user']->first_name; ?>" />
                        <label>Last Name</label>
                        <input class="dashboard-form-input" type="text" name="last_name" value="<?php echo $data['user']->last_name; ?>" />
                        <label>Email</label>
                        <input class="dashboard-form-input" type="text" name="email" value="<?php echo $data['user']->email; ?>" />
                        <label>Phone Number</label>
                        <input class="dashboard-form-input" type="text" name="phone_number" value="<?php echo $data['user']->phone_number; ?>" />
                        <input type="hidden" name="type" value="edit" />
                        <button class="dashboard-form-button" type="submit">Update</button>
                    </form>

                <?php elseif (isset($_GET['type']) && $_GET['type'] == 'delete'): ?>

                    <!-- else if type = delete display this 
                                create form that allows deleting user-->

                    <h3>Delete Your Account</h3>
                    <p> If you are sure you want to DELETE your account please enter write 'DELETE' below and select 'Submit'.</p>
                    <?php if ($data['errors']) {
                        echo '<p>' . $data['errors']->errors . '</p>';
                    } ?>
                    <form class="dashboard-form" method="post" action="details">
                        <input class="dashboard-form-input" type="text" name="delete-check" />
                        <input type="hidden" name="type" value="delete" />
                        <button class="dashboard-form-button" type="submit">Submit</button>
                    </form>
                
                <?php elseif (isset($_GET['type']) && $_GET['type'] == 'password'): ?>
                    
                    <h3>Update Your Password</h3>
                    <form class="dashboard-form" method="post" action="details">
                        <label>New Password: </label>
                        <input class="dashboard-form-input" type="text" name="new-password" />
                        <label>Confirm New Password: </label>
                        <input class="dashboard-form-input" type="text" name="new-password-confirm" />
                        <label>Current Password: </label>
                        <input class="dashboard-form-input" type="text" name="password" />
                        <input type="hidden" name="type" value="password" />
                        <button class="dashboard-form-button" type="submit">Reset Password</button>
                    </form>

                <?php else: ?>

                    <!-- else display normal type -->

                    <h3>Your Account Details</h3>

                    <p>First Name: <?php echo $data['user']->first_name; ?></p>
                    <p>Last Name: <?php echo $data['user']->last_name; ?></p>
                    <p>Email: <?php echo $data['user']->email; ?></p>
                    <p>Phone Number: <?php echo $data['user']->phone_number; ?></p>

                    <div class="row dashboard-link-container">
                        <div class="col-12">
                        <a class="dashboard-link" href="details?type=edit">Update Details</a>
                        <a class="dashboard-link" href="details?type=password">Change Password</a>
                        <a class="dashboard-link" href="details?type=delete">Delete Account</a>
                    </div>
                    </div>
                    



                <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-0 col-md-1 col-lg-2 aside-right">

        </div>
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>