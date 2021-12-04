const totalItems = document.getElementById('total-items');
const total = document.getElementById('total');

const incrementBtn = document.querySelectorAll('.increment');
const decrementBtn = document.querySelectorAll('.decrement');

const incrementBtnArr = [...incrementBtn];
const decrementBtnArr = [...decrementBtn];



incrementBtn.forEach((inBtn) => {
    inBtn.addEventListener('click', (e) => {
        const itmPrice = e.target.parentElement.parentElement.querySelector('.itm-price');
        const qty = e.target.parentElement.querySelector('.qty');
        const itemId = itmPrice.getAttribute('data-id');


        addQty(qty, itmPrice, totalItems, total, itemId, 'increment');
    })
})

decrementBtn.forEach((dcBtn) => {
    dcBtn.addEventListener('click', (e) => {
        const itmPrice = e.target.parentElement.parentElement.querySelector('.itm-price');
        const itemId = itmPrice.getAttribute('data-id');
        const qty = e.target.parentElement.querySelector('.qty');

        addQty(qty, itmPrice, totalItems, total, itemId, 'decrement');
    })
})


const deleteButton = document.querySelectorAll('.delete');
const deleteButtonArr = [...deleteButton];

deleteButtonArr.forEach(delBtn => {
    delBtn.addEventListener('click', (e) => {
        const itemId = e.target.parentElement.querySelector('.itm-price').getAttribute('data-id');
        const cartItem = e.target.parentElement.parentElement.parentElement;
        const q = parseInt(cartItem.querySelector('.qty').textContent);
        totalItems.textContent = parseInt(totalItems.textContent) - q;
        const itmPrice = parseFloat(cartItem.querySelector('.itm-price').textContent);

        total.textContent = parseFloat(total.textContent) - itmPrice;

        cartItem.remove();

        $.ajax({
            type : "POST", 
            url  : "delcart.php",
            data : { id: itemId},
            success: function(res){  
                    }
        });
    })
});


const addQty = (qty, itmPrice, totalItems, total, itemId, method) => {
    if(method === 'increment'){
        let quantity = parseInt(qty.textContent);
        let itmPriceFloat = parseFloat(itmPrice.textContent);
        let oneItemPrice = itmPriceFloat/quantity;
        let totalItemsInt = parseInt(totalItems.textContent);
        let totalFloat = parseFloat(total.textContent);

        if(quantity < 9){
        quantity+=1;
        totalItemsInt+=1;
        itmPriceFloat = (quantity * oneItemPrice);
        totalFloat+= oneItemPrice;

        qty.textContent = quantity;
        itmPrice.textContent = itmPriceFloat.toFixed(2);
        totalItems.textContent = totalItemsInt;
        total.textContent = totalFloat.toFixed(2);

        $.ajax({
            type : "POST", 
            url  : "quantity.php",
            data : { id: itemId  ,quantity},
            success: function(res){  
                    }
        });
    }
     else return;
}

     else if (method === 'decrement'){
        let quantity = parseInt(qty.textContent);
        let itmPriceFloat = parseFloat(itmPrice.textContent);
        let oneItemPrice = itmPriceFloat/quantity;
        let totalItemsInt = parseInt(totalItems.textContent);
        let totalFloat = parseFloat(total.textContent);

        if(quantity > 1){
        quantity-=1;
        totalItemsInt-=1;
        itmPriceFloat = quantity * oneItemPrice;
        totalFloat-= oneItemPrice;

        qty.textContent = quantity;
        itmPrice.textContent = itmPriceFloat.toFixed(2);
        totalItems.textContent = totalItemsInt;
        total.textContent = totalFloat.toFixed(2);

        $.ajax({
            type : "POST", 
            url  : "quantity.php",
            data : { id: itemId  ,quantity},
            success: function(res){  
                             console.log('succes');
                    }
        });

        
        } else return;

    }

}







