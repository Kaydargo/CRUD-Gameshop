<?php
require('database.php');
include 'includes/headerAdmin.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
    <link rel="icon" type="image/png" href="images/controller.png">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<body>
    <br>
    <main>
        <div class="container">
<!--Page Heading -->
        <h1 class="mt-4 mb-3">Add Product</h1>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">
        <form action="add_order.php" method="post" id="add_order_form">
          <div class="form-group">
            
             <label>Order ID:</label>
             <input type="hidden" name="orderid" class="form-control" placeholder="Add order id">
            <br> 
              
            <label>Game Id:</label>
            <input type="input" name="gameid" class="form-control" placeholder="Add game code" >
            <br>
            
            <label>Sale Id:</label>
            <input type="input" name="saleid" class="form-control" placeholder="Add sale id" >
            <br>

            <label>Purchase Price:</label>
            <input type="input" name="purchasePrice" class="form-control" aria-describedby="addPurchasePrice" placeholder="Add purchase price">
            <br>
            
            
            <label>OrderDate:</label>
            <input type="input" name="orderDate" placeholder='Add order date' id="datepicker" class="form-control">
            <script>        
            $( function() {
               var date = $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val();
              $( "#datepicker" ).datepicker();
            } );
            </script><br>

            <label>&nbsp;</label>
            <br><button type="submit" value="Add Product" class="btn btn-primary">Submit</button>
            <br>
            </div>
        </form>
            
    </main>
</div>
                </div>

    <?php
include 'includes/footer.php';
?>
</body>
</html>