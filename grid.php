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


    foreach ($data as $row) {

        echo "<div class='grid-item'>
        <div class='product' data-productId={$row['id']}>";

        if ($isAdmin) {
            echo "<div class='del-item' data-id={$row['id']}></div>";
        }

        echo "<div class='product-img' style='background-image: url({$row['url']});'></div>
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

if ($isAdmin) {
    echo "<div class='add-new-item' data-toggle='modal' data-target='#addItemModal'>
    <i class='fas fa-plus add-new-item-icon'></i>
</div>";


    echo "<div class='modal fade' id='addItemModal' tabindex='-1' role='dialog' aria-labelledby='addItemModalLabel' aria-hidden='true'>
<div class='modal-dialog' role='document'>
    <div class='modal-content'>
        <div class='modal-header'>
            <h5 class='modal-title' id='addItemModalLabel'>Add new Item</h5>
            <button type='button' class='close btn-close' data-dismiss='modal' aria-label='Close'>
            </button>
        </div>
        <div class='modal-body'>
            <form method='POST' action='additem.php'>
                <div class='form-row'>
                <div class='form-group'>
                <label for='name'>Product Name</label>
                <input type='text' class='form-control' name='name' id='product-name' aria-describedby='product-name' placeholder='Product Name' required>
            </div>
            <div class='form-group'>
                <label for='url'>Url</label>
                <input type='text' class='form-control' name='url' id='url' aria-describedby='url' placeholder='Url' required>
            </div>
            <div class='form-group'>
                <label for='brand'>Brand</label>
                <input type='text' class='form-control' name='brand' id='brand' aria-describedby='brand' placeholder='Brand' required>
            </div>
            <div class='form-group'>
                <label for='category'>Category</label>
                <input type='text' class='form-control' name='category' id='category' aria-describedby='category' placeholder='Category' required>
            </div>
            <div class='form-group'>
                <label for='subcategory'>SubCategory</label>
                <input type='text' class='form-control' name='sub_category' id='subcategory' aria-describedby='subcategory' placeholder='SubCategory' required>
            </div>
            <div class='form-group'>
                <label for='description'>Description</label>
                <input type='text' class='form-control' name='description' id='description' aria-describedby='description' placeholder='Description' >
            </div>
            <div class='form-group'>
                <label for='price'>Price</label>
                <input type='number' class='form-control' name='price' id='price' aria-describedby='price' placeholder='Price' min='10' max='2000' required>
            </div>
                    <div class='text-center btns'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                    <button type='submit' class='btn btn-success'>Add Item</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>";
    echo "<script defer src='./scripts/admin.js'></script>";
}



if ($cartBtn) {
    echo "<script defer src='./scripts/grid.js'></script>";
}
