var i = 0
function delPhone() {
  console.log(id)
    $.ajax({
        type: 'POST',
        url: 'query/delPhone.php',
        data: {
            id: id
        },
        success: function(data) {
            $.ajax({
                type: 'GET',
                url: 'query/listphone.php',
                success: function(data) {
                    $(`tbody tr`).remove()
                    try {
                        var new_data = JSON.parse(data).PhoneDataObj;
                        console.log(new_data);
                        new_data.forEach((element, index) => {
                            $('#table_phone').append(
                                `<tr class="text-center" id="tr${element['id']}">
                            <th scope="row">${++index}</th>
                              <td>${element['phonenumber']}</td>
                              <td>
                                <button class="btn btn-success" id="Toggle">สถานะ</button>
                              </td>
                              <td>
                                <a type="button" href="form_edit_phone.php?id=${element['id']}" class="btn btn-warning">แก้ไข</a> &nbsp;
                                <button type="button" id="deletephone" value="${element['id']}" class="btn btn-danger">ลบ</button> 
                              </td>
                          </tr>`);
                        });
                    } catch {
                        console.log("Empty");
                    }
                }
            });
        }
    });
}

$(document).ready(function() {
    $('#main').addClass('active');

    $("#Toggle").toggle(function() {
        $(this).css("background-color", "green");
    }, function() {
        $(this).css("background-color", "red");
    });
    $.ajax({
        type: 'GET',
        url: 'query/listphone.php',
        success: function(data) {
            $(`tbody tr`).remove()
            try {
                var new_data = JSON.parse(data).PhoneDataObj;
                console.log(new_data);
                new_data.forEach((element, index) => {
                    $('#table_phone').append(
                        `<tr class="text-center" id="tr${element['id']}">
                        <th scope="row">${++index}</th>
                          <td>${element['phonenumber']}</td>
                          <td>
                            <button class="btn btn-success" id="Toggle">สถานะ</button>
                          </td>
                          <td>
                            <a type="button" href="form_edit_phone.php?id=${element['id']}" class="btn btn-warning">แก้ไข</a> &nbsp;
                            <button type="button" id="deletephone" value="${element['id']}" class="btn btn-danger">ลบ</button> 
                          </td>
                      </tr>`);
                });
            } catch {
                console.log("Empty");
            }
        },
        error: function(error) {
            alert('error; ' + eval(error));
        }
    });

    $('#confirmdelete').click(function() {
      $('#mymodal').modal('hide')
      delPhone();
    });

    $('#closemodal').click(function() {
        $('#mymodal').modal('hide')
    });

    $(document).on("click", "#deletephone", function() {
        id = $(this).val();
        console.log(id);
        $('#mymodal').modal('show')
    });

});