$(document).ready(function() {
    var message = "กรุณาระบุข้อมูลให้ครบ";
    var number = /^[0-9]*$/
        // var status
        // var owner

    $('#phonenum').keyup(function() {
        if ($(this).val() == "") {
            $('#phonenum').addClass('border border-danger');
            $('#add_phone_error').html('กรุณาระบุหมายเลขโทรศัพท์');
        } else if (!number.test($(this).val())) {
            $('#phonenum').addClass('border border-danger');
            $('#add_phone_error').html('กรุณาใส่แค่ตัวเลข');
        } else {
            $('#phonenum').removeClass('border border-danger');
            $('#add_phone_error').html('');
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

    $("#status").change(function() {
        if ($(this).val() == "สถานะ") {
            $(this).addClass('border border-danger')
            $('#status_error').html('กรุณาเลือกสถานะที่ต้องการ')
        } else {
            $('#status_error').html('')
            $(this).removeClass('border border-danger')
        }
    });

    $('#save').click(function() {
        status = $('#status').val();
        owner = $('#owner').val();
        phonenumber = $('#phonenum').val();
        var jsonObj = { "phonenumber": phonenumber, "owner": owner, "status": status };

        if (phonenumber == "" || owner == "" || status == "สถานะ") {
            if (phonenumber == "") {
                $('#phonenum').addClass('border border-danger');
                $('#add_phone_error').html(message);
            }
            if (owner == "") {
                $('#owner').addClass('border border-danger');
                $('#owner_error').html('กรุณาระบุชื่อเจ้าของเบอร์โทรศัพท์');
            }
            if (status == "สถานะ") {
                $('#status').addClass('border border-danger');
                $('#status_error').html('กรุณาเลือกสถานะที่ต้องการ');
            }
        } else if (!number.test(phonenumber)) {
            // if (phonenumber.length != 10) {
            //     $('#phonenum').addClass('border border-danger');
            //     $('#phone_error').html('กรุณาใส่หมายเลขให้ครบ');

            if (!number.test(phonenumber))
                $('#phonenum').addClass('border border-danger');
            $('#phone_error').html('กรุณากรอกแค่หมายเลข');
        } else {
            $('#addconfirm').modal('show')
        }

        function AddPhone() {
            $.ajax({
                type: 'POST',
                url: 'query/addphone.php',
                data: jsonObj,
                success: function(data) {
                    var new_data = JSON.parse(data)
                    if (new_data.status == "true") {
                        $("#add_success").toast("show");
                        setTimeout(
                            function() {
                                window.location.href = 'main.php';
                            }, 2000)
                    } else if (new_data.status == "full") {
                        $("#full").toast("show");
                    } else {
                        $("#add_failed").toast("show");
                    }
                }
            });
        }

        $('#confirmbutton').click(function() {
            $('#addconfirm').modal('hide');
            AddPhone();
        });

        $('#closemodal').click(function() {
            $('#addconfirm').modal('hide');
        });

        // $(document).on("click", "#save", function() {
        //     id = $(this).val();
        //     console.log(id);
        // });
    });
});