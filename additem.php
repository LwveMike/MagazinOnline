<?php
include 'menu.php';
include "db.php";

if (isset($_SESSION['username']) || !empty($_SESSION['username']) && $_SESSION['role'] == 'admin') {

    if (
        isset($_POST['name']) && !empty($_POST['name']) &&
        isset($_POST['url']) && !empty($_POST['url']) &&
        isset($_POST['brand']) && !empty($_POST['brand']) &&
        isset($_POST['category']) && !empty($_POST['category']) &&
        isset($_POST['sub_category']) && !empty($_POST['sub_category']) &&
        isset($_POST['price']) && !empty($_POST['price'])
    ) {

        $addNewItemSqli = "INSERT INTO products (name, url, brand, price, category, sub_category, description)
                           VALUES ('{$_POST['name']}', '{$_POST['url']}', '{$_POST['brand']}', '{$_POST['price']}',
                           '{$_POST['category']}', '{$_POST['sub_category']}', '{$_POST['description']}')";

        if ($con->query($addNewItemSqli)) {
            echo "<div class='alert alert-success' role='alert'>
                  Itemul a fost adaugat cu succes ! 
                  </div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>
            Itemul nu a fost adaugat !
            </div>";
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>
        Completati va rog toate campurile !
        </div>";
    }


    $con->close();
} else {
    echo "<div class='alert alert-danger' role='alert'>
    Ca sa adaugati un item trebuie sa fiti ADMIN !
    </div>";
}


echo "<script>
    setTimeout(() => {
        window.location.replace('/lwvemike/MagazinOnline/');
    }, 2000);
                        </script>";
