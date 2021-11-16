$(document).ready(function() {
    $('#main').addClass('active');
    $.ajax({
        type: 'GET',
        url: 'query/listphone.php',
        success: function(data) {
            var new_data = JSON.parse(data).PhoneDataObj;
            console.log(new_data);
            var html = "";
            new_data.forEach((element, index) => {
                $('#table_phone').append(
                    `<tr class="text-center">
                        <th scope="row">${++index}</th>
                          <td>${element['phonenumber']}</td>
                          <td>
                            <a href="#" class="btn btn-success" role="button" data-mdb-toggle="button">สถานะ</a>
                          </td>
                          <td>
                            <a type="button" id="#" href="form_edit_phone.php?id=${element['id']}" class="btn btn-warning">แก้ไข</a> &nbsp;
                            <button type="button" class="btn btn-danger">ลบ</button> 
                          </td>
                      </tr>`);
            });
        },
        error: function(error) {
            alert('error; ' + eval(error));
        }
    });
});