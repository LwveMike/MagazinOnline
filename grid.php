<head>
    <link rel="stylesheet" href="./style/grid.css">
</head>

<div class="container-grid">

    <?php

    include "db.php";

    $sqli = "SELECT * FROM products";
    $res = $con->query($sqli);
    $data = $res->fetch_all(MYSQLI_ASSOC);

    foreach ($data as $row) {

        echo "<div class='grid-item'>
        <div class='product'>
            <div class='product-img' style='background-image: url({$row['url']});'></div>
            <div class='product-body'>
                <div class='product-title'>{$row['name']}</div>
                <div class='product-brand'>{$row['brand']}</div>
                <div class='product-description'>{$row['description']}.</div>
            </div>
            <div class='product-actions'>
                <div class='product-price'>
                    {$row['price']} MDL
                </div>
                <a href='#' class='btn btn-warning add-to-cart'>
                    <i class='fas fa-cart-plus add-to-cart-icon'></i>
                </a>
            </div>
        </div>
    </div>";
    }

    $con->close();

    ?>


</div>