$(document).ready(function () {
    $('#add_button_book').click(function () {
        $('#book_form')[0].reset();
        $('.modal-title').text("Add book Info");
        $('#actionbook').val("Add");
        $('#operationBM').val("Add");
        $('#BookModal').modal('show');
    });
    $('#closemodal').click(function () {

        $('#book_form')[0].reset();

    });
    var operationBM = "fetch";
    var dataTable = $('#Book_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actionBM.php",
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
                url: "Actions/actionBM.php",
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
                   
                    $('#BookModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            
            
        }
    });

    $(document).on('click', '.updateBM', function () {
        var operationBM = "fetch_single_record";
        var BookId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionBM.php",
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
                            url: "Actions/actionBM.php",
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
  

});