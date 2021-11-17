$(document).ready(function() {
    var idroom = null;
    $('#manage_room a').addClass('active');
    const deleteThisRoom = () => {
        $('#mymodal').modal('hide')
        $.ajax({
            type: 'POST',
            url: 'query/deleteRoom.php',
            data: {
                room_id: idroom,
            },
            success: function(data) {
                if (data == "true") {
                    $.ajax({
                        type: 'GET',
                        url: 'query/showroom.php',
                        data: {},
                        success: function(data) {
                            $(`tbody tr`).remove()
                            try {
                                var new_datas = JSON.parse(data).roomObj;
                                new_datas.forEach(((element, index) => {
                                    $('#tablebody').append(`<tr>
                          <th scope='row'>${++index}</th>
                          <td class='text-center'>${element['room_name']}</td>
                          <td class='text-center'>${element['room_place']}</td>
                          <td class='text-center'>${element['room_capacity']}</td>
                          <td class='text-center'>
                          <button id='deleteroom' value=${element['room_id']} type='button' class='btn btn-danger'>ลบ</button>
                          &nbsp;<a href='form_edit_meeting_room.php?id=${element['room_id']}' class='btn btn-warning'>แก้ไข</a>
                              </td>
                            </td>
                          </tr>`)
                                    console.log(element)
                                }));
                            } catch {
                                console.log("Empty")
                            }
                        }
                    });
                    $("#delete_success").toast("show")
                } else {
                    $("#delete_fail").toast("show")
                }
            }
        });
    };

    $("#delete_success").toast({
        delay: 1500
    });

    $.ajax({
        type: 'GET',
        url: 'query/showroom.php',
        data: {},
        success: function(data) {
            try {
                var new_data = JSON.parse(data).roomObj;
                new_data.forEach(((element, index) => {
                    $('#tablebody').append(`<tr>
                    <th scope='row'>${++index}</th>
                    <td class='text-center'>${element['room_name']}</td>
                    <td class='text-center'>${element['room_place']}</td>
                    <td class='text-center'>${element['room_capacity']}</td>
                    <td class='text-center'>
                    <button id='deleteroom' value=${element['room_id']} type='button' class='btn btn-danger'>ลบ</button>
                    &nbsp;<a href='form_edit_meeting_room.php?id=${element['room_id']}' class='btn btn-warning'>แก้ไข</a>
                          </td>
                        </td>
                    </tr>`)
                    console.log(element)
                }));
            } catch {
                console.log("Empty")
            }
        }
    });

    $('#confirmdelete').click(function() {
        deleteThisRoom();
    });

    $('#closemodal').click(function() {
        $('#mymodal').modal('hide')
    });

    $(document).on("click", "#deleteroom", function() {
        idroom = $(this).val();
        $('#mymodal').modal('show')
    });

});