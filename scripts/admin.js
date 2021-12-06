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
});

const delItems = $('.del-item');
const delItemsArr = [...delItems];


delItemsArr.forEach((btn) => {
   btn.addEventListener('click', (e) => {
        const id = btn.getAttribute('data-id');
        e.target.parentElement.parentElement.remove();

        $.ajax({
            type : "POST", 
            url  : "delitem.php",
            data : { id: id},
            success: function(res){  
                    }
        });

    })
})