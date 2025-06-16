<?php
$conn= new mysqli("localhost","root","","loginsystem");
if($conn->connect_error){
  die("connection failed ".$conn->connect_error);
}




