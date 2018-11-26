<?php
require('database.php');
include 'includes/headerAdmin.php';

$gameid = filter_input(INPUT_POST, 'gameid', FILTER_VALIDATE_INT);
$query = 'SELECT * FROM game WHERE gameid = :gameid';
$statement = $db->prepare($query);
$statement->bindValue(':gameid', $gameid);
$statement->execute();
$game = $statement->fetch();
$statement->closeCursor();
?>
<html>
    <head>
        <title>Orders</title>
        <link rel="icon" type="image/png" href="images/controller.png">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
    </head>
 <div class="container">
<!--Page Heading -->
        <h1 class="mt-4 mb-3">Edit Product</h1>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

               <section>
              <form action="edit_product.php" method="post"
              id="add_product_form">
                  <div class="form-group">
                      
            <input type="hidden" name="gameid" class="form-control"
                   value="<?php echo $game['gameid']; ?>">

            <label>Category:</label>
            <input type="categoryid" name="categoryid" class="form-control"
                   value="<?php echo $game['categoryid']; ?>">
            <br>
            
            <label>Name:</label>
            <input type="name" name="name" class="form-control"
                   value="<?php echo $game['name']; ?>">
            <br>

            <label>Purchase Price</label>
            <input type="input" name="purchasePrice" class="form-control"
                   value="<?php echo $game['purchasePrice']; ?>">
            <br>

            <label>Sale Price:</label>
            <input type="input" name="salePrice" class="form-control"
                   value="<?php echo $game['salePrice']; ?>">
            <br>

            <label>Picture:</label>
            <input type="input" name="picture" class="form-control"
                   value="<?php echo $game['picture']; ?>">
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Save Changes" class="btn btn-primary">
            <br>
            </div>
        </form>
        </section>
               
            </div>
      
</div><!-- End row -->
<?php include('admin.php'); ?>
</div>           

<?php
include 'includes/footer.php';
?>
            