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

    $sqli = "SELECT username FROM users WHERE username = '{$data['username']}'";
    $res = $con->query($sqli);
    $dbUsername = $res->fetch_all(MYSQLI_ASSOC);

    if ($dbUsername) {
        echo "<div class='alert alert-danger' role='alert'>
        Exista deja un user cu acest nume !
      </div>";
        die('Exista deja un user cu acest nume !');
    } else {
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);
        $createUserSqli = "INSERT INTO users (username, password) VALUES ('{$data['username']}','{$hashedPassword}');";
        if ($con->query($createUserSqli)) {
            echo "<div class='alert alert-success' role='alert'>
                  Ati fost inregistrat cu succes !
                  </div>";


            $getUserInfo = "SELECT username, role FROM users WHERE username = '{$data['username']}'";
            $userInfoRes = $con->query($getUserInfo);
            $userInfo = $userInfoRes->fetch_all(MYSQLI_ASSOC)[0];

            $uName = $userInfo['username'];
            $uRole = $userInfo['role'];

            $_SESSION['username'] = $uName;
            $_SESSION['role'] = $uRole;

            echo "<script>
            window.location.replace('/lwvemike/MagazinOnline/');
                    </script>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>
                  Nu ati fost inregistrat ! " . mysqli_error($con) . "
                  </div>";
            die('Nu ati fost inregistrat !');
        }
    }
}
