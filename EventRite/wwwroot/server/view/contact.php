<?php
    // Include Database Login Credentials
    include "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/post.php";

?>

<!-- Anchor cards to click down to the section you want info about -->
<div class="container">
<div class="row contact">
<div class="card contact" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Contact</h5>
    <p class="card-text">Maybe more text</p>
  </div>
</div>

<div class="card contact" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Socials</h5>
    <p class="card-text">Maybe more text</p>
  </div>
</div>

<div class="card contact" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Advertising</h5>
    <p class="card-text">Maybe more text</p>
  </div>
</div>

<div class="card contact" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">My Account</h5>
    <p class="card-text">Maybe more text</p>
  </div>
</div>

<div class="card contact" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">FAQs</h5>
    <p class="card-text">Maybe more text</p>
  </div>
</div>

<div class="card contact" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Legal Stuff</h5>
    <p class="card-text">Maybe more text</p>
  </div>
</div>

</div>
</div>

<hr>

<!-- Contact section -->
<div class="container">
	<div class="row">
<h2>Contact</h2>
    <!-- contact form -->
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name"><b>Name</b></label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Full Name" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email"><b>Email</b></label>
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
<!----contact form ends here---->
<hr>

<div class="container">
	<div class="row">
<h2>Socials</h2>
</div>
</div>

<hr>

<div class="container">
	<div class="row">
<h2>Advertising</h2>
</div>
</div>

<hr>

<div class="container">
	<div class="row">
<h2>My Account</h2>
</div>
</div>

<hr>

<div class="container">
	<div class="row">
<h2>FAQs</h2>
</div>
</div>

<hr>

<div class="container">
	<div class="row">
<h2>Legal Stuff</h2>
</div>
</div>

<?php

   // Inculde Basic Template for <footer>
   include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php";

   ?>