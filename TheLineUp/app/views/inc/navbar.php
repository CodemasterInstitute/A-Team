<nav class="main navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <a href="<?php echo URLROOT; ?>/"> <img class="navbar-brand mr-auto" alt="logo" src="<?php echo URLROOT . '/img/redlogo.png' ?>" /> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="main navbar-nav ml-auto">
      <?php if(isset($_SESSION['user'])) : ?>
        <li class="main nav-item active"><a class="main nav-link" href="<?php echo URLROOT; ?>/pages/index">Events <span class="sr-only">(current)</span></a></li>
        <li class="main nav-item"><a class="main nav-link" href="<?php echo URLROOT; ?>/pages/contact">Contact</a></li>
        <li class="main nav-item"><a class="main nav-link" href="<?php echo URLROOT; ?>/dashboards">Dashboard</a></li>
        <li class="main nav-item"><a class="main nav-link" href="<?php echo URLROOT; ?>/users/logout">Log Out</a></li>
        

      <?php else: ?>
        <li class="main nav-item active"><a class="main nav-link" href="<?php echo URLROOT; ?>/pages/index">Events <span class="sr-only">(current)</span></a></li>
        <li class="main nav-item"><a class="main nav-link" href="<?php echo URLROOT; ?>/pages/contact">Contact</a></li>
        <li class="main nav-item"><a class="main nav-link" href="<?php echo URLROOT; ?>/users/login">Log In</a></li>
      <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
<main>