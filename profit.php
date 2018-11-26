<?php
include_once 'includes/headerAdmin.php';
require('database.php');

$queryProducts = "SELECT * FROM game";
    $statement3 = $db->prepare($queryProducts);
    $statement3->execute();
    $games = $statement3->fetchAll();
    $statement3->closeCursor();
    
//$error_message="";
if (empty($_POST)){
    $error="Please fill in all fields correctly";
    $name="";
    $salePrice="";
    $purchasePrice="";
    exit();
}

$date=date('d.m.Y');


if (!is_numeric($salePrice) || !is_numeric($purchasePrice)){
//    $error_message="";
        if(!is_numeric($salePrice))
        {
            $error="The sale price entered is not a number";
        }
        if(!is_numeric($purchasePrice))
        {
          $error="The purchase percent entered is not a number";
        }
         include("error.php");
         exit();
}
//Calculate the discount and discounted price
$purchasePrice = filter_input(INPUT_POST, 'purchasePrice');
$salePrice = filter_input(INPUT_POST, 'salePrice', FILTER_VALIDATE_FLOAT);
$profit = $salePrice - $purchasePrice;


//Apply currency formatting to the dollar and percent amounts
$salePrice_f = number_format($salePrice,2);
$purchasePrice_f = number_format($purchasePrice,2);
$profit_f = number_format($profit,2);


?>

<!DOCTYPE html>
<html>
    <head>
        <title>Profit</title>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
        <link rel="icon" type="image/png" href="images/controller.png">
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <title></title>
    </head>
    <body><br>
        <p>Discount calculated on the <?php echo $date; ?></p>
         <div class="container">
<!--       htmlspecialchars converts special characters to html entities - stops javascript attacks-->
 <table class ="table table-responsive">
                <tr class="table-primary">
                    <th>Name</th>
                    <th>Purchase Price</th>
                    <th>Sale Price</th>
                    <th>Profit</th>
                </tr>
        <td><span><?php echo htmlspecialchars($name); ?></span><br></td>
        <td><span><?php echo htmlspecialchars ($salePrice_f); ?></span><br></td>
        <td><span><?php echo htmlspecialchars ($purchasePrice_f); ?></span><br></td>
        <td><span><?php echo htmlspecialchars ($profit_f); ?></span></td>
         
</table>
<form action="sale.php" method="post">
                <input type="submit" value="Manage Profit">
                        </form>
         </div>
        <?php include_once 'includes/footer.php';?>
    </body>
</html>
