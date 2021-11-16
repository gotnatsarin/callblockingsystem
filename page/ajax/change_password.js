$(document).ready(function() {
    var match8cha = /^(?=.{8,255})/;
    var matchUpper = /^(?=.[A-Z])/;
    var matchLower = /^(?=.[a-z])/;
    var matchNumber = /^(?=.[0-9])/;
    var matchSpeCha = /^(?=.[!@#$%^&*(),.?":{}|<>_=[];+:])/;

    $('#old_pass').keyup(function() {
        if ($(this).val() == "") {
            $('#old_pass').addClass('border border-danger');
            $('#oldpass_error').html('กรุณาระบุรหัสผ่าน');
        } else {
            $('#old_pass').removeClass('border border-danger');
            $('#oldpass_error').html('');
        }
    });

    $('#new_pass').keyup(function() {
        if ($(this).val() == "") {
            $('#new_pass').addClass('border border-danger');
            $('#newpass_error').html('กรุณาระบุรหัสผ่าน');
        } else {
            $('#new_pass').removeClass('border border-danger');
            $('#newpass_error').html('');
        }
    });

    $('#confirm_newpass').keyup(function() {
        if ($(this).val() == "") {
            $('#confirm_newpass').addClass('border border-danger');
            $('#confirm_error').html('กรุณาระบุรหัสผ่าน');
        } else {
            $('#confirm_newpass').removeClass('border border-danger');
            $('#confirm_error').html('');
        }
    });

    $('#save').click(function() {
        var old_password = $('#old_pass').val();
        var new_password = $('#new_pass').val();
        var confirm_new_password = $('#confirm_newpass').val();
        var id = $('#user_id').val();
        var jsonObj = { "old_password": old_password, "new_password": new_password, "id": id };

        if (old_password == "" || new_password == "" || confirm_new_password == "") {
            if (old_password == "") {
                $('#oldpass_error').html('กรุณาระบุรหัสผ่าน');
                $('#old_pass').addClass('border border-danger');
            }
            if (new_password == "") {
                $('#newpass_error').html('กรุณาระบุรหัสผ่าน');
                $('#new_pass').addClass('border border-danger');
            }
            if (confirm_new_password == "") {
                $('#confirm_error').html('กรุณาระบุรหัสผ่าน');
                $('#confirm_newpass').addClass('border border-danger');
            }
        } else if (new_password != confirm_new_password) {
            $('#newpass_error').html('กรุณาระบุรหัสผ่านให้ตรงกัน');
            $('#confirm_error').html('กรุณาระบุรหัสผ่านให้ตรงกัน');
            $('#confirm_newpass').addClass('border border-danger');
            $('#new_pass').addClass('border border-danger');
        }
        // else if (!match8cha.test(new_password)) {

        // } 
        else {
            $.ajax({
                type: 'POST',
                url: 'query/change_password.php',
                data: jsonObj,
                success: function(data) {
                    var new_data = JSON.parse(data)
                    console.log(new_data)
                    if (new_data.status == "true") {
                        console.log("เปลี่ยนรหัสผ่านเรียบร้อยแล้ว")
                        $("#changesuccess").toast("show");
                        setTimeout(
                            function() {
                                window.location.href = 'main.php';
                            }, 2000)
                    } else {
                        console.log("เปลี่ยนรหัสผ่านไม่สำเร็จ")
                        $("#changefailed").toast("show");
                    }
                }
            });
        }
    });
});