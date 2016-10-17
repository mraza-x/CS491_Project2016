<?php
  $userInput = $_POST['userInput'];
  $gameId = $_POST['gameId'];
  $playerCount = $_POST['playerCount'];
?>

<html>
  <head>
    <script src="resemble/resemble.js"></script>
    <script src='processing.js'></script>
    <script type='application/processing' data-processing-target='refCanvas'>
      <?php echo $userInput; ?>
    </script>
    <canvas id='refCanvas'> </canvas>
    
    <h3>The image has been processed.</h3>
    <h3>Game session: <?php echo $gameId; ?></h3>
    <h3>Number of players: <?php echo $playerCount; ?></h3>
  </head>
  <body>
  </body>
</html>