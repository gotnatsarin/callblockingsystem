$(document).ready(function() {
    var pattern = /^(?!0)(?!.*\.$)((1?\d?\d|25[0-5]|2[0-4]\d)(\.|$)){4}$/;

    $('#inbound_trunk').keyup(function() {
        if ($(this).val() == "") {
            $('#inbound_trunk').addClass('border border-danger');
            $('#inbound_error').html('กรุณาระบุข้อมูล');
        } else {
            $('#inbound_trunk').removeClass('border border-danger');
            $('#inbound_error').html('');
        }
    });

    $('#outbound_trunk').keyup(function() {
        if ($(this).val() == "") {
            $('#outbound_trunk').addClass('border border-danger');
            $('#outbound_error').html('กรุณาระบุข้อมูล');
        } else {
            $('#outbound_trunk').removeClass('border border-danger');
            $('#outbound_error').html('');
        }
    });

    $('#Port1').keyup(function() {
        if ($(this).val() == "") {
            $('#Port1').addClass('border border-danger');
            $('#port_inbound_error').html('กรุณาระบุข้อมูล');
        } else {
            $('#Port1').removeClass('border border-danger');
            $('#port_inbound_error').html('');
        }
    });

    $('#Port2').keyup(function() {
        if ($(this).val() == "") {
            $('#Port2').addClass('border border-danger');
            $('#port_outbound_error').html('กรุณาระบุข้อมูล');
        } else {
            $('#Port2').removeClass('border border-danger');
            $('#port_outbound_error').html('');
        }
    });

    $('#save').click(function() {
        let inbound = $('#inbound_trunk').val();
        let outbound = $('#outbound_trunk').val();
        let port1 = $('#Port1').val();
        let port2 = $('#Port2').val();

        if (inbound == "" || outbound == "" || port1 == "" || port2 == "") {
            if (inbound == "") {
                $('#inbound_trunk').addClass('border border-danger');
                $('#inbound_error').html('กรุณาระบุข้อมูล');
            }
            if (outbound == "") {
                $('#outbound_trunk').addClass('border border-danger');
                $('#outbound_error').html('กรุณาระบุข้อมูล');
            }
            if (port1 == "") {
                $('#Port1').addClass('border border-danger');
                $('#port_inbound_error').html('กรุณาระบุข้อมูล');
            }
            if (port2 == "") {
                $('#Port2').addClass('border border-danger');
                $('#port_outbound_error').html('กรุณาระบุข้อมูล');
            }
        } else {
            $('#writeconfirm').modal('show')
        }
    });

    function Writefile() {
        let inbound = $('#inbound_trunk').val();
        let outbound = $('#outbound_trunk').val();
        let port1 = $('#Port1').val();
        let port2 = $('#Port2').val();
        $.ajax({
            type: 'POST',
            url: 'query/writeFile.php',
            data: {
                inbound: inbound,
                outbound: outbound,
                portIn: port1,
                portOut: port2,
            },
            success: function(data) {
                console.log(data)
                if (parseInt(data) == 0) {
                    $('#writesuccess').toast('show');
                    setTimeout(
                        function() {
                            $('#writesuccess').toast('hide');
                        }, 2000)
                } else {
                    $('#writefailed').toast('show');
                    setTimeout(
                        function() {
                            $('#writefailed').toast('hide');
                        }, 2000)
                }
            }
        });
    }

    $('#showstatus').click(function() {
        var valueBtn = $(this).val();
        console.log(valueBtn)
        if (valueBtn == 0) {
            $.ajax({
                type: 'GET',
                url: 'query/showStatusTrunk.php',
                data: {

                },
                success: function(data) {
                    var jsonData = JSON.parse(data)

                    $.each(jsonData, function(key, value) {
                        $('#show').append(`
                      <lable>${value}</lable> <br>
                      `)
                    });
                }
            })
            $('#showstatus').val(1)
        } else {
            $('#showstatus').val(0)
            $('#show').children().remove()
        }

        $('#confirmbutton').click(function() {
            $('#writeconfirm').modal('hide')
            Writefile();
        });

        $('#closemodal').click(function() {
            $('#writeconfirm').modal('hide')
        });
    });
}); {}