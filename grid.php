<head>
    <link rel="stylesheet" href="./style/grid.css">
</head>

<div class="container-grid">

    <?php

    include "db.php";

    $cartBtn = false;
    $isAdmin = false;



    if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
        $cartBtn = true;
        $userId = $_SESSION['id'];

        if ($_SESSION['role'] == 'admin') {
            $isAdmin = true;
        }
    }

    $sqli = "SELECT * FROM products";
    $res = $con->query($sqli);
    $data = $res->fetch_all(MYSQLI_ASSOC);

    foreach ($data as $row) {

        echo "<div class='grid-item'>
        <div class='product' data-productId={$row['id']}>
            <div class='product-img' style='background-image: url({$row['url']});'></div>
            <div class='product-body'>
                <div class='product-title'>{$row['name']}</div>
                <div class='product-brand'>{$row['brand']}</div>
                <div class='product-description'>{$row['description']}.</div>
            </div>
            <div class='product-actions'>
                <div class='product-price'>
                    {$row['price']} MDL
                </div>";

        if ($isAdmin) {
            echo "<button class='edit-item'>
                      <i class='fas fa-edit edit-item-icon'></i>
                </button>";
        }

        if ($cartBtn) {
            echo "<div class='add-to-cart-btn'>
                        <i class='fas fa-cart-plus add-to-cart-icon'></i>
                </div>";
        }

        echo "</div>
        </div>
    </div>";
    }

    $con->close();

    ?>


</div>


<?php
if ($cartBtn) {
    echo "<script defer src='./scripts/grid.js'></script>";
}

if ($isAdmin) {
    echo "<script defer src='./scripts/admin.js'></script>";
}
