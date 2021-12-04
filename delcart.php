<?php
include 'head.php';
include "db.php";

if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
    if (isset($_POST['id'])) {
        $delItem = "DELETE FROM cart_items
            WHERE id = '{$_POST['id']}'";

        $result =  $con->query($delItem);
    }
}
