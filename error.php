 <?php include 'includes/headerAdmin.php';?>
<html>
    <head>
        <title>Error!</title>
        <link rel="icon" type="image/png" href="images/controller.png">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
 <div class="container">
<!--Page Heading -->
        <h1 class="mt-4 mb-3">Error page</h1>
        <div class="row"><br>

            <!-- Post Content Column -->
            <div class="col-lg-8">

        <h2 class="top">We have a problem</h2>
        <p><?php echo $error; ?></p>
              
            </div>
      
</div><!-- End row -->

 </div>      <br><br><br><br><br><br><br><br> <br> <br><br><br><br><br>     

<?php
include 'includes/footer.php';
?>
    </body>
</html>
         