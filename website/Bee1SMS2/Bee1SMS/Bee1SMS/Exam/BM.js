$(document).ready(function () {
    $('#add_button_book').click(function () {
        $('#book_form')[0].reset();
        $('.modal-title').text("Add book Info");
        $('#actionbook').val("Add");
        $('#operationBM').val("Add");
        $('#BookModal').modal('show');
    });

    var operationBM = "fetch";
    var dataTable = $('#Book_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "actionBM.php",
            type: "POST",
            data: { operationBM: operationBM }
        },
        "columnDefs": [
			{
			    "targets": [0,1,2,3,4],
			    "orderable": false,
			},
        ],
        dom: 'Bfrtip',
        buttons: [
        {
            extend: 'collection',
            text: 'Tools',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']
        }
        ],
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
        colReorder: true

    });

    $(document).on('submit', '#book_form', function (event) {
        event.preventDefault();
        var booknames = $('#BookNames').val();
        var author = $('#Author').val();
        var publisher = $('#Publisher').val();
        var contactperson = $('#ContactPerson').val();

        if (booknames != '' && author != '' && publisher != '' && contactperson != '') {
            $.ajax({
                url: "actionBM.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 1500);
                    $('#book_form')[0].reset();
                    resetBorder();
                    $('#BookModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            
            HideBorder();
        }
    });

    $(document).on('click', '.updateBM', function () {
        var operationBM = "fetch_single_record";
        var BookId = $(this).attr("id");
        $.ajax({
            url: "actionBM.php",
            method: "POST",
            data: { BookId: BookId, operationBM: operationBM },
            dataType: "json",
            success: function (data) {
                $('#BookModal').modal('show');
                $('#BookNames').val(data.booknames);
                $('#Author').val(data.author);
                $('#Publisher').val(data.publisher);
                $('#ContactPerson').val(data.contactperson);
                $('.modal-title').text("Edit Book Info");
                $('#BookId').val(BookId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionbook').val("Edit");
                $('#operationBM').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteBM', function () {
        var operationBM = "delete";
        var BookId = $(this).attr("id");
        bootbox.dialog({
            message: "Are you sure you want to Delete ?",
            title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
            buttons: {
                success: {
                    label: "No",
                    className: "btn-success",
                },
                danger: {
                    label: "Delete!",
                    className: "btn-danger",
                    callback: function () {
                        $.ajax({
                            url: "actionBM.php",
                            method: "POST",
                            data: { BookId: BookId, operationBM: operationBM }
                        })
                        .done(function (response) {
                            bootbox.alert(response);
                            bootbox.alert(response);
                            window.setTimeout(function () {
                                bootbox.hideAll();
                            }, 1500);
                            dataTable.ajax.reload();
                        })
                        .fail(function () {
                            bootbox.alert('Error....');

                        })
                    }
                }
            }
        });
    });
    $("input").blur(function () {
        HideBorder();
    });

    function HideBorder() {
        if ($('#BookNames').val() == '') {
            $("#BookNames").css('border', '1px solid red');
            $('#bnameerror').show();
            $('#BookNames').focus();
            return false;
        }
        else {
            $('#BookNames').css('border', '1px solid green');
            $('#bnameerror').hide();
        }
        if ($('#Author').val() == '') {
            $("#Author").css('border', '1px solid red');
            $('#authorerror').show();
            $('#Author').focus();
            return false;
        }
        else {
            $('#Author').css('border', '1px solid green');
            $('#authorerror').hide();
        }
        if ($('#Publisher').val() == '') {
            $("#Publisher").css('border', '1px solid red');
            $('#publisherror').show();
            $('#Publisher').focus();
            return false;
        }
        else {
            $('#Publisher').css('border', '1px solid green');
            $('#publisherror').hide();
        }
        if ($('#ContactPerson').val() == '') {
            $("#ContactPerson").css('border', '1px solid red');
            $('#cpersonerror').show();
            $('#ContactPerson').focus();
            return false;
        }
        else {
            $('#ContactPerson').css('border', '1px solid green');
            $('#cperson').hide();
        }

        return true;
    }

    function resetBorder() {
        $("#BookNames").css('border', '');
        $("#Author").css('border', '');
        $("#Publisher").css('border', '');
        $("#ContactPerson").css('border', '');
        $('#bnameerror').hide();
        $('#authorerror').hide();
        $('#publisherror').hide();
        $('#cpersonerror').hide();
    }

});