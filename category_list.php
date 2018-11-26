<?php
    require_once('database.php');
    include 'includes/headerAdmin.php';

    // Get all categories
    $query = 'SELECT * FROM category
              ORDER BY categoryid';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Category</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
    <link rel="icon" type="image/png" href="images/controller.png">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="css/stylesheet.css" rel="stylesheet">

  </head>
  <body>
<div class="container">
<!--Page Heading -->
        <h1 class="mt-4 mb-3">Category List</h1><hr><br>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

               <section>
    <table class="table table-hover table-responsive">
        <tr class="table-primary">
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
        <tr>
            <td><?php echo $category['categoryName']; ?></td>
            <td>
                <form action="edit_category_form.php" method="post"
                              id="edit_category_form">
<!--                        <input type="hidden" name="categoryName"
                               value="<?php echo $category['categoryName']; ?>">-->
                        <input type="hidden" name="categoryid"
                               value="<?php echo $category['categoryid']; ?>">
                        <input type="submit" value="Edit">
                    </form></td><td>
                <form action="delete_category.php" method="post"
                      id="delete_product_form">
                    <input type="hidden" name="category_id"
                           value="<?php echo $category['categoryid']; ?>">
                    <input type="submit" value="Delete">
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
        
    </table>
    <h2>Add Category</h2>
    <form action="add_category.php" method="post"
          id="add_category_form" >

        <label>Name:</label>
        <input type="input" name="name" placeholder="Category name" class="form-control">
        <input id="add_category_button" type="submit" value="Add Category" >
    </form>
    <br>               
        </section>
            </div>
      
</div><!-- End row --> 
</div>           

<?php
include 'includes/footer.php';
?>
  </body>
</html>