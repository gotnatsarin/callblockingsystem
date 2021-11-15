$(document).ready(function() {
    // var message = "กรุณาระบุข้อมูลให้ครบ";
    // var phonenumber = $('#phonenum').val();
    // var owner = $('').val();
    // var status = $('').val();

    $.ajax({
        type: 'GET',
        url: 'query/show_phone.php',
        data: {
            // id: $('#user_id').val()
        },
        success: function(data) {
            var new_data = JSON.parse(data).oneUserObj
            console.log(new_data[0])
            $('#new_username').val(new_data[0].username)
        }
    });

});