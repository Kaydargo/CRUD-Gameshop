<?php
require_once('database.php');

// Get IDs
$orderid = filter_input(INPUT_POST, 'orderid', FILTER_VALIDATE_INT);

// Delete the product from the database

    $query = "DELETE FROM orders WHERE orderid = :orderid";
    $statement = $db->prepare($query);
    $statement->bindValue(':orderid', $orderid);
    $statement->execute();
    $statement->closeCursor();


// display the Product List page
include('orderHome.php');
?>
