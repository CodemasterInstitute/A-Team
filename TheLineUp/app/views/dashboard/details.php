<?php require APPROOT . '/views/inc/header.php'; ?>
                
                
                <div class="col-9">
                

                <?php if (isset($_GET['type']) && $_GET['type'] == 'edit'): ?>

                    <!-- If type = edit display this -->
                    <!-- Add form with all palceholders filled -->
                    <h3>Edit Account Details</h3>
                    <form class="members-form" method="post" action="members/details.php">
                        <label>First Name</label>
                        <input class="members-form-input" type="text" name="first_name" />
                        <label>Last Name</label>
                        <input class="members-form-input" type="text" name="last_name" />
                        <label>Email</label>
                        <input class="members-form-input" type="text" name="email" />
                        <label>Password</label>
                        <input class="members-form-input" type="text" name="password" />
                        <label>Phone Number</label>
                        <input class="members-form-input" type="text" name="phone_number" />
                        <button class="members-form-button" type="submit">Update</button>
                    </form>

                <?php elseif (isset($_GET['type']) && $_GET['type'] == 'delete'): ?>

                    <!-- else if type = delete display this 
                                create form that allows deleting user-->

                    <h3>Delete Your Account</h3>
                    <p> If you are sure you want to DELETE your account please enter your password below and select 'Delete'.</p>
                    <form class="members-form" method="post" action="members/details.php">
                        <input class="members-form-input" type="text" name="delete-check" />
                        <button class="members-form-button" type="submit">Delete</button>
                    </form>


                <?php else: ?>

                    <!-- else display normal type -->

                    <h3>Your Account Details</h3>

                    <p>First Name</p>
                    <p>Last Name</p>
                    <p>Email</p>
                    <p>Password</p>
                    <p>Phone Number</p>

                    <div class="row members-link-container">
                        <div class="col-12">
                        <a class="members-link" href="members/details.php?type=edit">Edit</a>
                        <a class="members-link" href="members/details.php?type=delete">Delete</a>
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