<html>
<?php

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/post.php";

  
    ?>
$fName = $lName = $email = $password =  "";
if(isset($_POST["fName"])){
$fName=test_input($_POST["fName"])
} else{
    $fName = "";
}

if(isset($_POST["lName"])){
$lName=test_input($_POST["lName"])
} else{
    $lName = "";
}

if(isset($_POST["email"])){
$email=test_input($_POST["email"])
} else{
    $email = "";
}

if(isset($_POST["password"])){
$password = test_input($_POST["password"])
} else{
    $password = "";
}



   ' <div id="logreg-forms" class="new-account">
   <form class="form-signin">
       <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Create Account</h1>
       

       <div class="form-row">
           <div class="col-md-6">
             <input type="text" name ="fName" class="form-control" placeholder="First name">
           </div>
           <div class="col-md-6">
             <input type="text" name ="lName" class="form-control" placeholder="Last name">
           </div>
         </div>
        
       <input type="email" name= "email"id="inputEmail" class="form-control" placeholder="Email address" required=""
           autofocus="">
</div>
       <div>
       <input type="password" name ="password" id="inputPassword" class="form-control" placeholder="Password" required="">
  
       
       <p class="text-center"> Your password must be at least 8 characters</p>
       <button class="btn btn-success btn-block" type="submit"><i class="fas fa-sign-in-alt"></i> Create Account</button>
       <hr>
       

       
   </form>

   

   <form action="/signup/" class="form-signup">
       <div class="social-login">
           <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign
                   up with Facebook</span> </button>
       </div>
       <div class="social-login">
           <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign
                   up with Google+</span> </button>
       </div>

       <p style="text-align:center">OR</p>

       <input type="text" id="user-name" class="form-control" placeholder="Full name" required="" autofocus="">
       <input type="email" id="user-email" class="form-control" placeholder="Email address" required autofocus="">
       <input type="password" id="user-pass" class="form-control" placeholder="Password" required autofocus="">
       <input type="password" id="user-repeatpass" class="form-control" placeholder="Repeat Password" required
           autofocus="">

       <button class="btn btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> Sign Up</button>
       <a href="#" id="cancel_signup"><i class="fas fa-angle-left"></i> Back</a>
   </form>
   <br>

</div>
   

<?php
    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php";

?>
</html>
