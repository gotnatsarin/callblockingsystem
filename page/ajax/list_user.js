$(document).ready(function() {
    $.ajax({
        type: 'post',
        url: 'query/showuser.php',
        data: {},
        success: function(data) {
            var new_data = JSON.parse(data).userObj;
            console.log(new_data);
            new_data.forEach(((element, index) => {
                $('#tbuser').append(`
              <tr>
                <td>${++index}</td>
                <td class="text-center">${element['username']}</td>
                <td class="text-center">
                  <button href="form_superadmin_changepass.php?id=${element['id']}" class="btn btn-warning">แก้ไขบัญชีผู้ใช้</button>
                  <button type="button" onClick="javascript: delUser(${element['id']});" class="btn btn-danger">ลบ</button>
                </td>
              </tr>
              `);
            }));
        }
    })
});