<?php
require('database.php');
include 'includes/headerAdmin.php';

$orderid = filter_input(INPUT_POST, 'orderid', FILTER_VALIDATE_INT);
$query = 'SELECT * FROM orders WHERE orderid = :orderid';
$statement = $db->prepare($query);
$statement->bindValue(':orderid', $orderid);
$statement->execute();
$order = $statement->fetch();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Orders</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
    <link rel="icon" type="image/png" href="images/controller.png">
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>

<!-- the body section -->
<body>
    <br>
    <main>
        <h1>Edit Order</h1>
        <form action="edit_order.php" method="post"
              id="edit_order_form">
            
            <input type="hidden" name="orderid"
                   value="<?php echo $order['orderid']; ?>">

            <label>Sale id:</label>
            <input type="input" name="saleid" class="form-control"
                   value="<?php echo $order['saleid']; ?>">
            <br>

            <label>Game id:</label>
            <input type="input" name="gameid" class="form-control"
                   value="<?php echo $order['gameid']; ?>">
            <br>
            
            <label>Purchase Price:</label>
            <input type="input" name="purchasePrice" class="form-control"
                   value="<?php echo $order['purchasePrice']; ?>">
            <br>
            
            <label>OrderDate:</label>
            <script>
               
            $( function() {
               var date = $('#datepicker').datepicker({ dateFormat: 'yy-mm-dd' }).val();
              $( "#datepicker" ).datepicker();
            } );
            </script>
            <input type="input" name="orderDate" id="datepicker" class="form-control"
                    value="<?php echo $order['orderDate'];?>">
            <br>
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
    </main>

</body>
        
<?php
include 'includes/footer.php';
?>
</html>