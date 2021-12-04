<?php
include 'head.php';
include "db.php";

if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
    if (isset($_POST['id'])) {
        $q = $_POST['quantity'];
        $addQty = "UPDATE cart_items
            SET quantity = {$q}
            WHERE id = '{$_POST['id']}'";

        $result =  $con->query($addQty);
    }
}
