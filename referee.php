<?php
  $userInput = $_POST['userInput'];
  
  $servername = "sql.njit.edu";
  $username = "edm8";
  $password = "p1Z0TgN10";
  $db = "edm8";
  $gameId = $_POST['gameId'];
  $pictureURI = $_POST['picture'];
  
  /*void setup() {
      size(300, 300);
      background(100);
      stroke(255);
      ellipse(50, 50, 25, 25);
      println('hello web!');
    }*/
    
  /*void setup() {
      size(300, 300);
      background(100);
      stroke(255);
      fill(143,100,49);
      ellipse(60, 90, 40, 40);
      rect(70, 80, 50, 50);
    }*/
?>
    
<html>
  <head>
    <link rel='stylesheet' href='style.css'>
    <h1>Create New Game</h1>
    <script src='processing.js'></script>
    <script type='application/processing' data-processing-target='refCanvas'>
      <?php echo $userInput; ?>
    </script>
    <canvas id='refCanvas'> </canvas>
      
    <script>
      
      var canvasData, gameId, code;
        
      var canvas = document.getElementById('refCanvas');
        
      onload = function(){
        canvasData = canvas.toDataURL();
        //alert("CANVAS: " + canvasData);
        
        var pictureNode = document.createElement('INPUT');
        pictureNode.setAttribute("id", "picture");
        pictureNode.setAttribute("name", "picture");
        pictureNode.setAttribute("value", encodeURI(canvasData));
        pictureNode.setAttribute("type", "checkbox");
        pictureNode.setAttribute("checked", true);
        pictureNode.setAttribute("hidden", true);
        
        var parentNode = document.getElementById('textArea');
        parentNode.appendChild(pictureNode);
      }
      
      function submitForm(){
      
        var form = document.getElementById('refForm');
        
        var http = new XMLHttpRequest();
        var url = "processImage.php";
        var params = "userInput=" + code;
        http.open("POST", url, true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        http.onreadystatechange = function(){
          if(http.readyState == 4 && http.status == 200){
            console.log(http.responseText);
            //alert(http.responseText);
          }
        }
        
        http.send(params);
                
        form.submit();
        
      }
      
      function gameIdInput(value){
        gameId = value;
      }
      
      function codeInput(value){
        code = value;
      }
      
      function redrawSubmit(){
        document.getElementById('redrawInput').value = document.getElementById('textArea').value;
        
        document.getElementById('refRedraw').submit();
        
      }
    </script>
  </head>
  <body>
    <div class='reference'>
      <p>Reference:</p>
      <p>setup()</p>
      <p>draw()</p>
      <p>line(x1, y1, x2, y2)</p>
      <p>line(x1, y1, z1, x2, y2, z2)</p>
      <p>ellipse(x, y, width, height)</p>
      <p>rect(x, y, width, height)</p>
      <p>triangle(x1, y1, x2, y2, x3, y3)</p>
      <p>quad(x1, y1, x2, y2, x3, y3, x4, y4)</p>
      <p>rect(x,y,side1,side2)</p>
      <p>arc(x, y, width, height, start, stop)</p>
    </div>
    <div class='refereeUI'>
      <form action='processImage.php' method='post' id='refForm'>
        <p>Write code here to create the master image</p>
        <textarea rows='20' cols='50' name='userInput' id='textArea' required><?php echo $userInput; ?></textarea>
        <p>This button redraws the image. </p>
        <input type='button' value='Redraw' onclick='redrawSubmit()'>
        <p>How many players?</p>
        <input type='text' name='playerCount' id='playerCount' required>
        <p>Name the game sesssion and submit.</p>
        <input type='text' name='gameId' id='gameId' required>
        <input type='checkbox' name='get' value=1 hidden checked>
        <input type='submit' value='Submit'>
      </form>
      <form method='post' action='referee.php' id='refRedraw'>
        <textarea rows='20' cols='50' name='userInput' id='redrawInput' hidden></textarea>
      </form> 
      
      <pre>
      
      
      
      
      
      
      
      
      
      
      
      
        Checkered board:
          void setup() {
          size(300, 300);
          background(100);
          stroke(255);
  
          fill(255);
          rect(20,20,50,50);
          fill(0);
          rect(72,20,50,50);
          fill(255);
          rect(123,20,50,50);
          fill(0);
          rect(174,20,50,50);
          fill(255);
          rect(225,20,50,50);
  
          fill(0);
          rect(20,71,50,50);
          fill(255);
          rect(72,71,50,50);
          fill(0);
          rect(123,71,50,50);
          fill(255);
          rect(174,71,50,50);
          fill(0);
          rect(225,71,50,50);
  
          fill(255);
          rect(20,122,50,50);
          fill(0);
          rect(72,122,50,50);
          fill(255);
          rect(123,122,50,50);
          fill(0);
          rect(174,122,50,50);
          fill(255);
          rect(225,122,50,50);
  
          fill(0);
          rect(20,173,50,50);
          fill(255);
          rect(72,173,50,50);
          fill(0);
          rect(123,173,50,50);
          fill(255);
          rect(174,173,50,50);
          fill(0);
          rect(225,173,50,50);
  
          fill(255);
          rect(20,224,50,50);
          fill(0);
          rect(72,224,50,50);
          fill(255);
          rect(123,224,50,50);
          fill(0);
          rect(174,224,50,50);
          fill(255);
          rect(225,224,50,50);
        }
      </pre>
    </div>
  </body>
</html>