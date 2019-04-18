<?php
    // Include Database Login Credentials
    include "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php"; 

    
?>

<!---Contact form-->
<div>
<div class="container">
	<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
            <h4 class="text-center pt-2 mt-2">Contact us!</h4>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name"><b>Name</b></label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Full Name" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email"><b>Your E-mail</b></label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message"><b>Your message</b></label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-lg" style="background-color:#75DBCD">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
	</div>
</div>
</div>
<!----contact form ends here---->
<?php

   // Inculde Basic Template for <footer>
   include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php";

   ?>