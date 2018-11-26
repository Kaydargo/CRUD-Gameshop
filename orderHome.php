<?php
    require_once('database.php');
include 'includes/headerAdmin.php';
    // Get products for selected category
    $queryOrders = "SELECT * FROM orders";
    $statement3 = $db->prepare($queryOrders);
    $statement3->execute();
    $orders = $statement3->fetchAll();
    $statement3->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>Orders</title>
    <link rel="icon" type="image/png" href="images/controller.png">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"> 
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="css/stylesheet.css" rel="stylesheet" type="text/css"/>
</head>

<!-- the body section -->
<body>
    <main>
        <br>
        <div class="container">
       <h1 class="mt-4 mb-3">Order List</h1><hr><br>
        <br>
        <aside>
             
        </aside>

        <section>
            <!-- display a table of products -->
            <table class ="table table-responsive">
                <tr class="table-primary">
                    <th>Order id</th>
                    <th>Sale id</th>
                    <th>Game id</th>
                    <th>Purchase Price</th>
                    <th>Order Date</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php foreach ($orders as $order) : ?>
                <tr>
                    <td><?php echo $order['orderid']; ?></td>
                    <td><?php echo $order['saleid']; ?></td>
                    <td><?php echo $order['gameid']; ?></td>          
                    <td><?php echo $order['purchasePrice']; ?></td>      
                    <td><?php echo date('d-m-Y', strtotime($order['orderDate']));
                    ?></td>
                    <td><form action="edit_order_form.php" method="post"
                              id="edit_order_form">
                        <input type="hidden" name="orderid"
                               value="<?php echo $order['orderid']; ?>">
                        <input type="hidden" name="saleid"
                               value="<?php echo $order['saleid']; ?>">
                        <input type="submit" value="Edit">
                    </form></td>
                    <td><form action="delete_order.php" method="post"
                              id="delete_order_form">
                        <input type="hidden" name="orderid"
                               value="<?php echo $order['orderid']; ?>">
                        <input type="submit" value="Delete">
                    </form></td>  
                    
                </tr>
                <?php endforeach; ?>
                </table>
            <table>
                <td><form action="add_order_form.php" method="post">
                <input type="submit" value="Add Order">
                    </form></td>
            </table>
        </section><br>
        </div>
    </main>
<?php
include 'includes/footer.php';
?>
</body>
</html>