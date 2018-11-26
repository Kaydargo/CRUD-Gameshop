<?php
include("loginServ.php");
include 'includes/header.php';
?>
 
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
<link rel="icon" type="image/png" href="images/controller.png">
<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>

</head>
<body>
    <?php include 'includes/header.php'; ?>
<div class="login">
<h1 align="center">Login</h1>
<form action="" method="post" style="text-align:center;">
<input type="text" placeholder="Username" id="name" name="name"><br/><br/>
<input type="password" placeholder="Password" id="password" name="password"><br/><br/>
<input type="submit" value="Login" name="submit">
</div>
    <br><br><br><br>
<!-- Error Message -->
<span><?php echo $error; ?></span>

</body>
<?php include 'includes/footer.php'; ?>
</html>