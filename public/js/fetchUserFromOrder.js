$(function() {
    $('#p_order_id').change(function() {
        let order_id =  $('#p_order_id').val()
        userByOrderURL = userByOrder.replace(':id', order_id);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: userByOrderURL,
            success: function(user){
            $('#p_user').val(user.name)
            $('#p_user_val').val(user.name)
            $('#p_email').val(user.email)
            $('#p_email_val').val(user.email)

            }, error: function (error) {
                            }

        });

    })
  });

