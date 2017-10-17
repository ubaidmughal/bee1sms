$(document).ready(function () {
    $('#add_button_Sch').click(function () {
        $('#Sch_form')[0].reset();
        $('.modal-title').text("Add Schedule Info");
        $('#actionSch').val("Add");
        $('#SchModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#operationSch').val("Add");
        
        $('#SchModal').modal('show');
    });

    var operationSch = "fetch";
    var dataTable = $('#Sch_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actionschedule.php",
            type: "POST",
            data: { operationSch: operationSch }
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

    $(document).on('submit', '#Sch_form', function (event) {
        event.preventDefault();
        var FromTime = $('#FromTime').val();
        var ToTime = $('#ToTime').val();
        var Occurs = $('#Occurs').val();
        var TeacherSubject = $('#TeacherSubject').val();

        if (FromTime != '' && ToTime != '' && Occurs != '' && TeacherSubject != '') {
            $.ajax({
                url: "Actions/actionschedule.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#Sch_form')[0].reset();
                    $('#SchModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            alert("Both Fields requireds");
        }
    });

    $(document).on('click', '.updateSch', function () {
        var operationSch = "fetch_single_record";
        var ClassSectionId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionschedule.php",
            method: "POST",
            data: { ClassSectionId: ClassSectionId, operationSch: operationSch },
            dataType: "json",
            success: function (data) {
                $('#SchModal').modal('show');
                $('#FromTime').val(data.FromTime);
                $('#ToTime').val(data.ToTime);
                $('#Occurs').val(data.Occurs);
                $('#TeacherSubject').val(data.TeacherSubject);
                $('.modal-title').text("Edit Schedule Info");
                $('#ClassSectionId').val(ClassSectionId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionSch').val("Edit");
                $('#operationSch').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteSch', function () {
        var operationSch = "delete";
        var ClassSectionId = $(this).attr("id");
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
                            url: "Actions/actionschedule.php",
                            method: "POST",
                            data: { ClassSectionId: ClassSectionId, operationSch: operationSch }
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