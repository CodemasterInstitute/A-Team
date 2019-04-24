<?php
    // Include Database Login Credentials
    include "$_SERVER[DOCUMENT_ROOT]/../config/config.php"; 

    // Include Basic Templates for <head> and <header>
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/head.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/navigation.php"; 
    include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/post.php";

?>

<!-- Anchor cards to click down to the section you want info about -->

<div class="accordion" id="accordionExample">
  <div class="card contact">
    <div class="card-header">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Contact <i class="material-icons">
expand_more
</i> 
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores fugiat assumenda atque neque sapiente veritatis, possimus nobis ipsa molestiae eos natus beatae sint consectetur! Animi deleniti excepturi sed dicta itaque rerum possimus harum eaque quia, vero distinctio maiores sit nemo nam a sint voluptas. Inventore, nostrum. Nesciunt dolorem laboriosam tenetur, aliquid illo esse libero dignissimos ex blanditiis consequatur ipsa dolor nisi odio quod, at enim officiis quae eligendi necessitatibus? Maxime libero enim porro amet, alias eveniet tempora aspernatur aliquid perspiciatis eaque nostrum quaerat facilis molestias voluptatibus eligendi fugiat.</p>
        
    <!-- contact form -->
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="" method="post">
          <fieldset>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name"></label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Provide your full name" class="form-control">
              </div>
            </div>
    
            <!-- Email input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="email"></label>
              <div class="col-md-9">
                <input id="email" name="email" type="text" placeholder="Enter your email address" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message"></label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message" rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
<!----contact form ends here---->
      </div>
    </div>
  </div>

  <div class="card contact">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         Socials <i class="material-icons">
expand_more
</i>
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body" id="socials">
      <button type="button" class="btn btn-outline-light">#eventrite</button>
      <button type="button" class="btn btn-outline-light">#theritestuff</button>
      <button type="button" class="btn btn-outline-light"><i class="fab fa-facebook-f pr-1"></i> Facebook</button>
      <button type="button" class="btn btn-outline-light"><i class="fab fa-twitter pr-1"></i> Twitter</button>
      <button type="button" class="btn btn-outline-light"><i class="fab fa-instagram pr-1"></i> Instagram</button>
      </div>
    </div>
  </div>

  <div class="card contact">
    <div class="card-header">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Advertising <i class="material-icons">
expand_more
</i>
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>

  <div class="card contact">
    <div class="card-header">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          My Account <i class="material-icons">
expand_more
</i>
        </button>
      </h2>
    </div>
    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>

  <div class="card contact">
    <div class="card-header">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          FAQs <i class="material-icons">
expand_more
</i>
        </button>
      </h2>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">

      <p id="faqs">
  <a data-toggle="collapse" href="#collapseTickets" aria-expanded="false" aria-controls="collapseTickets">
    How do I book tickets? <i class="material-icons">
close
</i>
  </a>
</p>
<div class="collapse" id="collapseTickets">
  <div class="card card-body">
  Bacon ipsum dolor amet frankfurter jowl andouille burgdoggen, landjaeger prosciutto ground round boudin. Picanha leberkas strip steak shankle ham. Corned beef burgdoggen shankle kielbasa porchetta pork loin meatloaf. Tenderloin shankle tongue t-bone pig flank, leberkas short loin strip steak picanha ground round hamburger.
  </div>
</div>

<p id="faqs">
  <a data-toggle="collapse" href="#collapseCancel" aria-expanded="false" aria-controls="collapseCancel">
    How do I cancel an event? <i class="material-icons">
close
</i>
  </a>
</p>
<div class="collapse" id="collapseCancel">
  <div class="card card-body">
  Bacon ipsum dolor amet frankfurter jowl andouille burgdoggen, landjaeger prosciutto ground round boudin. Picanha leberkas strip steak shankle ham. Corned beef burgdoggen shankle kielbasa porchetta pork loin meatloaf. Tenderloin shankle tongue t-bone pig flank, leberkas short loin strip steak picanha ground round hamburger.
  </div>
</div>

<p id="faqs">
  <a data-toggle="collapse" href="#collapseRefund" aria-expanded="false" aria-controls="collapseRefund">
    Can I get a refund? <i class="material-icons">
close
</i>
  </a>
</p>
<div class="collapse" id="collapseRefund">
  <div class="card card-body">
  Bacon ipsum dolor amet frankfurter jowl andouille burgdoggen, landjaeger prosciutto ground round boudin. Picanha leberkas strip steak shankle ham. Corned beef burgdoggen shankle kielbasa porchetta pork loin meatloaf. Tenderloin shankle tongue t-bone pig flank, leberkas short loin strip steak picanha ground round hamburger.
  </div>
</div>

<p id="faqs">
  <a data-toggle="collapse" href="#collapseBacon" aria-expanded="false" aria-controls="collapseBacon">
    Do your venues sell bacon? <i class="material-icons">
close
</i>
  </a>
</p>
<div class="collapse" id="collapseBacon">
  <div class="card card-body">
  Bacon ipsum dolor amet frankfurter jowl andouille burgdoggen, landjaeger prosciutto ground round boudin. Picanha leberkas strip steak shankle ham. Corned beef burgdoggen shankle kielbasa porchetta pork loin meatloaf. Tenderloin shankle tongue t-bone pig flank, leberkas short loin strip steak picanha ground round hamburger.
  </div>
</div>

      </div>
    </div>
  </div>

  <div class="card contact">
    <div class="card-header">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          Legal Stuff <i class="material-icons">
expand_more
</i>
        </button>
      </h2>
    </div>
    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
      <div class="card-body">
      <h2>Terms and Conditions ("Terms")</h2>


<p>Last updated: April 23, 2019</p>


<p>Please read these Terms and Conditions ("Terms", "Terms and Conditions") carefully before using the ateam.com website (the "Service") operated by ateam.com ("us", "we", or "our").</p>

<p>Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.</p>

<p>By accessing or using the Service you agree to be bound by these Terms. If you disagree with any part of the terms then you may not access the Service. The Terms and Conditions agreement  for ateam.com has been created with the help of <a href="https://termsfeed.com/terms-conditions-generator/">TermsFeed Terms and Conditions Generator</a>.</p>


<h2>Accounts</h2>

<p>When you create an account with us, you must provide us information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.</p>

<p>You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password, whether your password is with our Service or a third-party service.</p>

<p>You agree not to disclose your password to any third party. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.</p>


<h2>Links To Other Web Sites</h2>

<p>Our Service may contain links to third-party web sites or services that are not owned or controlled by ateam.com.</p>

<p>ateam.com has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that ateam.com shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.</p>

<p>We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.</p>


<h2>Termination</h2>

<p>We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>

<p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>

<p>We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.</p>

<p>Upon termination, your right to use the Service will immediately cease. If you wish to terminate your account, you may simply discontinue using the Service.</p>

<p>All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.</p>


<h2>Governing Law</h2>

<p>These Terms shall be governed and construed in accordance with the laws of Western Australia, Australia, without regard to its conflict of law provisions.</p>

<p>Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.</p>


<h2>Changes</h2>

<p>We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 30 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.</p>

<p>By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.</p>


<h2>Contact Us</h2>

<p>If you have any questions about these Terms, please contact us.</p>
      </div>
    </div>
  </div>

</div>

<?php

   // Inculde Basic Template for <footer>
   include "$_SERVER[DOCUMENT_ROOT]/server/view-helper/footer.php";

   ?>