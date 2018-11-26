<?php
 require_once 'database.php';
$error=''; //Variable to Store error message;
if(isset($_POST['submit'])){
    
 if(empty($_POST['name']) || empty($_POST['password']))
     { 
 $error = "Username or Password is Invalid";
 }
 
 
 else
 {
 //Define $user and $pass
 $name=$_POST['name'];
 $password=$_POST['password'];
 
 //Establishing Connection with server by passing server_name, user_id and pass as a patameter

 $conn = mysqli_connect("localhost", "root", '');
 //Selecting Database
 $db = mysqli_select_db($conn, "gamestore");
 //sql query to fetch information of registerd user and finds user match.
 $query = mysqli_query($conn, "SELECT * FROM salesman WHERE  name='$name' AND password='$password' ");
 
 $rows = mysqli_num_rows($query);
 
 if($rows === 1){
     header("Location: admin.php");
die(); // Redirecting to other page
 }
 
 else
 {
 $error = "Username or Password is Invalid";
 }
 mysqli_close($conn); // Closing connection
 }
 
}
