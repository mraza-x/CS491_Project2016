<?php
  session_start();
  
  $userInput = $_POST['userInput'];
  $gameId = $_POST['gameId'];
  $get = $_POST['get'];
?>

<html>
  <head>
    <h3>The image has been processed.</h3>
    <h3>Game session: <?php echo $gameId; ?></h3>
    <script src="resemble/resemble.js"></script>
    <script src='processing.js'></script>
    <script type='application/processing' data-processing-target='refCanvas'>
      <?php echo $userInput; ?>
    </script>
    <canvas id='refCanvas'> </canvas>
      
    <script>
      
      var canvasData; 
      var get = <?php echo $get; ?>;
      var gameId = <?php echo "\"".$gameId."\""; ?>;
    
      var canvas = document.getElementById('refCanvas');
        
      onload = function(){
        canvasData = canvas.toDataURL();
        //console.log(canvasData);
        
        var processImage_http = new XMLHttpRequest();
        var url = "database.php";
        var params = "gameId=" + gameId + "&pictureURI=" + encodeURIComponent(canvasData) + "&get=" + get;

        processImage_http.open("POST", url, true);
        processImage_http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        processImage_http.onreadystatechange = function(){
          if(processImage_http.readyState == 4 && processImage_http.status == 200){
            //alert(processImage_http.responseText);
          }
        }
        
        processImage_http.send(params);
        
        if(get == 3){
          var form = document.getElementById('playerResults');
          
          var image1 = canvasData;
          <?php echo "var image2 = " . "\"" . $_POST['pictureURI'] . "\""; ?>;
          
          var image, percentage;
        
          resemble(image1).compareTo(image2).onComplete(function(data){
            image = data.getImageDataUrl();
            percentage = data.misMatchPercentage;
          
	          return data;
                 
          });
          
          console.log(image);
          console.log(percentage);
          
          document.getElementById('diffValue').value = percentage;
          document.getElementById('diffImage').value = image;
          document.getElementById('masterImage').value = image2;
          document.getElementById('userImage').value = image1;
          
          form.submit();
        }
      }
    </script>
  </head>
  <body>
    <form method='post' action='playerResults.php' id='playerResults'>
      <input type='text' name='diffValue' id='diffValue' hidden>
      <input type='text' name='masterImage' id='masterImage' hidden>
      <input type='text' name='userImage' id='userImage' hidden>
      <input type='text' name='diffImage' id='diffImage' hidden>
    </form>
  </body>
</html>