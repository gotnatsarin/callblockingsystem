var id = 0;
var page = 0;

function delPhone() {
    $.ajax({
        type: 'POST',
        url: 'query/delPhone.php',
        data: {
            id: id
        },
        success: function(data) {
            var dataCheckID = JSON.parse(data)
            if (dataCheckID.status == "no ID has been found") {
                $('#noID').toast("show");
                setTimeout(
                    function() {
                        window.location.href = 'main.php';
                    }, 2000)
            } else {
                $.ajax({
                    type: 'GET',
                    url: 'query/queryPagination.php',
                    success: function(data) {
                        $(`tbody tr`).remove()
                        try {
                            var new_data = JSON.parse(data).PhoneDataObj;
                            console.log(new_data);
                            var html = ''
                            new_data.forEach((element, index) => {
                                html += '<tr class="text-center" id="' + element['id'] + '">'
                                html += '<th scope="row">' + ++index + '</th>'
                                html += '<td>' + element['phonenumber'] + '</td>'
                                html += '<td>' + element['owner'] + '</td>'
                                if (parseInt(element['status']) == 1) {
                                    html += '<td><button class="btn btn-success active" value="' + element['id'] + '" id="Toggle">บล็อค</button></td>'
                                } else {
                                    html += '<td><button class="btn btn-success" value="' + element['id'] + '" id="Toggle">ปลดบล็อค</button></td>'
                                }
                                html += '<td><a type="button" href="form_edit_phone.php?id=' + element['id'] + '" class="btn btn-warning">แก้ไข</a> &nbsp;'
                                html += '<button type="button" id="deletephone" value="' + element['id'] + '" class="btn btn-danger">ลบ</button></td>'
                                html += '</tr>'
                            });
                            $('#table_phone').append(html)
                        } catch {
                            console.log("Empty");
                        }
                    }
                });
            }
        }
    });
}

function changePage(page) {
    $.ajax({
        type: 'GET',
        url: 'query/queryPagination.php',
        data: { page: page },
        success: function(data) {
            $(`tbody tr`).remove()
            $(`#pagination nav`).remove()
            try {
                var new_data = JSON.parse(data).PhoneDataObj;
                var total_page = JSON.parse(data).totalPage;
                var html = '';
                var pagination = '';
                new_data.forEach((element, index) => {
                    console.log(element)
                    html += '<tr class="text-center" id="' + element['id'] + '">'
                    html += '<th scope="row">' + ++index + '</th>'
                    html += '<td>' + element['phonenumber'] + '</td>'
                    html += '<td>' + element['owner'] + '</td>'
                    if (parseInt(element['status']) == 1) {
                        html += '<td><button class="btn btn-success active" value="' + element['id'] + '" id="Toggle">บล็อค</button></td>'
                    } else {
                        html += '<td><button class="btn btn-success" value="' + element['id'] + '" id="Toggle">ปลดบล็อค</button></td>'
                    }
                    html += '<td><a type="button" href="form_edit_phone.php?id=' + element['id'] + '" class="btn btn-warning">แก้ไข</a> &nbsp;'
                    html += '<button type="button" id="deletephone" value="' + element['id'] + '" class="btn btn-danger">ลบ</button></td>'
                    html += '</tr>'
                });
                $('#table_phone').append(html);

                pagination += '<nav aria-label="Page navigation example">'
                pagination += '<ul class="pagination justify-content-center">'
                pagination += '<li class="page-item disabled">'
                pagination += '<a class="page-link">Previous</a>'
                pagination += '</li>'
                for (let i = 0; i <= total_page - 1; i++) {
                    pagination += '<li class="page-item" id="page" value="' + (parseInt(i) + 1) + '"><a class="page-link" href="#">' + (parseInt(i) + 1) + '</a></li>'
                }
                pagination += '<li class="page-item">'
                pagination += '<a class="page-link" href="#">Next</a>'
                pagination += '</li>'
                pagination += '</ul>'
                pagination += '</nav>'
                $('#pagination').append(pagination);
            } catch {
                console.log("Empty");
            }
        },
        error: function(error) {
            alert('error; ' + eval(error));
        }
    });
}

