$(document).ready(function () {
    
    $('#add_button').click(function () {
        $('#user_form')[0].reset();
        $('.modal-title').text("Add Humain Resources Info");
        $('#action').val("Add");
        $('#userModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#operation').val("Add");
        
        $('#userModal').modal('show');

        var operation = "max_code";
        var EmpId = $(this).attr("id");
        $.ajax({
            url: "insert.php",
            method: "POST",
            data: { EmpId: EmpId, operation: operation },
            dataType: "json",
            success: function (data) {
                $('#EmpCode').val(data.EmpCode);
            }
        })
    });

    var dataTable = $('#user_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "fetch.php",
            type: "POST"
        },
        "columnDefs": [
			{
			    "targets": [0,1,2,3,4,5,6],
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

    $(document).on('submit', '#user_form', function (event) {
        event.preventDefault();
        var FirstName = $('#FirstName').val();
        var LastName = $('#LastName').val();


        if (FirstName != '' && LastName != '') {
            $.ajax({
                url: "insert.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#user_form')[0].reset();
                    $('#userModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
           
        }
    });

    $(document).on('click', '.update', function () {
        var EmpId = $(this).attr("id");
        $.ajax({
            url: "fetch_single.php",
            method: "POST",
            data: { EmpId: EmpId },
            dataType: "json",
            success: function (data) {
                $('#userModal').modal('show');
                $('#EmpCode').val(data.EmpCode);
                $('#FirstName').val(data.FirstName);
                $('#LastName').val(data.LastName);
                $('#JobTitle').val(data.JobTitle);
                $('#Designation').val(data.Designation);
                $('#HierDate').val(data.HireDate);
                $('.modal-title').text("Edit Humain Resources");
                $('#EmpId').val(EmpId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#action').val("Edit");
                $('#operation').val("Edit");
            }
        })
    });

   

    $(document).on('click', '.delete', function () {
        var EmpId = $(this).attr("id");
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
                            url: "delete.php",
                            method: "POST",
                            data: { EmpId: EmpId }
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