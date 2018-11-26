<?php
require('database.php');
include 'includes/headerAdmin.php';

$categoryid = filter_input(INPUT_POST, 'categoryid', FILTER_VALIDATE_INT);

$query = 'SELECT * FROM category WHERE categoryid = :categoryid';
$statement = $db->prepare($query);
$statement->bindValue(':categoryid', $categoryid);
$statement->execute();
$category = $statement->fetch();
$statement->closeCursor();
?>

<html>
    <head>
        <title>Category</title>
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
        <link rel="icon" type="image/png" href="images/controller.png">
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
    </head>
 <div class="container">
<!--Page Heading -->
        <h1 class="mt-4 mb-3">Edit Category</h1>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

               <section>
              <form action="edit_category.php" method="post"
              id="edit_category_form">
                  <div class="form-group">
                      
            <input type="hidden" name="categoryid" class="form-control"
                   value="<?php echo $category['categoryid']; ?>">
            
            <label>Name:</label>
            <input type="input" name="categoryName" class="form-control"
                   value="<?php echo $category['categoryName']; ?>">
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes" class="btn btn-primary">
            <br>
            </div>
        </form>
        </section>
               
            </div>
      
</div><!-- End row -->

</div>           

<?php
include 'includes/footer.php';
?>
            