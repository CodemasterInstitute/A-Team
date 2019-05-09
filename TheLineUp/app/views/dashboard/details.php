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
                        <label>Password</label>
                        <input class="dashboard-form-input" type="text" name="password" value="<?php echo $data['user']->password; ?>" />
                        <label>Phone Number</label>
                        <input class="dashboard-form-input" type="text" name="phone_number" value="<?php echo $data['user']->phone_number; ?>" />
                        <button class="dashboard-form-button" type="submit">Update</button>
                    </form>

                <?php elseif (isset($_GET['type']) && $_GET['type'] == 'delete'): ?>

                    <!-- else if type = delete display this 
                                create form that allows deleting user-->

                    <h3>Delete Your Account</h3>
                    <p> If you are sure you want to DELETE your account please enter your password below and select 'Delete'.</p>
                    <form class="dashboard-form" method="post" action="dashboard/details.php">
                        <input class="dashboard-form-input" type="text" name="delete-check" />
                        <button class="dashboard-form-button" type="submit">Delete</button>
                    </form>


                <?php else: ?>

                    <!-- else display normal type -->

                    <h3>Your Account Details</h3>

                    <p>First Name: <?php echo $data['user']->first_name; ?></p>
                    <p>Last Name: <?php echo $data['user']->last_name; ?></p>
                    <p>Email: <?php echo $data['user']->email; ?></p>
                    <p>Password: <?php echo $data['user']->password; ?></p>
                    <p>Phone Number: <?php echo $data['user']->phone_number; ?></p>

                    <div class="row dashboard-link-container">
                        <div class="col-12">
                        <a class="dashboard-link" href="details?type=edit">Edit</a>
                        <a class="dashboard-link" href="details?type=delete">Delete</a>
                    </div>
                    <pre>
                    <?php echo print_r($_SESSION['user']); ?>
                    </pre>
                    </div>
                    



                <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-0 col-md-1 col-lg-2 aside-right">

        </div>
    </div>


<?php require APPROOT . '/views/inc/footer.php'; ?>