<link rel="stylesheet" href="./style/edit.css">

<?php

include "menu.php";
include "db.php";

if (!isset($_SESSION['username']) || empty($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    echo "<div class='alert alert-danger' role='alert'>
    Trebuie sa fii ADMIN ca sa poti face schimbari
            </div>";
    echo "<script>
    setTimeout(() => {
    window.location.replace('/lwvemike/MagazinOnline/');
    }, 2000);
            </script>";
    die();
} else {

    if (isset($_GET['id'])) {
        $pid = $_GET['id'];

        $getItemData = "SELECT name, url, brand, description, category, sub_category, price FROM products
                        WHERE id = {$pid}";

        if ($result = $con->query($getItemData)) {
            $response = $result->fetch_all(MYSQLI_ASSOC);
            if (count($response) > 0) {
                echo "<form class='edit-form'>
                    <h1 class='form-title'>Update Item</h1>
                    <div class='form-group'>
                        <label for='name'>Product Name</label>
                        <input type='text' class='form-control' id='product-name' aria-describedby='product-name' placeholder='Product Name'>
                    </div>
                    <div class='form-group'>
                        <label for='url'>Url</label>
                        <input type='text' class='form-control' id='url' aria-describedby='url' placeholder='Url'>
                    </div>
                    <div class='form-group'>
                        <label for='brand'>Brand</label>
                        <input type='text' class='form-control' id='brand' aria-describedby='brand' placeholder='Brand'>
                    </div>
                    <div class='form-group'>
                        <label for='category'>Category</label>
                        <input type='text' class='form-control' id='category' aria-describedby='category' placeholder='Category'>
                    </div>
                    <div class='form-group'>
                        <label for='subcategory'>SubCategory</label>
                        <input type='text' class='form-control' id='subcategory' aria-describedby='subcategory' placeholder='SubCategory'>
                    </div>
                    <div class='form-group'>
                        <label for='description'>Description</label>
                        <input type='text' class='form-control' id='description' aria-describedby='description' placeholder='Description'>
                    </div>
                    <div class='form-group'>
                        <label for='price'>Price</label>
                        <input type='number' class='form-control' id='price' aria-describedby='price' placeholder='Price' min='10' max='2000'>
                    </div>
                    <div class='text-center'>
                    <button  class='btn btn-success update-btn'>Update</button>
                    </div>
                </form>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>
                Nu exista asa item in Baza De Date !
                        </div>";
            }
        }
    }
}

?>

<script src="./scripts/edit.js"></script>