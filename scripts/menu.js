const logo = document.getElementById('logo');
const cart  = document.getElementById('cart');

logo.addEventListener('click', (e) => {
    e.preventDefault();
    window.location.replace('/lwvemike/MagazinOnline/');
});

cart.addEventListener('click', (e) => {
    e.preventDefault();
    window.location.replace('/lwvemike/MagazinOnline/cart.php');
});