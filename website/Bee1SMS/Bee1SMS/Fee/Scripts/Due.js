$(document).ready(function () {
    $('#add_button_book').click(function () {
        $('#Due_form')[0].reset();
        $('.modal-title').text("Add New Due Type");
        $('#actionDue').val("Add");
        $('#operationDue').val("Add");
        $('#DueModal').modal('show');
    });
    $('#closemodal').click(function () {

        $('#Due_form')[0].reset();

    });
    var operationDue = "fetch";
    var dataTable = $('#Due_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actionDue.php",
            type: "POST",
            data: { operationDue: operationDue }
        },
        "columnDefs": [
			{
			    "targets": [0,1],
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
     
        colReorder: true

    });

    $(document).on('submit', '#Due_form', function (event) {
        event.preventDefault();
        var due = $('#DueTypes').val();

        if (due != '') {
            $.ajax({
                url: "Actions/actionDue.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 1500);
                    $('#Due_form')[0].reset();
                   
                    $('#DueModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            
            
        }
    });

    $(document).on('click', '.updateDue', function () {
        var operationDue = "fetch_single_record";
        var DueId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionDue.php",
            method: "POST",
            data: { DueId: DueId, operationDue: operationDue },
            dataType: "json",
            success: function (data) {
                $('#DueModal').modal('show');
                $('#DueTypes').val(data.DueTypes);
              
                $('.modal-title').text("Edit Due Type");
                $('#DueId').val(DueId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionDue').val("Edit");
                $('#operationDue').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteDue', function () {
        var operationDue = "delete";
        var DueId = $(this).attr("id");
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
                            url: "Actions/actionDue.php",
                            method: "POST",
                            data: { DueId: DueId, operationDue: operationDue }
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