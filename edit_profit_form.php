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

$error_message="";

$queryProducts = "SELECT * FROM game";
    $statement3 = $db->prepare($queryProducts);
    $statement3->execute();
    $games = $statement3->fetchAll();
    $statement3->closeCursor();
?>

<html>
    <head>
        <title>Profit</title>
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
        <link rel="icon" type="image/png" href="images/controller.png">
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
 <div class="container">
<!--Page Heading -->
        <h1 class="mt-4 mb-3">Edit Profit</h1>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

               <section>
              <form action="edit_profit.php" method="post"
              id="edit_profit_form">
                  <div class="form-group">
                      
            <input type="hidden" name="gameid" class="form-control"
                   value="<?php echo $game['gameid']; ?>">

            
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
            
            <?php $game['profit'] = $game['salePrice'] - $game['purchasePrice']; ?>
<!--            <label>Profit:</label>
-->            <input type="hidden" name="profit" class="form-control"
                   value="<?php echo $game['profit']; ?>">
            <br>
            

            <label>&nbsp;</label>
            <input type="submit" value="Calculate" class="btn btn-primary">
            <br>
            </div>
        </form>
        </section>
               
            </div>
      
</div>
</div>           

<?php
include 'includes/footer.php';
?>
    </body>
</html>
            