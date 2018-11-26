<?php
$orderid = filter_input(INPUT_POST, 'orderid', FILTER_VALIDATE_INT);
$saleid = filter_input(INPUT_POST, 'saleid', FILTER_VALIDATE_INT);
$gameid = filter_input(INPUT_POST, 'gameid', FILTER_VALIDATE_INT);
$purchasePrice = filter_input(INPUT_POST, 'purchasePrice', FILTER_VALIDATE_FLOAT);
$orderDate = filter_input(INPUT_POST, 'orderDate');

// Validate inputs
if ($purchasePrice == null ||$gameid == false ||  empty($saleid) || empty($gameid) || empty($orderDate)) {
    $error = "Invalid order data. Check all fields and try again.";
    include('error.php');
} 

else {
    require_once('database.php');

    $query = "INSERT INTO orders
                 (orderid, saleid, gameid, purchasePrice, orderDate)
              VALUES
                 (:orderid, :saleid, :gameid, :purchasePrice, :orderDate)";
    $statement = $db->prepare($query);
    $statement->bindValue(':orderid', $orderid);
    $statement->bindValue(':saleid', $saleid);
    $statement->bindValue(':gameid', $gameid);
    $statement->bindValue(':purchasePrice', $purchasePrice);
    $statement->bindValue(':orderDate', $orderDate);
    $statement->execute();
    $statement->closeCursor();

    // Display the Order home page
    include('orderHome.php');
}
?>