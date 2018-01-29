<?php

// Connect to a database
$conn = mysqli_connect('localhost', 'root', '', 'log');

// Check for POST variable
if(isset($_POST['message'])){
    $name = mysqli_real_escape_string($conn, $_POST['message']);
    
    $date = date('YYYY-MM-DD HH:MM:SS', time());

    $query = "INSERT INTO log(message,time) VALUES('$name',now())";
  
    if(mysqli_query($conn, $query)){
      echo 'User Added...';
    } else {
      echo 'ERROR: '. mysqli_error($conn);
    }
  }

if(isset($_POST['load'])){
    $query = "SELECT * FROM log";
    $result=mysqli_query($conn, $query);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($users);
}