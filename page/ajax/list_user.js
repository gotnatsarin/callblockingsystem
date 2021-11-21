function delUser() {
    console.log(id);
    $.ajax({
        type: 'POST',
        url: 'query/deleteuser.php',
        data: {
            id: id
        },
        success: function(data) {
            $('tbody tr').remove()
            items = [];
            $.ajax({
                type: 'GET',
                url: 'query/showuser.php',
                data: {},
                success: function(data) {
                    var new_data = JSON.parse(data).userObj;
                    console.log(new_data);
                    new_data.forEach(((element, index) => {
                        items.push(element.username)
                        $('#tbuser').append(`
                    <tr>
                      <td>${++index}</td>
                      <td class="text-center">${element['username']}</td>
                      <td class="text-center">
                        <button href="form_superadmin_changepass.php?id=${element['id']}" class="btn btn-warning">แก้ไขบัญชีผู้ใช้</button>
                        <button type="button" id="deleteuser" value="${element['id']}" class="btn btn-danger">ลบ</button>
                      </td>
                    </tr>
                    `);
                    }));
                    localStorage.setItem('username', items)
                }
            })
        }
    });
}

$(document).ready(function() {
    $.ajax({
        type: 'GET',
        url: 'query/showuser.php',
        data: {},
        success: function(data) {
            var html = ''
            var new_data = JSON.parse(data).userObj;
            console.log(new_data);
            new_data.forEach(((element, index) => {
                html += '<tr>'
                html += '<td>' + ++index + '</td>'
                html += '<td class="text-center">' + element['username'] + '</td>'
                html += '<td class="text-left">'
                html += '<button href="form_superadmin_changepass.php?id=" '+ element['id'] + ' " class="btn btn-warning">แก้ไขบัญชีผู้ใช้</button>'
                if (element['role'] == 1) {
                    html += '&nbsp;<button type="button" id="deleteuser" value="' + element['id'] + '" class="btn btn-danger">ลบ</button>'
                }
                html += '</td>'
                html += '</tr>'
            }));
            $('#tbuser').append(html)
        }
    })

    $('#confirmdelete').click(function() {
        $('#mymodal').modal('hide')
        delUser();
    });

    $('#closemodal').click(function() {
        $('#mymodal').modal('hide')
    });

    $(document).on("click", "#deleteuser", function() {
        id = $(this).val();
        console.log(id);
        $('#mymodal').modal('show')
    });
});