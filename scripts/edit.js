$('.update-btn').on('click', (e) => {
    e.preventDefault();

    const pid = $("form[data-id]").attr('data-id');

    const name = $('#product-name').val();
    const url = $('#url').val();
    const brand = $('#brand').val();
    const category = $('#category').val();
    const subCategory = $('#sub_category').val();
    const description = $('#description').val();
    const price = $('#price').val();

    let obj = {
       id: pid,
       name: name,
       url: url,
       brand: brand,
       category: category,
       sub_category: subCategory,
       description: description,
       price: price
    }


    $.ajax({
        type : "POST", 
        url  : "updateitem.php",
        data : {...obj},
        success: function(res){
            setTimeout(() => {
                window.location.href = '/lwvemike/MagazinOnline/';
            }, 1000);
                }
    });
})