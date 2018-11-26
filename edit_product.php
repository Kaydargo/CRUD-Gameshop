<?php
// Get the product data
$gameid = filter_input(INPUT_POST, 'gameid', FILTER_VALIDATE_INT);
$categoryid = filter_input(INPUT_POST, 'categoryid', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$purchasePrice = filter_input(INPUT_POST, 'purchasePrice');
$salePrice = filter_input(INPUT_POST, 'salePrice', FILTER_VALIDATE_FLOAT);
$picture = filter_input(INPUT_POST, 'picture');

// Validate inputs
if ($gameid == NULL || $gameid == FALSE || $categoryid == NULL || empty($name) || empty($purchasePrice) || 
        $salePrice == NULL || $salePrice == FALSE ) {
    $error = "Invalid game data. Check all fields and try again.";
    include('error.php');
} else {
    // If valid, update the product in the database
    require_once('database.php');
    $query = 'UPDATE game
              SET 
                  categoryid = :categoryid,
                  name = :name,
                  purchasePrice = :purchasePrice,
                  salePrice = :salePrice,
                  picture= :picture
               WHERE gameid = :gameid';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryid', $categoryid);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':purchasePrice', $purchasePrice);
    $statement->bindValue(':salePrice', $salePrice);
    $statement->bindValue(':picture', $picture);
    $statement->bindValue(':gameid', $gameid);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>