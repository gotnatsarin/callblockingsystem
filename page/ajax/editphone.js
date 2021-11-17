$(document).ready(function() {
    number = /^[0-9]*$/

    $('#phonenum').keyup(function() {
        var value = $(this).val();
        if (value == "") {
            $('#phonenum').addClass('border border-danger');
            $('#phone_error').html('กรุณาระบุเบอร์โทรศัพท์');
        } else if (!number.test(value)) {
            $('#phonenum').addClass('border border-danger');
            $('#phone_error').html('กรุณากรอกแค่หมายเลข');
        } else {
            $('#phonenum').removeClass('border border-danger');
            $('#phone_error').html('');
        }
    });

    $('#owner').keyup(function() {
        if ($(this).val() == "") {
            $('#owner').addClass('border border-danger');
            $('#owner_error').html('กรุณาระบุชื่อเจ้าของเบอร์');
        } else {
            $('#owner').removeClass('border border-danger');
            $('#owner_error').html('');
        }
    });




    $('#save').click(function() {
        var phonenumber = $('#phonenum').val();
        var owner = $('#owner').val();
        var status = $('#status').val();
        var id = $('#idEdit').val();
        formdata = new FormData();
        formdata.append('phonenumber', phonenumber);
        formdata.append('owner', owner);
        formdata.append('status', status);
        formdata.append('id', id);

        if (phonenumber == "" || owner == "" || status == "สถานะ") {
            if (phonenumber == "") {
                $('#phone_error').html('กรุณาระบุเบอร์โทรศัพท์');
                $('#phonenumber').addClass('border border-danger');
            }
            if (owner == "") {
                $('#owner_error').html('กรุณาระบุชื่อเจ้าของเบอร์');
                $('#owner').addClass('border border-danger');
            }
            if (status == "") {
                $('#status_error').html('กรุณาระบุสถานะ');
                $('#status').addClass('border border-danger');
            }
        } else if (phonenumber.length != 10 || !number.test(phonenumber)) {
            console.log(number.test(phonenumber))
            if (phonenumber.length != 10) {
                $('#phonenum').addClass('border border-danger');
                $('#phone_error').html('กรุณาใส่หมายเลขให้ครบ');
            }
            if (!number.test(phonenumber)) {
                $('#phonenum').addClass('border border-danger');
                $('#phone_error').html('กรุณากรอกแค่หมายเลข');
            }
        } else {
            $.ajax({
                type: 'POST',
                url: 'query/edit_phone.php',
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    var new_data = JSON.parse(data);
                    console.log(data);
                    if (new_data.status == "true") {
                        console.log("เเก้ไขข้อมูลเรียบร้อยแล้ว");
                        $("#editSuccessToast").toast("show");
                        setTimeout(
                            function() {
                                window.location.href = 'main.php';
                            }, 2000)
                    } else {
                        console.log("เเก้ไขข้อมูลไม่สำเร็จ");
                        $("#editFailToast").toast("show");
                    }
                }
            });
        }
    });
});