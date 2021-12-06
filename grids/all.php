<?php
include "db.php";
$sqli = "SELECT * FROM products";
$res = $con->query($sqli);
$data = $res->fetch_all(MYSQLI_ASSOC);
