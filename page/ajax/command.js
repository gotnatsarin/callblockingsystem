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
        var inbound = $('#inbound_trunk').val();
        var outbound = $('#outbound_trunk').val();
        var port1 = $('#Port1').val();
        var port2 = $('#Port2').val();

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
            $.ajax({

            })
        }
    });
});