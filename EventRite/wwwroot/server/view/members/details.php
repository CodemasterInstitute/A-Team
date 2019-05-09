<?php

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php";

?>
    
    <div class="row">
        <div class="col-0 col-md-1 col-lg-2 aside-left">

        
    
    

    </div>
        <div class="col-12 col-md-10 col-lg-8 middle">
            <div class="row">
                <div class="col-12">
                    <h3>Details</h3>
                </div>
                <div class="col-3">
                
                <?php include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/memdash.php"; ?>
                
                </div>
                <div class="col-9">

                <?php $userID = $_SESSION['user_id']; ?>

                <?php if (isset($_GET['type']) && $_GET['type'] = 'edit') : ?>

                    <!-- If type = edit display this -->
                    <!-- Add form with all palceholders filled -->

                <?php elseif (isset($_GET['type']) && $_GET['type'] = 'delete') : ?>

                    <!-- else if type = delete display this 
                                create form that allows deleting user-->

                <?php else : ?>

                    <!-- else display normal type -->

                

                    <h5>First Name: </h5>
                    <h5>Last Name</h5>
                    <h5>Email</h5>
                    <h5>Address</h5>
                    <button>Update Details</button>
                    <button>Change Password</button>
                    <form action="details.php" method="get" >
                    <button type="submit" name="type" value="edit"></button>

                    </form>


                <?php endif; ?>
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