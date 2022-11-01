<?php


$servername='localhost';
    $username='root';
    $password="";
    $dbname = "mydb1";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
      if(!$conn){
          echo 'Could not Connect MySql Server:';
        }


?>