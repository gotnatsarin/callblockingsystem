$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: "query/show_phone.php",
        data: {
            id: $('#idEdit').val(),
        },
        success: function(data) {
            var new_data = JSON.parse(data);

            $('#phonenum').val(new_data.showPhoneObj[0].phonenumber);
            $('#owner').val(new_data.showPhoneObj[0].owner);
            $('#status').val(new_data.showPhoneObj[0].status);
        }
    });
});