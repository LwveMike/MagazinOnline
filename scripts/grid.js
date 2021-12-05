const addToCart = document.querySelectorAll('.add-to-cart-btn');
const addToCartArr = [...addToCart];

addToCartArr.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        const productId = e.target.parentElement.parentElement.parentElement.getAttribute('data-productId');

        $.ajax({
            type : "POST", 
            url  : "addcart.php",
            data : { id: productId},
            success: function(res){  
                    }
        });
    })
})