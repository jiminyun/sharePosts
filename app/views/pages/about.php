<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="jumbotron jumbotron-flud">
    <div class="container">
      <h1><?php echo $data['title']; ?></h1>
      <p class="lead"><?php echo $data['description'] ?></p>
      <p>Version :  <?php echo APPVERSION ; ?></p>
    </div>
  </div>
  
  
<?php require APPROOT . '/views/inc/footer.php'; ?>
