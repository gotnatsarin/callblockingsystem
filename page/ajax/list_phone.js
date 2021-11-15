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
            html += "<tr>";
            html += "<th scope='row'>" + (++index) + "</th>";
            html += "<td class='text-center'>" + element['phonenumber'] + "</td>";
            html += "<td>" + element['status'] + "</td>";
            html += "<td>";
            html += "<a type='button' id='#' href='form_edit_phone.php' class='btn btn-warning'>แก้ไข</a> &nbsp;";
            html += "<button type='button' id='#' class='btn btn-danger'>ลบ</button>";
            html += "</td>";
            html += "</tr>";
        });
        $('#table_phone').html(html);
    },
    error: function (error) {
        alert('error; ' + eval(error));
    }
  });
});
