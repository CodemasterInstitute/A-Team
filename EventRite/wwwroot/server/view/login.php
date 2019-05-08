<?php

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/post.php";

   ?> 

   <div class="container">
   <div id="logreg-forms">
   <form class="form-signin">
       <h1 class="h3 mb-3 font-weight-normal" style="text-align: center"> Sign in</h1>
       <div class="social-login">
           <button class="btn facebook-btn social-btn" type="button"><span><i class="fab fa-facebook-f"></i> Sign in with Facebook</span> </button>
           <button class="btn google-btn social-btn" type="button"><span><i class="fab fa-google-plus-g"></i> Sign in with Google+</span> </button>
       </div>
       <p style="text-align:center"> OR  </p>
       <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
       <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
       
       <button class="btn btn-success btn-block" type="submit"> Sign in</button>
       <a href="#" id="forgot_pswd">Forgot password?</a>
       <hr>
       

       <button class="btn btn-newacct btn-block" type="button" id="btn-signup"> <a href="createaccount.php">Create Account</a></button>
    
       </form>

       <br>
       
</div>
</div>

<?php

    // Include Basic Templates for <footer>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php";

?>

