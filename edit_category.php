<?php
// Get the category data
$categoryName = filter_input(INPUT_POST, 'categoryName');
$categoryid = filter_input(INPUT_POST, 'categoryid', FILTER_VALIDATE_INT);

// Validate inputs
if ($categoryName == null || $categoryid == null) {
    $error = "Invalid category data. Check all fields and try again.";
    include('error.php');
} 
else {
    require_once('database.php');

    // Add the product to the database
    $query = "UPDATE category SET
              categoryName = :categoryName
              WHERE categoryid = :categoryid";
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryid', $categoryid);
    $statement->bindValue(':categoryName', $categoryName);
    $statement->execute();
    $statement->closeCursor();

    // Display the Category List page
    include('category_list.php');
}
?>