function triggerStatus(ch_id) {
    console.log(ch_id)
    $.ajax({
        type: 'POST',
        url: 'query/changeState.php',
        data: {
            id: ch_id
        },
        success: function(data) {
            var checkID = JSON.parse(data);
            // console.log(checkID)
            if (checkID.status == "no ID has been found") {
                $('#noID').toast("show");
                setTimeout(
                    function() {
                        window.location.href = 'main.php';
                    }, 2000)
            } else {
                $.ajax({
                    type: 'GET',
                    url: 'query/queryPagination.php',
                    success: function(data) {
                        $(`tbody tr`).remove()
                        try {
                            var new_data = JSON.parse(data).PhoneDataObj;
                            console.log(new_data);
                            var html = ''
                            new_data.forEach((element, index) => {
                                html += '<tr class="text-center" id="' + element['id'] + '">'
                                html += '<th scope="row">' + ++index + '</th>'
                                html += '<td>' + element['phonenumber'] + '</td>'
                                html += '<td>' + element['owner'] + '</td>'
                                if (parseInt(element['status']) == 1) {
                                    html += '<td><button class="btn btn-success active" value="' + element['id'] + '" id="Toggle">บล็อค</button></td>'
                                } else {
                                    html += '<td><button class="btn btn-success" value="' + element['id'] + '" id="Toggle">ปลดบล็อค</button></td>'
                                }
                                html += '<td><a type="button" href="form_edit_phone.php?id=' + element['id'] + '" class="btn btn-warning">แก้ไข</a> &nbsp;'
                                html += '<button type="button" id="deletephone" value="' + element['id'] + '" class="btn btn-danger">ลบ</button></td>'
                                html += '</tr>'
                            });
                            $('#table_phone').append(html)
                        } catch {
                            console.log("Empty");
                        }
                    }
                });
            }
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
        url: 'query/queryPagination.php',
        success: function(data) {
            $(`tbody tr`).remove()
            try {
                var new_data = JSON.parse(data).PhoneDataObj;
                var total_page = JSON.parse(data).totalPage;
                var html = '';
                var pagination = '';
                new_data.forEach((element, index) => {
                    console.log(element)
                    html += '<tr class="text-center" id="' + element['id'] + '">'
                    html += '<th scope="row">' + ++index + '</th>'
                    html += '<td>' + element['phonenumber'] + '</td>'
                    html += '<td>' + element['owner'] + '</td>'
                    if (parseInt(element['status']) == 1) {
                        html += '<td><button class="btn btn-success active" value="' + element['id'] + '" id="Toggle">บล็อค</button></td>'
                    } else {
                        html += '<td><button class="btn btn-success" value="' + element['id'] + '" id="Toggle">ปลดบล็อค</button></td>'
                    }
                    html += '<td><a type="button" href="form_edit_phone.php?id=' + element['id'] + '" class="btn btn-warning">แก้ไข</a> &nbsp;'
                    html += '<button type="button" id="deletephone" value="' + element['id'] + '" class="btn btn-danger">ลบ</button></td>'
                    html += '</tr>'
                });
                $('#table_phone').append(html);

                pagination += '<nav aria-label="Page navigation example">'
                pagination += '<ul class="pagination justify-content-center">'
                pagination += '<li class="page-item disabled">'
                pagination += '<a class="page-link">Previous</a>'
                pagination += '</li>'
                for (let i = 0; i <= total_page - 1; i++) {
                    pagination += '<li class="page-item" id="page" value="' + (parseInt(i) + 1) + '"><a class="page-link" href="#">' + (parseInt(i) + 1) + '</a></li>'
                }
                pagination += '<li class="page-item">'
                pagination += '<a class="page-link" href="#">Next</a>'
                pagination += '</li>'
                pagination += '</ul>'
                pagination += '</nav>'
                $('#pagination').append(pagination);
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

    $(document).on("click", "#Toggle", function() {
        triggerStatus($(this).val());
        $("#success").toast("show");
        setTimeout(
            function() {
                $("#success").toast("hide");
            }, 1500)
    });

    $(document).on("click", "#deletephone", function() {
        id = $(this).val();
        console.log(id);
        $('#mymodal').modal('show')
    });

    $(document).on("click", "#page", function() {
        page = $(this).val();
        changePage(page);
        console.log(page);
    });

    $('#searchphone').keyup(function() {
        var txt = $(this).val();
        if (txt != '') {
            $.ajax({
                url: "query/search.php",
                method: "post",
                data: {
                    search: txt,
                },
                dataType: "text",
                success: function(data) {
                    var new_data = JSON.parse(data).PhoneDataObj
                    console.log(data)
                    if (new_data.status == "false") {
                        $('tbody tr').remove();
                        $('#notfound').toast('show');
                        setTimeout(
                            function() {
                                $("#notfound").toast("hide");
                            }, 1500)
                    } else {
                        var new_data2 = JSON.parse(data).PhoneDataObj

                        // var total_page = JSON.parse(data).totalPage;
                        var html = '';
                        // var pagination = '';
                        $('tbody tr').remove()
                        new_data2.forEach((element, index) => {
                            html += '<tr class="text-center" id="' + element['id'] + '">'
                            html += '<th scope="row">' + ++index + '</th>'
                            html += '<td>' + element['phonenumber'] + '</td>'
                            html += '<td>' + element['owner'] + '</td>'
                            if (parseInt(element['status']) == 1) {
                                html += '<td><button class="btn btn-success active" value="' + element['id'] + '" id="Toggle">บล็อค</button></td>'
                            } else {
                                html += '<td><button class="btn btn-success" value="' + element['id'] + '" id="Toggle">ปลดบล็อค</button></td>'
                            }
                            html += '<td><a type="button" href="form_edit_phone.php?id=' + element['id'] + '" class="btn btn-warning">แก้ไข</a> &nbsp;'
                            html += '<button type="button" id="deletephone" value="' + element['id'] + '" class="btn btn-danger">ลบ</button></td>'
                            html += '</tr>'
                        });
                        $('#table_phone').append(html)

                        // pagination += '<nav aria-label="Page navigation example">'
                        // pagination += '<ul class="pagination justify-content-center">'
                        // pagination += '<li class="page-item disabled">'
                        // pagination += '<a class="page-link">Previous</a>'
                        // pagination += '</li>'
                        // for (let i = 0; i <= total_page - 1; i++) {
                        //     pagination += '<li class="page-item" id="page" value="' + (parseInt(i) + 1) + '"><a class="page-link" href="#">' + (parseInt(i) + 1) + '</a></li>'
                        // }
                        // pagination += '<li class="page-item">'
                        // pagination += '<a class="page-link" href="#">Next</a>'
                        // pagination += '</li>'
                        // pagination += '</ul>'
                        // pagination += '</nav>'

                        // $('#pagination').append(pagination);
                    }
                }
            });
        } else {
            $.ajax({
                type: 'GET',
                url: 'query/queryPagination.php',
                success: function(data) {
                    $(`tbody tr`).remove()
                    try {
                        var new_data = JSON.parse(data).PhoneDataObj;
                        var html = '';
                        // console.log(new_data);
                        new_data.forEach((element, index) => {
                            html += '<tr class="text-center" id="' + element['id'] + '">'
                            html += '<th scope="row">' + ++index + '</th>'
                            html += '<td>' + element['phonenumber'] + '</td>'
                            html += '<td>' + element['owner'] + '</td>'
                            if (parseInt(element['status']) == 1) {
                                html += '<td><button class="btn btn-success active" value="' + element['id'] + '" id="Toggle">บล็อค</button></td>'
                            } else {
                                html += '<td><button class="btn btn-success" value="' + element['id'] + '" id="Toggle">ปลดบล็อค</button></td>'
                            }
                            html += '<td><a type="button" href="form_edit_phone.php?id=' + element['id'] + '" class="btn btn-warning">แก้ไข</a> &nbsp;'
                            html += '<button type="button" id="deletephone" value="' + element['id'] + '" class="btn btn-danger">ลบ</button></td>'
                            html += '</tr>'
                        });
                        $('#table_phone').append(html)
                    } catch {
                        console.log("Empty");
                    }
                }
            });
        }
    });


});