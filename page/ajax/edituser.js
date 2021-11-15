$(document).ready(function() {
    $.ajax({
        type: 'GET',
        url: 'query/show1user.php',
        data: {
            id: $('#user_id').val()
        },
        success: function(data) {
            var new_data = JSON.parse(data).oneUserObj
            console.log(new_data[0])
            $('#new_username').val(new_data[0].username)
            $("b").text(`ชื่อผู้ใช้: ${(new_data[0].username).toUpperCase()}`)
        }
    });

    $('#save').click(function() {
        var new_password = $('#new_pass').val();
        var confirm_new_password = $('#confirm_newpass').val();
        var new_username = $('#new_username').val();
        var id = $('#user_id').val();
        var jsonObj = { "new_password": new_password, "new_username": new_username, "id": id };
        console.log(jsonObj);
        if (new_password != confirm_new_password) {
            $('#newpass_error').html('กรุณาระบุรหัสผ่านให้ตรงกัน');
            $('#confirm_error').html('กรุณาระบุรหัสผ่านให้ตรงกัน');
            $('#confirm_newpass').addClass('border border-danger');
            $('#new_pass').addClass('border border-danger');
        } else {
            $.ajax({
                type: 'POST',
                url: 'query/superadmin_edituser.php',
                data: jsonObj,
                success: function(data) {
                    var new_data = JSON.parse(data)
                    if (new_data.status == "true") {
                        $("#changesuccess").toast("show");
                        setTimeout(
                            function() {
                                window.location.href = 'form_user.php';
                            }, 2000)
                    } else {
                        $("#changefailed").toast("show");
                    }
                }
            });
        }
    });
});