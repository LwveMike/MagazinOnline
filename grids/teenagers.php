<?php
include "db.php";
$sqli = "SELECT * FROM products
         WHERE category = 'teenagers'";
$res = $con->query($sqli);
$data = $res->fetch_all(MYSQLI_ASSOC);
