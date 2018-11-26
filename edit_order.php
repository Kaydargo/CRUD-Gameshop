<?php
// Get the product data
$orderid = filter_input(INPUT_POST, 'orderid', FILTER_VALIDATE_INT);
$saleid = filter_input(INPUT_POST, 'saleid', FILTER_VALIDATE_INT);
$gameid = filter_input(INPUT_POST, 'gameid', FILTER_VALIDATE_INT);
$purchasePrice = filter_input(INPUT_POST, 'purchasePrice');
$orderDate = filter_input(INPUT_POST, 'orderDate');

// Validate inputs
if ($orderid == NULL || $orderid == FALSE || $orderDate == NULL ||  empty($saleid || empty($purchasePrice) || empty($gameid) || empty($orderDate))) {
    $error = "Invalid order data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, update the product in the database
    require_once('database.php');
    $query = 'UPDATE orders
              SET
                  orderid = :orderid,
                  saleid = :saleid,
                  gameid = :gameid,
                  purchasePrice = :purchasePrice,
                  orderDate = :orderDate
               WHERE orderid= :orderid';
    $statement = $db->prepare($query);
    $statement->bindValue(':orderid', $orderid);
    $statement->bindValue(':saleid', $saleid);
    $statement->bindValue(':gameid', $gameid);
    $statement->bindValue(':purchasePrice', $purchasePrice);
    $statement->bindValue(':orderDate', $orderDate);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('orderHome.php');
}
?>