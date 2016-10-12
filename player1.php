<html>
  <head>
    <h1>Player 1 Screen</h1>
    <script>
      var gameId;
      
      function submitForm(){
      
        var form = document.getElementById('player1Form');
        var pictureId = document.getElementById('pictureURI');
        
        var http = new XMLHttpRequest();
        var url = "database.php";
        var params = "gameId=" + gameId + "&get=2";
        http.open("POST", url, true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
        http.onreadystatechange = function(){
          if(http.readyState == 4 && http.status == 200){
            //console.log(http.responseText);
            //alert(http.responseText);
            pictureURI.value = http.responseText;
            form.submit();
          }
        }
        
        http.send(params);
      }
      
      function gameIdInput(value){
        gameId = value;
      }
    </script>
  </head>
  <body>
    <form method='post' name='player1Form' action='player1Game.php' id='player1Form'>
      <div>Please Enter Game ID</div>
      <input type='text' name='gameId' oninput='gameIdInput(this.value)'>
      <input type='text' name='pictureURI' id='pictureURI' hidden>
      <input type='button' value='Submit' onClick='submitForm()'>
    </form>
  </body>
</html>