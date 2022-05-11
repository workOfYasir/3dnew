function productOrder(id)
{

    productOrderURL = productOrderURL.replace(':id', id);
    $.ajax({
        type: "GET",
        dataType: "json",
        url: productOrderURL,
        success: function(data){
            console.log('ok',data);
        }
    });
}