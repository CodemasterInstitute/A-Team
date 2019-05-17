<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <a href="index.php"> <img class="navbar-brand mr-auto" alt="logo" src="<?php echo URLROOT . '/img/redlogo.png' ?>" /> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
      <?php if(isset($_SESSION['user'])) : ?>
        <li class="nav-item active"><a class="nav-link" href="<?php echo URLROOT; ?>/pages/index">Events <span class="sr-only">(current)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/pages/contact">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/users/dasboards">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Log Out</a></li>
        

      <?php else: ?>
        <li class="nav-item active"><a class="nav-link" href="<?php echo URLROOT; ?>/pages/index">Events <span class="sr-only">(current)</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/pages/contact">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Log In</a></li>
      <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>