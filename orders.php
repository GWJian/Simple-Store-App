<?php 

session_start();
//load file then only start functions
require "includes/functions.php";

$database = connectToDB();
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
                <tr>
                    <th scope="row">1</th>
                    <td>
                        <ul class="list-unstyled">
                            <li>Product 1</li>
                            <li>Product 2</li>
                        </ul>
                    </td>
                    <td>$80</td>
                    <td>Pending Payment</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>
                        <ul class="list-unstyled">
                            <li>Product 3</li>
                            <li>Product 4</li>
                        </ul>
                    </td>
                    <td>$60</td>
                    <td>Completed</td>
                </tr>
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center my-3">
            <a href="index.php" class="btn btn-light btn-sm">Continue Shopping</a>
        </div>
    </div>

    <!-- require the footer part -->
    <?php require "parts/footer.php" ?>
    <!-- require the footer part -->