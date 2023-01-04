<?php 

    session_start();
    //load file then only start functions
    require "includes/functions.php";
    require "includes/class-products.php";
    require "includes/class-cart.php";

    $cart = new CART();

    // make sure it's POST request
    if ( $_SERVER["REQUEST_METHOD"] == 'POST' ) {

        // if $_POST['action] is remove, then proceed removeProductFromCart function
        if ( isset( $_POST['action'] ) && $_POST['action'] == 'remove' ) {
            // remove product from cart
            $cart->removeProductFromCart( ( $_POST['product_id'] ) );
        } else {
            
            // make sure product_id is available in $_POST
            if ( isset( $_POST['product_id'] ) ) 
            {
                // add product_id into cart
                $cart->add( $_POST['product_id'] );
            }

        }

        // if $_POST['action] is remove, then proceed removeProductFromCart function
        if ( isset( $_POST['action'] ) && $_POST['action'] == 'update' ) {
            
            $cart->update( ( $_POST['product_id'] ) );
        } 

    }
?>

<!-- require the header part -->
<?php require "parts/header.php" ?>
<!-- require the header part -->

<div class="container mt-5 mb-2 mx-auto" style="max-width: 900px;">

    <div class="min-vh-100">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h1">My Cart</h1>
        </div>

        <!-- List of products user added to cart -->
        <table class="table table-hover table-bordered table-striped table-light">
            <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ( $cart->listAllproductinCart() as $product ): ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <td>
                        <form method="POST" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>" />
                            <input type="number" step="1" min="1" max="" name="quantity"
                                value=<?php echo $product['quantity']; ?> title="Qty" class="input-text qty text">
                        </form>
                    </td>
                    <td><?php echo $product['total']; ?></td>
                    <td>
                        <form method="POST" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
                            <!-- speficy the action as remove -->
                            <input type="hidden" name="action" value="remove" />
                            <!-- remove the selected product from cart -->
                            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>" />
                            <button class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>

                <?php if (empty($_SESSION['cart'])): ?>
                <td colspan="5">Your cart is empty.</td>
                <?php endif; ?>

                <?php if ( ! empty($_SESSION['cart'])):?>
                <tr>
                    <td colspan="3" class="text-end">Total</td>
                    <td>$<?php echo $cart->total(); ?></td>
                    <td></td>
                </tr>
                <?php endif; // end - empty( $cart->listAllProductsinCart() )?>


            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="/" class="btn btn-light btn-sm">Continue Shopping</a>
            <!-- if there is product in cart, then only display the checkout button -->
            <?php if ( !empty( $cart->listAllproductinCart() ) ) : ?>
            <form method="POST" action="/checkout">
                <button class="btn btn-primary">Checkout</a>
            </form>
            <?php endif; ?>
        </div>

    </div>

    <!-- require the footer part -->
    <?php require "parts/footer.php" ?>
    <!-- require the footer part -->