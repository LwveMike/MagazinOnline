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

        addQty(qty, itmPrice, totalItems, total, 'increment');
    })
})

decrementBtn.forEach((dcBtn) => {
    dcBtn.addEventListener('click', (e) => {
        const itmPrice = e.target.parentElement.parentElement.querySelector('.itm-price');
        const qty = e.target.parentElement.querySelector('.qty');

        addQty(qty, itmPrice, totalItems, total, 'decrement');
    })
})


const addQty = (qty, itmPrice, totalItems, total, method) => {
    if(method === 'increment'){
        let quantity = parseInt(qty.textContent);
        let itmPriceFloat = parseFloat(itmPrice.textContent);
        let oneItemPrice = itmPriceFloat/quantity;
        let totalItemsInt = parseInt(totalItems.textContent);
        let totalFloat = parseFloat(total.textContent);

        if(quantity < 9){
        quantity+=1;
        totalItemsInt+=1;
        itmPriceFloat = quantity * oneItemPrice;
        totalFloat+= oneItemPrice;

        console.log('One item : ', oneItemPrice);
        console.log('All items : ', itmPriceFloat);

        qty.textContent = quantity;
        itmPrice.textContent = itmPriceFloat;
        totalItems.textContent = totalItemsInt;
        total.textContent = totalFloat;
        } else return;
    } else if (method === 'decrement'){
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

        console.log('One item : ', oneItemPrice);
        console.log('All items : ', itmPriceFloat);

        qty.textContent = quantity;
        itmPrice.textContent = itmPriceFloat;
        totalItems.textContent = totalItemsInt;
        total.textContent = totalFloat;
        } else return;

    }

}




