$(function() {
    $('.productApproved').change(function() {
console.log('ok');
        var status = $(this).prop('checked') == true ? 1 : 0;
        // var status = $(this).data('status');
        var id = $(this).data('id');
        productApproveURL = productApprove.replace(':id', id);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: productApproveURL,
            data:  {"status": status},
            success: function(data){
              if (data == 1) {
                    $('.text-'+id).html('Approved');
                    $('.text-'+id).removeClass("text-theme-6");
                    $('.text-'+id).addClass("text-theme-9");
                    $('.text-'+id).attr('checked',1);

             } else {
                    $('.text-'+id).html('Not Approved');
                    $('.text-'+id).removeClass("text-theme-9");
                    $('.text-'+id).addClass("text-theme-6");
                    $('.text-'+id).attr('unchecked',0);
                }
            }, error: function (error) {

                            }

        });

    })
  });

