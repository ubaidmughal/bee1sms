$(document).ready(function () {
    
    $('#add_button_T').click(function () {
        $('#T_form')[0].reset();
        $('.modal-title').text("Add Teacher Subject");
        $('#action').val("Add");
        $('#TModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#operation').val("Add");

        $('#TModal').modal('show');

        
    });

    var operation = "fetch";
    var dataTable = $('#T_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actionteacher.php",
            type: "POST",
            data: { operation: operation }
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

    $(document).on('submit', '#T_form', function (event) {
        event.preventDefault();
        var TeacherName = $('#TeacherName').val();
        var SubjectName = $('#SubjectName').val();


        if (TeacherName != '' && SubjectName != '') {
            $.ajax({
                url: "Actions/actionteacher.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#T_form')[0].reset();
                    $('#TModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
           
        }
    });

    $(document).on('click', '.update', function () {
        var operation = "fetch_single_record"
        var TTimeId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionteacher.php",
            method: "POST",
            data: { TTimeId: TTimeId, operation : operation },
            dataType: "json",
            success: function (data) {
                $('#TModal').modal('show');
                $('#TeacherName').val(data.TeacherName);
                
                $('#SubjectName').val(data.SubjectName);
                $('#Class').val(data.Class);
                $('#Days').val(data.Days);
                $('#FromTime').val(data.FromTime);
                $('#ToTime').val(data.ToTime);
                $('.modal-title').text("Edit Humain Resources");
                $('#TTimeId').val(TTimeId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#action').val("Edit");
                $('#operation').val("Edit");
            }
        })
    });

   

    $(document).on('click', '.delete', function () {
        var operation = "delete";
        var TTimeId = $(this).attr("id");
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
                            url: "Actions/actionteacher.php",
                            method: "POST",
                            data: { TTimeId: TTimeId, operation : operation }
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