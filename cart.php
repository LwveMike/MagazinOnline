<?php
include "menu.php";

?>

<link rel="stylesheet" href="./style/cart.css">


<div class="cart-header">
    <i class="fas fa-heart cart-heart-icon"></i>
    <p class="cart-header-text">My Cart</p>
</div>



<div class="card">
    <div class="row">
        <div class="col-md-8 cart">
            <div class="title">
                <div class="row">
                    <div class="col align-self-center text-right text-muted"><span id="total-items">2</span> <span>items</span></div>
                </div>
            </div>

            <div class="row border-top border-bottom cart-item">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/pHQ3xT3.jpg"></div>
                    <div class="col">
                        <div class="row text-muted">Shirt</div>
                        <div class="row">Cotton T-shirt</div>
                    </div>
                    <div class="col">
                        <span class="decrement">-</span>
                        <span class="border qty">1</span>
                        <span class="increment">+</span>
                    </div>
                    <div class="col"><span class="itm-price">44</span><span>MDL</span></div>
                </div>
            </div>
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/pHQ3xT3.jpg"></div>
                    <div class="col">
                        <div class="row text-muted">Shirt</div>
                        <div class="row">Cotton T-shirt</div>
                    </div>
                    <div class="col">
                        <span class="decrement">-</span>
                        <span class="border qty">1</span>
                        <span class="increment">+</span>
                    </div>
                    <div class="col"><span class="itm-price">44</span><span>MDL</span></div>
                </div>
            </div>

            <div class="back-to-shop"><a href="#">&leftarrow;</a><span class="text-muted">Back to shop</span></div>
        </div>
        <div class="col-md-4 summary">
            <div>
                <h5><b>Total</b></h5>
            </div>
            <hr>
            <form>
                <p>SHIPPING</p> <select>
                    <option class="text-muted">Livrare Standart 0 MDL</option>
                </select>
                <p>GIVE CODE</p> <input id="code" placeholder="Enter your code">
            </form>
            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                <div class="col">TOTAL PRICE</div>
                <div class="col text-right" id="total">88</div>
            </div> <button class="btn">CHECKOUT</button>
        </div>
    </div>
</div>



<script defer src="./scripts/cart.js"></script>