<?php

$gameid = filter_input(INPUT_POST, 'gameid', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$purchasePrice = filter_input(INPUT_POST, 'purchasePrice');
$salePrice = filter_input(INPUT_POST, 'salePrice', FILTER_VALIDATE_FLOAT);
$profit = filter_input(INPUT_POST, 'profit', FILTER_VALIDATE_FLOAT);

// Validate inputs
if ($gameid == NULL || $gameid == FALSE || empty($name) || empty($purchasePrice) || $salePrice == NULL || $salePrice == FALSE ) {
    $error = "Invalid game data. Check all fields and try again.";
    include('error.php');
}
else {
    // If valid, update the product in the database
    require_once('database.php');
    $query = 'UPDATE game
              SET 
                  name = :name,
                  purchasePrice = :purchasePrice,
                  salePrice = :salePrice,
                  profit = :profit
               WHERE gameid = :gameid';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':purchasePrice', $purchasePrice);
    $statement->bindValue(':salePrice', $salePrice);
    $statement->bindValue(':profit', $profit);
    $statement->bindValue(':gameid', $gameid);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('profit.php');
}
?>