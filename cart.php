<?php
include "menu.php";
include "db.php";

if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    echo "<div class='alert alert-danger' role='alert'>
    Trebuie sa fii logat ca sa ai un cart
            </div>";
    echo "<script>
    setTimeout(() => {
    window.location.replace('/lwvemike/MagazinOnline/');
    }, 2000);
            </script>";
    die();
}
?>
<link rel="stylesheet" href="./style/cart.css">


<div class="cart-header">
    <i class="fas fa-heart cart-heart-icon"></i>
    <p class="cart-header-text">My Cart</p>
</div>



<div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <?php
                    $userId = $_SESSION['id'];

                    $totalItems = "SELECT cart_items.id, cart_items.quantity, products.name, products.url, products.price, products.sub_category FROM cart_items
                                   JOIN products
                                   ON cart_items.product_id = products.id
                                   WHERE cart_items.user_id = {$userId}";

                    $totalItemsQuery = $con->query($totalItems);
                    $totalItemsResponse = $totalItemsQuery->fetch_all(MYSQLI_ASSOC);

                    $totalItemsLengthArr = [];
                    $totalItemsPrice = [];

                    foreach ($totalItemsResponse as $itemResponse) {
                        array_push($totalItemsLengthArr, $itemResponse['quantity']);
                        array_push($totalItemsPrice, $itemResponse['quantity'] * $itemResponse['price']);
                    }

                    $items = array_sum($totalItemsLengthArr);
                    $totalPrice = array_sum($totalItemsPrice);
                    $totalPrice = round($totalPrice, 2);

                    echo "<div class='col align-self-center text-right text-muted'><span id='total-items'>{$items}</span> <span>items</span></div>";

                    ?>

                </div>
            </div>

            <?php
            foreach ($totalItemsResponse as $item) {
                $price = round($item['price'] * $item['quantity'], 2);
                echo "<div class='row border-top border-bottom cart-item'>
                <div class='row main align-items-center'>
                    <div class='col-2'><img class='img-fluid' src={$item['url']}></div>
                    <div class='col'>
                        <div class='row text-muted'>{$item['sub_category']}</div>
                        <div class='row'>{$item['name']}</div>
                    </div>
                    <form class='col'>
                        <span class='decrement' name='decrement_{$item['id']}'>-</span>
                        <span class='border qty'>{$item['quantity']}</span>
                        <span class='increment' name='increment_{$item['id']}'>+</span>
                    </form>
                    <div class='col'><span class='itm-price' data-id={$item['id']}>{$price}</span><span class='currency'>MDL</span><span class='delete'>&times</span></div>
                </div>
            </div>";
            }

            ?>

            <div class="back-to-shop"><a href="/lwvemike/MagazinOnline/">&leftarrow;</a><span class="text-muted">Back To Shop</span></div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>Total</b></h5>
            </div>
            <hr>
            <form>
                <p>SHIPPING</p> <select>
                    <option class="text-muted">Standard Delivery 0 MDL</option>
                </select>
                <p>GIVE CODE</p> <input id="code" placeholder="Enter your code">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <?php
                echo "<div class='col text-right' id='total'>{$totalPrice}</div>"
                ?>

            </div> <button class="btn">CHECKOUT</button>
        </div>
    </div>
</div>



<script defer src="./scripts/cart.js"></script>