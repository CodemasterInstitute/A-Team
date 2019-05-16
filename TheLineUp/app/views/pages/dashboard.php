<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
  <h1><?php echo $data['title']; ?></h1>
  <p>User :<?php var_dump($_SESSION['user']); ?></p>
<?php require APPROOT . '/views/inc/footer.php'; ?>
