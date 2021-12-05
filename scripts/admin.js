const editItems = $('.edit-item');
const editItemsArr = [...editItems];


editItemsArr.forEach((editBtn) => {
    editBtn.addEventListener('click', (e) => {
        const productId = e.target.parentElement.parentElement.parentElement.getAttribute('data-productId');
        $.ajax({
            type : "GET", 
            url  : "edit.php",
            success: function(res){
                window.location.href = `edit.php?id=${productId}`;
                    }
        });
    })
})