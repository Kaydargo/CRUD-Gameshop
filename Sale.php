<?php 
include_once 'includes/headerAdmin.php';
require_once('database.php');   
$queryProducts = "SELECT * FROM game";
    $statement3 = $db->prepare($queryProducts);
    $statement3->execute();
    $games = $statement3->fetchAll();
    $statement3->closeCursor();
    ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Profit</title>
        <link rel="icon" type="image/png" href="images/controller.png">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

 <div class="container">
<!--Page Heading -->
<h1 class="mt-4 mb-3">Profit</h1><hr><br>
        <div class="row">

            <!-- Post Content Column -->
            <div class="col-lg-8">

               <section>
            <!-- display a table of products -->

            <table class ="table table-responsive">
                <tr class="table-primary">
                    <th>Name</th>
                    <th>Purchase Price</th>
                    <th>Sale Price</th>
                    <th>Profit</th>
                    <th>Edit</th>
                </tr>
                <?php foreach ($games as $game) : ?>
                <tr>
                    <td><?php echo $game['name']; ?></td>
                    <td><?php echo $game['purchasePrice']; ?></td>
                    <td><?php echo $game['salePrice']; ?></td>
                    <td><?php echo $game['profit']; ?></td>
                    <td><form action="edit_profit_form.php" method="post"
                              id="edit_profit_form">
                        <input type="hidden" name="gameid"
                               value="<?php echo $game['gameid']; ?>">
                        <input type="submit" value="Edit">
                    </form></td>
                </tr>
                <?php endforeach; ?>
            </table>
  
        </section>
            </div>
</div>
<table>
    <td>The total of Profits earned: €</td>
<td><?php
$sum = 0;
foreach ($games as $game){
   $sum += $game['profit'];
}
echo $sum;
?></td>
</table>

<br>

 </div>
       <?php
include 'includes/footer.php';
?>     
    </body>

</html>