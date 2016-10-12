<?php 
  $masterImage = $_POST['masterImage'];
  $userImage = $_POST['userImage'];
  $diffImage = $_POST['diffImage'];
  $diffValue = $_POST['diffValue'];
?>

<html>
  <div>
    <p>This is the master image.</p>
    <?php echo "<img src=" . $masterImage . ">"; ?>
  </div>
  
  <div>
    <p>This is the player image.</p>
    <?php echo "<img src=" . $userImage . ">"; ?>
  </div>
  
  <div>
    <p>This is the difference image</p>
    <?php echo "<img src=" . $diffImage . ">"; ?>
  </div>
    
  <div>
    <?php echo "<p><b>Your image was " . $diffValue . " different than the master image</b></p>"; ?>
  </div>
</html>