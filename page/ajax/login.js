$(document).ready(function() {
    $("#username").keyup(function() {
        var pattern = /[^a-zA-Z0-9_]/
        var bools = pattern.test($(this).val());
        if (bools == true) {
            $('#username_error_message').html('ชื่อผู้ใช้ต้องมีตัวอักษร (a-z) ตัวเลข (0-9)')
            $(this).addClass('border border-danger')
        } else if ($(this).val() == "") {
            $('#username_error_message').html('กรุณาระบุข้อมูลให้ครบ')
            $(this).addClass('border border-danger')
        } else {
            $('#username_error_message').html('')
            $(this).removeClass('border border-danger')
        }
    });

    $("#password").keyup(function() {
        if ($(this).val() == "") {
            $(this).addClass('border border-danger')
            $('#password_error_message').html('กรุณาระบุข้อมูลให้ครบ')
        } else {
            $('#password_error_message').html('')
            $(this).removeClass('border border-danger')
        }
    });

    $('#submit').click(function() {
        var username = $('#username').val()
        var password = $('#password').val()

        if (username == "" || password == "") {
            if (username == "") {
                $('#username').addClass('border border-danger')
                $('#username_error_message').html('กรุณาระบุข้อมูลให้ครบ')
            }
            if (password == "") {
                $('#password').addClass('border border-danger')
                $('#password_error_message').html('กรุณาระบุข้อมูลให้ครบ')
            }
        } else {
            $.ajax({
                type: 'POST',
                url: 'query/login.php',
                data: {
                    username: $("#username").val(),
                    password: $("#password").val(),
                },
                success: function(data) {
                    var new_data = JSON.parse(data)
                    if (new_data.status == "true") {
                        window.location.href = `main.php?room_id=${new_data.id}`;
                    } else {
                        $("#myToast").toast("show");
                    }
                }
            });
        }
    });
});