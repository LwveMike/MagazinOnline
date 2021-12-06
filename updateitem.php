<?php

include 'db.php';
include 'head.php';

function str_lreplace($search, $replace, $subject)
{
    $pos = strrpos($subject, $search);

    if ($pos !== false) {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }

    return $subject;
}



if (isset($_SESSION['username']) && $_SESSION['role'] === 'admin') {
    $propArr = ['name', 'url', 'brand', 'category', 'sub_category', 'description', 'price'];
    $n = count($propArr);
    $updateItemSqli = "UPDATE products SET ";
    for ($i = 0; $i < $n; $i++) {
        if (isset($_POST[$propArr[$i]]) && !empty($_POST[$propArr[$i]])) {
            $updateItemSqli .= "{$propArr[$i]} = '{$_POST[$propArr[$i]]}', ";
        }
    }

    $updateItemSqli = str_lreplace(', ', ' ', $updateItemSqli);

    $updateItemSqli .= "WHERE id = {$_POST['id']}";

    if (!$con->query($updateItemSqli))
        die("Nu s-a executat");
}
