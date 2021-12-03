<?php

include 'menu.php';
include 'db.php';

if (!empty($_POST)) {
    $data = $_POST;

    if (
        empty($data['username']) ||
        empty($data['password'])
    ) {
        echo "<div class='alert alert-danger' role='alert'>
        Completati va rog toate campurile !
      </div>";
        die('Completati va rog toate campurile !');
    }

    $sqli = "SELECT username, password, role FROM users WHERE username = '{$data['username']}'";
    $res = $con->query($sqli);
    if ($res->num_rows !== 0) {
        $credentials = $res->fetch_all(MYSQLI_ASSOC)[0];
        if (password_verify($data['password'], $credentials['password'])) {

            $uName = $credentials['username'];
            $uRole = $credentials['role'];

            $_SESSION['username'] = $uName;
            $_SESSION['role'] = $uRole;

            echo "<script>
                window.location.replace('/lwvemike/MagazinOnline/');
                        </script>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>
            Username-ul sau parola gresita !
                  </div>";
            die('Username-ul sau parola gresita !');
        }
    } else {
        echo "<div class='alert alert-danger' role='alert'>
        Username-ul sau parola gresita !
        </div>";
        die('Username-ul sau parola gresita !');
    }
} else {
    echo "<div class='alert alert-danger' role='alert'>
                  Acest user nu exista ! " . mysqli_error($con) . "
                  </div>";
    die('Ceva nu a mers bine !');
}
