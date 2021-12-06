<?php
include 'head.php';
include "db.php";

if (isset($_SESSION['username']) || !empty($_SESSION['username']) && $_SESSION['role'] == 'admin') {
    if (isset($_POST['id'])) {
        $delItemSqli = "DELETE from products
                    WHERE id = {$_POST['id']}";

        if ($con->query($delItemSqli)) {
            echo 'succes';
        } else {
            die('fail');
        }
    }
    $con->close();
}
