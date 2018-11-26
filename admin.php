<?php
    require_once('database.php');
    include 'includes/headerAdmin.php';

    // Get category ID
    if (!isset($categoryid)) {
        $categoryid = filter_input(INPUT_GET, 'categoryid', 
                FILTER_VALIDATE_INT);
        if ($categoryid == NULL || $categoryid == FALSE) {
            $categoryid = 1;
        }
    }

    // Get name for current category
    $queryCategory = "SELECT * FROM category
              WHERE categoryid = :categoryid";
    $statement1 = $db->prepare($queryCategory);
    $statement1->bindValue(':categoryid', $categoryid);
    $statement1->execute();
    $category = $statement1->fetch();
    $statement1->closeCursor();
    $categoryName = $category['categoryName'];

    // Get all categories
    $queryAllCategories = 'SELECT * FROM category
              ORDER BY categoryid';
    $statement2 = $db->prepare($queryAllCategories);
    $statement2->execute();
    $category = $statement2->fetchAll();
    $statement2->closeCursor();

    // Get products for selected category
    $queryProducts = "SELECT * FROM game
              WHERE categoryid = :categoryid
              ORDER BY gameid";
    $statement3 = $db->prepare($queryProducts);
    $statement3->bindValue(':categoryid', $categoryid);
    $statement3->execute();
    $games = $statement3->fetchAll();
    $statement3->closeCursor();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Stock</title>
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
        <link rel="icon" type="image/png" href="images/controller.png">
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

 <div class="container">
<!--Page Heading -->
<h1 class="mt-4 mb-3">View Stock</h1><hr><br>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

               <section>
            <!-- display a table of products -->
            <h2><strong>Category:</strong> <?php echo $categoryName; ?></h2>
            <table class ="table table-responsive">
                <tr class="table-primary">
                    <th>Name</th>
                    <th>Purchase Price</th>
                    <th>Sale Price</th>
                    <th>Picture</th>
<!--                    <th>Video</th>-->
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($games as $game) : ?>
                <tr>
                    <td><?php echo $game['name']; ?></td>
                    <td><?php echo $game['purchasePrice']; ?></td>
                    <td><?php echo $game['salePrice']; ?></td>
                    <td><?= ($game['picture'] <> " " ? "<img style='width:180px; height:240px;' src='images/{$game['picture']}'/>" : "") ?>  </td>
<!--                     <td><?= ($game['video'] <> " " ? "<iframe style='width:180px; height:240px;' src='{$game['video']}'/>" : "") ?>  </td>-->
                    <td><form action="edit_product_form.php" method="post"
                              id="edit_product_form">
                        <input type="hidden" name="gameid"
                               value="<?php echo $game['gameid']; ?>">
                        <input type="hidden" name="categoryid"
                               value="<?php echo $game['categoryid']; ?>">
                        <input type="submit" value="Edit">
                    </form></td>
                    <td><form action="delete_product.php" method="post"
                              id="delete_product_form">
                        <input type="hidden" name="gameid"
                               value="<?php echo $game['gameid']; ?>">
                        <input type="hidden" name="categoryid"
                               value="<?php echo $game['categoryid']; ?>">
                        <input type="submit" value="Delete">
                    </form></td>
                    
                </tr>
                <?php endforeach; ?>
            </table>
            
            <table>
            <td><form action="add_product_form.php" method="post"
                              id="add_product_form">
                        <input type="hidden" name="gameid"
                               value="<?php echo $games['gameid']; ?>">
                        <input type="hidden" name="categoryid"
                               value="<?php echo $games['categoryid']; ?>">
                        <input type="submit" value="Add new Game">
                    </form></td>
                    <td><form action="orderHome.php" method="post">
                <input type="submit" value="Manage Orders">
                        </form></td>
                    </table>
                    
            
        </section>
               
            </div>

         <?php
include 'includes/sidebar.php';
?>    
</div><!-- End row -->
 
</div>     
        

        
<?php
include 'includes/footer.php';
?>
            
    </body>
</html>