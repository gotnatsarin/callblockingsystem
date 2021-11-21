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
    var items = [];
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
            console.log(localStorage)
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