<?php 

    session_start();
    //load file then only start functions
    require "includes/functions.php";
    require "includes/class-orders.php";

    $orders = new ORDERS();

    // make sure user already logged in
    if ( !isLoggedIn() ) {
        // if user not logged in, redirect to login page
        header('Location: /login');
        exit;
    }
    
    $user_id = $_SESSION['user']['id'];

?>

<!-- require the header part -->
<?php require "parts/header.php" ?>
<!-- require the header part -->

<div class="container mt-5 mb-2 mx-auto" style="max-width: 900px;">
    <div class="min-vh-100">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1">My Orders</h1>
        </div>

        <!-- List of orders placed by user in table format -->
        <table class="table table-hover table-bordered table-striped table-light">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Products</th>
                    <th scope="col">Total Amount</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $orders->listOrders( $user_id ) as $order ) : ?>
                <tr>
                    <th scope="row"><?php echo $order['id']; ?></th>
                    <td>
                        <ul class="list-unstyled">
                            <?php foreach($orders->listProductsinOrder( $order['id'] ) as $product ): ?>
                            <li>
                                <?php echo $product['name']; ?>
                                [<?php echo $product['quantity']; ?>]
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </td>
                    <td>$<?php echo $order['total_amount']; ?></td>
                    <td><?php echo $order['status']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="/" class="btn btn-light btn-sm">Continue Shopping</a>
        </div>
    </div>

    <!-- require the footer part -->
    <?php require "parts/footer.php" ?>
    <!-- require the footer part -->