<?php

// connect to database
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "yikyak";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if(!$conn){
    echo 'Connection error:' . mysqli_connect_error();
  }
?>
