$(document).ready(function () {
    $('#add_button_UType').click(function () {
        $('#UType_form')[0].reset();
        $('.modal-title').text("Add UserType Info");
        $('#actionUType').val("Add");
        $('#UTypeModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#operationUType').val("Add");
        
        $('#UTypeModal').modal('show');
    });

    var operationUType = "fetch";
    var dataTable = $('#UType_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actionUType.php",
            type: "POST",
            data: { operationUType: operationUType }
        },
        "columnDefs": [
			{
			    "targets": [0,1],
			    "orderable": false,
			   
			    
			},
        ],
        dom: 'Bfrtip',
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
        {
            extend: 'collection',
            text: 'Tools',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis', 'pageLength'],
            
        }
        ],
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        
        colReorder: true

    });

    $(document).on('submit', '#UType_form', function (event) {
        event.preventDefault();
        var UserType = $('#UserType').val();
        

        if (UserType != '') {
            $.ajax({
                url: "Actions/actionUType.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#UType_form')[0].reset();
                    $('#UTypeModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            alert("Both Fields requireds");
        }
    });

    $(document).on('click', '.updateUType', function () {
        var operationUType = "fetch_single_record";
        var UTypeId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionUType.php",
            method: "POST",
            data: { UTypeId: UTypeId, operationUType: operationUType },
            dataType: "json",
            success: function (data) {
                $('#UTypeModal').modal('show');
                
                $('#UserType').val(data.UserType);
           
                $('.modal-title').text("Edit UType Info");
                $('#UTypeId').val(UTypeId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionUType').val("Edit");
                $('#operationUType').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteUType', function () {
        var operationUType = "delete";
        var UTypeId = $(this).attr("id");
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
                            url: "Actions/actionUType.php",
                            method: "POST",
                            data: { UTypeId: UTypeId, operationUType: operationUType }
                        })
                        .done(function (response) {
                            bootbox.alert(response);
                            bootbox.alert(response);
                            window.setTimeout(function () {
                                bootbox.hideAll();
                            }, 2000);
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