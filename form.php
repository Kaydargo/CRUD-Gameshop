<?php
require_once 'database.php';

$name =$_POST['name'];
$email =$_POST['email'];
$message =$_POST['message'];

$sql="INSERT INTO form VALUES('$name','$email','$message')";
$information =fopen("form.txt", "a");
$info="Name: "."$name". "\t Email: "."$email". "\t Message: "."$message";
fwrite($information, $info);