// ห้ามลบ
var id = 0;
var page = 1;
var search;
var pagination;

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
                            var html = ''
                            new_data.forEach((element, index) => {
                                html += '<tr class="text-center" id="' + element['id'] + '">'
                                html += '<th scope="row">' + ++index + '</th>'
                                html += '<td>' + element['phonenumber'] + '</td>'
                                html += '<td>' + element['owner'] + '</td>'
                                if (parseInt(element['status']) == 1) {
                                    html += '<td><button class="btn btn-success" value="' + element['id'] + '" id="Toggle">บล็อค</button></td>'
                                } else {
                                    html += '<td><button class="btn btn-success active" value="' + element['id'] + '" id="Toggle">ไม่บล็อค</button></td>'
                                }
                                html += '<td><a type="button" href="form_edit_phone.php?id=' + element['id'] + '" class="btn btn-warning">แก้ไข</a> &nbsp;'
                                html += '<button type="button" id="deletephone" value="' + element['id'] + '" class="btn btn-danger">ลบ</button></td>'
                                html += '</tr>'
                            });
                            $('#table_phone').append(html)
                            pagination += '<nav aria-label="Page navigation example">'
                            pagination += '<ul class="pagination justify-content-center">'
                            pagination += '<li class="page-item'
                            if (page == 1) {
                                pagination += ' disabled'
                            }
                            pagination += '">'
                            pagination += '<a class="page-link">Previous</a>'
                            pagination += '</li>'
                            for (let i = 0; i <= total_page - 1; i++) {
                                pagination += '<li class="page-item '
                                if (page == i + 1) {
                                    pagination += 'active'
                                }
                                pagination += '" id="page" value="' + (parseInt(i) + 1) + '"><a class="page-link" href="#">' + (parseInt(i) + 1) + '</a></li>'

                            }
                            pagination += '<li class="page-item'
                            if (page == total_page) {
                                pagination += ' disabled'
                            }

                            pagination += '">'
                            pagination += '<a class="page-link">Next</a>'
                            pagination += '</li>'
                            pagination += '</ul>'
                            pagination += '</nav>'
                            $('#pagination').append(pagination);
                        } catch {
                            console.log("Empty");
                        }
                    }
                });
            }
        }
    });
}

