$('.update-btn').on('click', (e) => {
    e.preventDefault();
    const productName = $('#product-name').val();
    const url = $('#url').val();
    const brand = $('#brand').val();
    const category = $('#category').val();
    const subCategory = $('#subcategory').val();
    const description = $('#description').val();
    const price = $('#price').val();

    let obj = {
        productName, url, brand, category, subCategory, description, price
    }

    

    $.ajax({
        type : "GET", 
        url  : "edit.php",
        success: function(res){
            window.location.href = `edit.php?id=${productId}`;
                }
    });
})