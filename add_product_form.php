<?php
require('database.php');
$query = 'SELECT *
          FROM category
          ORDER BY categoryid';
$statement = $db->prepare($query);
$statement->execute();
$category = $statement->fetchAll();
$statement->closeCursor();

include 'includes/headerAdmin.php';
?>
<html>
    <head>
        <title>Products</title>
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
    </head>
<div class="container">
<!--Page Heading -->
        <h1 class="mt-4 mb-3">Add Product</h1>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">
        <form action="add_product.php" method="post" id="add_product_form">
          <div class="form-group">
            <label>Category:</label>
            <select name="categoryid" class="form-control">
            <?php foreach ($category as $categories) : ?>
                <option value="<?php echo $categories['categoryid']; ?>">
                    <?php echo $categories['categoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            
<!--            <label>Game Id:</label>-->
            <input type="hidden" name="gameid" class="form-control" placeholder="Add game code" >
            <br>
            
            <label>Sale Id:</label>
            <input type="input" name="saleid" class="form-control" placeholder="Add sale id" >
            <br>
            
            <label>Name:</label>
            <input type="input" name="name" class="form-control" aria-describedby="addName" placeholder="Add product name">
            <br>

            <label>Purchase Price:</label>
            <input type="input" name="purchasePrice" class="form-control" aria-describedby="addPurchasePrice" placeholder="Add purchase price">
            <br>
            
            
            <label>Sale Price:</label>
            <input type="input" name="salePrice" class="form-control" aria-describedby="addSalePrice" placeholder="Add sale price">
            <br>
            
            <label>Picture:</label>
            <input type="input" name="picture" class="form-control" aria-describedby="addPicture" placeholder="Add product picture">
            <br>

            <label>&nbsp;</label>
            <button type="submit" value="Add Product" class="btn btn-primary">Submit</button>
            <br>
            </div>
        </form>
               
            </div>
     
</div><!-- End row -->
<a href="includes/sidebar.php"></a>

</div>           

<?php
include 'includes/footer.php';
?>
            