function changePage(pages) {
    console.log(page);
    search = $('#searchphone').val()
    console.log("page=" + pages)
    $.ajax({
        type: 'GET',
        url: 'query/queryPagination.php',
        data: {
            page: pages,
            search: search
        },
        success: function(data) {
            console.log(data)
            $(`tbody tr`).remove()
            $(`#pagination nav`).remove()
            try {
                var new_data = JSON.parse(data).PhoneDataObj;
                var total_page = JSON.parse(data).totalPage;
                var start = JSON.parse(data).start;
                var html = '';
                var pagination = '';
                new_data.forEach((element, index) => {
                    html += '<tr class="text-center" id="' + element['id'] + '">'
                    html += '<th scope="row">' + parseInt(start + ++index) + '</th>'
                    html += '<td>' + element['phonenumber'] + '</td>'
                    html += '<td>' + element['owner'] + '</td>'
                    if (parseInt(element['status']) == 0) {
                        html += '<td><button class="btn btn-success" value="' + element['id'] + '" id="Toggle">บล็อค</button></td>'
                    } else {
                        html += '<td><button class="btn btn-success active" value="' + element['id'] + '" id="Toggle">ไม่บล็อค</button></td>'
                    }
                    html += '<td><a type="button" href="form_edit_phone.php?id=' + element['id'] + '" class="btn btn-warning">แก้ไข</a> &nbsp;'
                    html += '<button type="button" id="deletephone" value="' + element['id'] + '" class="btn btn-danger">ลบ</button></td>'
                    html += '</tr>'
                });
                $('#table_phone').append(html);

                pagination += '<nav aria-label="Page navigation example">'
                pagination += '<ul class="pagination justify-content-center">'
                pagination += '<li class="page-item'
                if (page == 1) {
                    pagination += ' disabled"'
                } else {
                    pagination += '" id="page" value="' + parseInt(page - 1) + '"'
                }
                pagination += ' >'
                pagination += '<a class="page-link" href="#">Previous</a>'
                pagination += '</li>'
                for (let i = 0; i <= total_page - 1; i++) {
                    pagination += '<li class="page-item '
                    if (page == i + 1) {
                        pagination += 'active'
                    }
                    pagination += '" id="page" value="' + (parseInt(i) + 1) + '"><a class="page-link" href="#">' + (parseInt(i) + 1) + '</a></li>'
                }

                pagination += '<li class="page-item'
                if (page == total_page) {
                    pagination += ' disabled"'
                } else {
                    pagination += '" id="page" value="' + parseInt(page + 1) + '"'
                }
                pagination += ' >'
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
    $.ajax({
        type: 'POST',
        url: 'query/changeState.php',
        data: {
            id: ch_id
        },
        success: function(data) {
            var checkID = JSON.parse(data);
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
                            var html = ''
                            new_data.forEach((element, index) => {
                                html += '<tr class="text-center" id="' + element['id'] + '">'
                                html += '<th scope="row">' + ++index + '</th>'
                                html += '<td>' + element['phonenumber'] + '</td>'
                                html += '<td>' + element['owner'] + '</td>'
                                if (parseInt(element['status']) == 0) {
                                    html += '<td><button class="btn btn-success " value="' + element['id'] + '" id="Toggle">บล็อค</button></td>'
                                } else {
                                    html += '<td><button class="btn btn-success active" value="' + element['id'] + '" id="Toggle">ไม่บล็อค</button></td>'
                                }
                                html += '<td><a type="button" href="form_edit_phone.php?id=' + element['id'] + '" class="btn btn-warning">แก้ไข</a> &nbsp;'
                                html += '<button type="button" id="deletephone" value="' + element['id'] + '" class="btn btn-danger">ลบ</button></td>'
                                html += '</tr>'
                            });
                            $('#table_phone').append(html)
                            pagination += '<nav aria-label="Page navigation example">'
                            pagination += '<ul class="pagination justify-content-center">'
                            pagination += '<li class="page-item'
                            if (page == 1) {
                                pagination += ' disabled"'
                            } else {
                                pagination += '" id="page" value="' + parseInt(page - 1) + '"'
                            }
                            pagination += ' >'
                            pagination += '<a class="page-link" href="#">Previous</a>'
                            pagination += '</li>'
                            for (let i = 0; i <= total_page - 1; i++) {
                                pagination += '<li class="page-item '
                                if (page == i + 1) {
                                    pagination += 'active'
                                }
                                pagination += '" id="page" value="' + (parseInt(i) + 1) + '"><a class="page-link" href="#">' + (parseInt(i) + 1) + '</a></li>'
                            }

                            pagination += '<li class="page-item'
                            if (page == total_page) {
                                pagination += ' disabled"'
                            } else {
                                pagination += '" id="page" value="' + parseInt(page + 1) + '"'
                            }
                            pagination += ' >'
                            pagination += '<a class="page-link" href="#">Next</a>'
                            pagination += '</li>'
                            pagination += '</ul>'
                            pagination += '</nav>'
                            $('#pagination').append(pagination);
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
            console.log(data)
            $(`tbody tr`).remove()
            $(`#pagination nav`).remove()
            try {
                var new_data = JSON.parse(data).PhoneDataObj;
                var total_page = JSON.parse(data).totalPage;
                page = JSON.parse(data).page;
                var html = '';
                pagination = '';
                new_data.forEach((element, index) => {

                    html += '<tr class="text-center" id="' + element['id'] + '">'
                    html += '<th scope="row">' + ++index + '</th>'
                    html += '<td>' + element['phonenumber'] + '</td>'
                    html += '<td>' + element['owner'] + '</td>'
                    if (parseInt(element['status']) == 0) {
                        html += '<td><button class="btn btn-success" value="' + element['id'] + '" id="Toggle">บล็อค</button></td>'
                    } else {
                        html += '<td><button class="btn btn-success active" value="' + element['id'] + '" id="Toggle">ไม่บล็อค</button></td>'
                    }
                    html += '<td><a type="button" href="form_edit_phone.php?id=' + element['id'] + '" class="btn btn-warning">แก้ไข</a> &nbsp;'
                    html += '<button type="button" id="deletephone" value="' + element['id'] + '" class="btn btn-danger">ลบ</button></td>'
                    html += '</tr>'
                });
                $('#table_phone').append(html);

                pagination += '<nav aria-label="Page navigation example">'
                pagination += '<ul class="pagination justify-content-center">'
                pagination += '<li class="page-item'
                if (page == 1) {
                    pagination += ' disabled"'
                } else {
                    pagination += '" id="page" value="' + parseInt(page - 1) + '"'
                }
                pagination += ' >'
                pagination += '<a class="page-link" href="#">Previous</a>'
                pagination += '</li>'
                for (let i = 0; i <= total_page - 1; i++) {
                    pagination += '<li class="page-item '
                    if (page == i + 1) {
                        pagination += 'active'
                    }
                    pagination += '" id="page" value="' + (parseInt(i) + 1) + '"><a class="page-link" href="#">' + (parseInt(i) + 1) + '</a></li>'
                }

                pagination += '<li class="page-item'
                if (page == total_page) {
                    pagination += ' disabled"'
                } else {
                    pagination += '" id="page" value="' + parseInt(page + 1) + '"'
                }
                pagination += ' >'
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

        $('#mymodal').modal('show')
    });

    $(document).on("click", "#page", function() {
        page = $(this).val();
        console.log(page);
        changePage(page);
    });

    $('#searchphone').keyup(function() {
        page = 1
        var txt = $(this).val();
        if (txt != '') {
            $.ajax({
                url: "query/queryPagination.php",
                method: 'GET',
                data: {
                    search: txt,
                    page: page
                },
                dataType: "text",
                success: function(data) {
                    console.log(data)
                    var new_data = JSON.parse(data).PhoneDataObj
                    var rows = JSON.parse(data).rows
                    var total_page = JSON.parse(data).totalPage;
                    var html = '';
                    var pagination = '';

                    if (rows == "0") {
                        $('tbody tr').remove();
                        $(`#pagination nav`).remove()
                        $('#notfound').toast('show');
                        setTimeout(
                            function() {
                                $("#notfound").toast("hide");
                            }, 1500)
                    } else {

                        var total_page = JSON.parse(data).totalPage;
                        var pagination = '';
                        var html = '';
                        $('tbody tr').remove()
                        $(`#pagination nav`).remove()
                        new_data.forEach((element, index) => {
                            html += '<tr class="text-center" id="' + element['id'] + '">'
                            html += '<th scope="row">' + ++index + '</th>'
                            html += '<td>' + element['phonenumber'] + '</td>'
                            html += '<td>' + element['owner'] + '</td>'
                            if (parseInt(element['status']) == 0) {
                                html += '<td><button class="btn btn-success" value="' + element['id'] + '" id="Toggle">บล็อค</button></td>'
                            } else {
                                html += '<td><button class="btn btn-success active" value="' + element['id'] + '" id="Toggle">ไม่บล็อค</button></td>'
                            }
                            html += '<td><a type="button" href="form_edit_phone.php?id=' + element['id'] + '" class="btn btn-warning">แก้ไข</a> &nbsp;'
                            html += '<button type="button" id="deletephone" value="' + element['id'] + '" class="btn btn-danger">ลบ</button></td>'
                            html += '</tr>'
                        });
                        $('#table_phone').append(html);

                        pagination += '<nav aria-label="Page navigation example">'
                        pagination += '<ul class="pagination justify-content-center">'
                        pagination += '<li class="page-item'
                        if (page == 1) {
                            pagination += ' disabled"'
                        } else {
                            pagination += '" id="page" value="' + parseInt(page - 1) + '"'
                        }
                        pagination += ' >'
                        pagination += '<a class="page-link" href="#">Previous</a>'
                        pagination += '</li>'
                        for (let i = 0; i <= total_page - 1; i++) {
                            pagination += '<li class="page-item '
                            if (page == i + 1) {
                                pagination += 'active'
                            }
                            pagination += '" id="page" value="' + (parseInt(i) + 1) + '"><a class="page-link" href="#">' + (parseInt(i) + 1) + '</a></li>'
                        }

                        pagination += '<li class="page-item'
                        if (page == total_page) {
                            pagination += ' disabled"'
                        } else {
                            pagination += '" id="page" value="' + parseInt(page + 1) + '"'
                        }
                        pagination += ' >'
                        pagination += '<a class="page-link" href="#">Next</a>'
                        pagination += '</li>'
                        pagination += '</ul>'
                        pagination += '</nav>'
                        $('#pagination').append(pagination);
                    }
                }
            });
        } else {
            $.ajax({
                type: 'GET',
                url: 'query/queryPagination.php',
                success: function(data) {
                    $(`tbody tr`).remove()
                    $(`#pagination nav`).remove()
                    try {
                        var new_data = JSON.parse(data).PhoneDataObj;
                        var total_page = JSON.parse(data).totalPage;
                        var html = '';
                        var pagination = '';
                        new_data.forEach((element, index) => {
                            html += '<tr class="text-center" id="' + element['id'] + '">'
                            html += '<th scope="row">' + ++index + '</th>'
                            html += '<td>' + element['phonenumber'] + '</td>'
                            html += '<td>' + element['owner'] + '</td>'
                            if (parseInt(element['status']) == 0) {
                                html += '<td><button class="btn btn-success" value="' + element['id'] + '" id="Toggle">บล็อค</button></td>'
                            } else {
                                html += '<td><button class="btn btn-success active" value="' + element['id'] + '" id="Toggle">ไม่บล็อค</button></td>'
                            }
                            html += '<td><a type="button" href="form_edit_phone.php?id=' + element['id'] + '" class="btn btn-warning">แก้ไข</a> &nbsp;'
                            html += '<button type="button" id="deletephone" value="' + element['id'] + '" class="btn btn-danger">ลบ</button></td>'
                            html += '</tr>'
                        });
                        $('#table_phone').append(html);

                        pagination += '<nav aria-label="Page navigation example">'
                        pagination += '<ul class="pagination justify-content-center">'
                        pagination += '<li class="page-item'
                        if (page == 1) {
                            pagination += ' disabled"'
                        } else {
                            pagination += '" id="page" value="' + parseInt(page - 1) + '"'
                        }
                        pagination += ' >'
                        pagination += '<a class="page-link" href="#">Previous</a>'
                        pagination += '</li>'
                        for (let i = 0; i <= total_page - 1; i++) {
                            pagination += '<li class="page-item '
                            if (page == i + 1) {
                                pagination += 'active'
                            }
                            pagination += '" id="page" value="' + (parseInt(i) + 1) + '"><a class="page-link" href="#">' + (parseInt(i) + 1) + '</a></li>'
                        }

                        pagination += '<li class="page-item'
                        if (page == total_page) {
                            pagination += ' disabled"'
                        } else {
                            pagination += '" id="page" value="' + parseInt(page + 1) + '"'
                        }
                        pagination += ' >'
                        pagination += '<a class="page-link" href="#">Next</a>'
                        pagination += '</li>'
                        pagination += '</ul>'
                        pagination += '</nav>'
                        $('#pagination').append(pagination);
                    } catch {
                        console.log("Empty");
                    }
                }
            });
        }
    });
});