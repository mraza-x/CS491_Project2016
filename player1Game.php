<?php
  session_start();
  
  $_SESSION['gameId'] = $_POST['gameId'];
  
  $pictureURI = $_POST['pictureURI'];
  $userCode = $_POST['userCode'];
?>

<html>
  <head>
    <meta charset="utf-8">
    <h1>Player 1 Screen</h1>
    
    <p>This is the master image.</p>
    <?php echo "<img src='".$pictureURI."'>"; ?>
    
    <script src='processing.js'></script>
    <script type='application/processing' data-processing-target='refCanvas'>
      <?php echo $userCode; ?>
    </script>
    
    <script>
      function formSubmit(){
        var form = document.getElementById('processPlayer1');
        var textArea = document.getElementById('pictureURI');
        textArea.value = document.getElementById('textArea').value;
        
        form.submit();
      }
    </script>
    
    <canvas id='refCanvas'> </canvas>
  </head>
  <body>
    <form action='player1Game.php' method='post' id='player1Game.php'>
      <p>The player writes code to this box.</p>
      <textarea rows='20' cols='50' name='userCode' id='textArea'><?php echo $userCode; ?></textarea>
      <input type='text' name='pictureURI' <?php echo "value='".$pictureURI."'"; ?> hidden>
      <p>This button is to redraw image.</p>
      <input type='submit' value='Redraw'>
    </form>
    <form method='post' action='processImage.php' id='processPlayer1'>
      <textarea rows='20' cols='50' name='userInput' id='pictureURI' hidden></textarea>
      <input type='text' name='pictureURI' <?php echo "value='".$pictureURI."'"; ?> hidden>
      <input type='checkbox' name='get' value=3 hidden checked>
      <p>This button submits final image.</p>
      <input type='button' value='Submit' onClick='formSubmit()'>
    </form>
  </body>
</html>