<?php
include 'head.php';
include "db.php";

if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
    if (isset($_POST['id'])) {
        $userId = $_SESSION['id'];
        $pid = $_POST['id'];

        $itemExists = "SELECT product_id FROM cart_items
        WHERE user_id = {$userId} AND product_id = {$pid}";

        if ($result = $con->query($itemExists)) {
            $response = $result->fetch_all(MYSQLI_ASSOC)[0];
            $idExists = $response['product_id'];

            if (!$idExists) {
                $addItm = "INSERT INTO cart_items (user_id, product_id, quantity)
                VALUES ({$userId}, {$_POST['id']}, 1)";
                $con->query($addItm);
            }
        }

        $con->close();
    }
}
