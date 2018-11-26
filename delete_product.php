<?php
require_once('database.php');

// Get IDs
$gameid = filter_input(INPUT_POST, 'gameid', FILTER_VALIDATE_INT);
$categoryid = filter_input(INPUT_POST, 'categoryid', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($gameid != false && $categoryid != false) {
    $query = "DELETE FROM game
              WHERE gameid = :gameid";
    $statement = $db->prepare($query);
    $statement->bindValue(':gameid', $gameid);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('admin.php');
?>