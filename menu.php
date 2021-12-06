<?php
include "head.php";
?>

<head>
    <link rel="stylesheet" href="./style/menu.css">
</head>


<nav class="my-navbar">
    <div class="user-element">
        <?php

        if (isset($_SESSION['username']) || !empty($_SESSION['username'])) {
            $username = $_SESSION['username'];
        ?>

            <div class="fixed-element user">
                <a href="logout.php">
                    <i class="fas fa-sign-out menu-icon"></i>
                </a>
            </div>

        <?php
            echo "<p class='username'>{$username}</p>";
        } else {
        ?>

            <div class="fixed-element user" class="btn dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-user menu-icon"></i>
            </div>
            <ul class="dropdown-menu">
                <li class="list-group-item" data-toggle="modal" data-target="#registerModal">Register</li>
                <li class="list-group-item" data-toggle="modal" data-target="#loginModal">Login</li>
            </ul>

        <?php
        }
        ?>
    </div>

    <nav class="navigation">
        <div class="mini-navbar">
            <div class="mini-navbar-item">
                <a href="men.php" class="mini-navbar-link">Men</a>
            </div>

            <div class="mini-navbar-item">
                <a href="women.php" class="mini-navbar-link">Women</a>
            </div>
        </div>

        <p id='logo'>
            lwve
        </p>

        <div class="mini-navbar">
            <div class="mini-navbar-item">
                <a href="teenagers.php" class="mini-navbar-link">Teenagers</a>
            </div>

            <div class="mini-navbar-item">
                <a href="kids.php" class="mini-navbar-link">kids</a>
            </div>
        </div>
    </nav>

    <div class="fixed-element shopping-cart" id="cart">
        <i class="fas fa-shopping-bag menu-icon"></i>
    </div>
</nav>





<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="register.php">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="inputAddress">Username</label>
                            <input type="text" name="username" class="form-control" id="inputAddress" placeholder="username" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword4">Password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="password" minlength="8" required>
                        </div>
                    </div>
                    <div class="btn-group form-btns">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                <button type="button" class="close btn-close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="login.php">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="inputAddress">Username</label>
                            <input type="text" name="username" class="form-control" id="inputAddress" placeholder="username" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword4">Password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="password" required>
                        </div>
                    </div>
                    <div class="btn-group form-btns">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script defer src="./scripts/menu.js"></script>