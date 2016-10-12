<?php 
  $servername = "sql.njit.edu";
  $username = "edm8";
  $password = "p1Z0TgN10";
  $db = "edm8";
  $gameId = $_POST['gameId'];
  $pictureURI = $_POST['pictureURI'];
  $get = $_POST['get'];
  
  //echo $gameId . " and " . $pictureURI;
  //echo $gameId . " and " . $get;
  
  //creates connection to mysql
  $conn = new mysqli($servername, $username, $password, $db);

  //checks connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  /***** Inserts referee's image. *****/
  if($get == 1){
    $sql = "INSERT INTO game VALUES('".$gameId."','".$pictureURI."')";
    $result = $conn->query($sql);
  }
  /***** Retrieves referee image. *****/
  else if($get == 2){
    $sql = "SELECT pictureURI
            FROM game
            WHERE gameId='".$gameId."'";
            
    $result = $conn->query($sql);        
            
    if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {
        $dataURI["pictureURI"] = $row["pictureURI"];
      }
    }
    
    echo $dataURI["pictureURI"];
  }
  /***** Inserts player 1's image. *****/
  else if($get == 3){
    $sql = "INSERT INTO player1 VALUES('".$pictureURI."')";
    $result = $conn->query($sql);
    echo $sql;
  }
  

  $conn->close();
?>