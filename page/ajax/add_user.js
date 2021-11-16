var passok

function checkPasswordStrength() {
    var number = /([0-9])/;
    var alphabets = /([a-z | A-Z])/;
    var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

    if ($('#password').val().length < 8) {
        $('#password-strength-status').removeClass();
        $('#password-strength-status').addClass('weak-password');
        $('#password-strength-status').html("ต้องมีความยาวอย่างน้อย 8 ตัวอักษรหรือมากกว่านั้น");
        passok = 0
    } else {
        if ($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {
            $('#password-strength-status').removeClass();
            $('#password-strength-status').addClass('strong-password');
            $('#password-strength-status').html("รหัสผ่านมีความปลอดภัยมาก");
            passok = 1
        } else {
            $('#password-strength-status').removeClass();
            $('#password-strength-status').addClass('medium-password');
            $('#password-strength-status').html("รหัสผ่านปานกลาง (ควรมีตัวหนังสือ, เลข และอักขระพิเศษ)");
            passok = 0
        }
    }
}

$(document).ready(function() {
    var username
    var password

    $('#username').keyup(function() {
        if ($(this).val() == "") {
            $('#username').addClass('border border-danger');
            $('#add_user_error').html('กรุณาระบุข้อมูล');
        } else {
            $('#username').removeClass('border border-danger');
            $('#add_user_error').html('');
        }
    });

    $('#password').keyup(function() {
        checkPasswordStrength();
        if ($(this).val() == "") {
            $('#password').addClass('border border-danger');
        } else {
            $('#password').removeClass('border border-danger');
        }
    });

    $('#save').click(function() {
        username = $('#username').val();
        password = $('#password').val();
        console.log(username + password)
        var jsonObj = { "username": username, "password": password };
        if ((username == "" || password == "")) {
            if (username == "") {
                $('#username').addClass('border border-danger');
                $('#add_user_error').html('กรุณาระบุชื่อผู้ใช้งาน');
            }
            if (password == "") {
                checkPasswordStrength()
                $('#password').addClass('border border-danger');
            }
        } else if (passok == 1) {
            $.ajax({
                type: 'POST',
                url: 'query/adduser.php',
                data: jsonObj,
                success: function(data) {
                    var new_data = JSON.parse(data)
                    if (new_data.status == "true") {
                        $("#add_user_success").toast("show");
                        setTimeout(
                            function() {
                                window.location.href = 'form_user.php';
                            }, 2000)
                    } else {
                        $("#add_user_failed").toast("show");
                        $('#username').val('');
                        $('#password').val('');
                        $('#password-strength-status').removeClass('weak-password');
                        $('#password-strength-status').removeClass('medium-password');
                        $('#password-strength-status').removeClass('strong-password');
                        $('#username').focus();
                    }
                }
            });
        }
    });
});