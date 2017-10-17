$(document).ready(function () {
    $('#add_button_Class').click(function () {
        $('#Class_form')[0].reset();
        $('#modal-title').text("Add Class Info");
        $('#actionClass').val("Add");
        $('#operationClass').val("Add");
        $('#ClassModal').modal('show');

    });

    var dataTable = $('#Class_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "fetchClass.php",
            type: "POST"
        },
        "columnDefs": [
			{
			    "targets": [0,1,2,3],
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

    $(document).on('submit', '#Class_form', function (event) {
        event.preventDefault();
        var ClassName = $('#ClassName').val();
        var Section = $('#Section').val();
        var SubjectName = $('#SubjectName').val();
        

        if (ClassName != '' && SubjectName != '') {
            $.ajax({
                url: "insertClass.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#Class_form')[0].reset();
                    $('#ClassModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            alert("Both Fields requireds");
        }
    });

    $(document).on('click', '.updateClass', function () {
        var ClassId = $(this).attr("id");
        $.ajax({
            url: "fetch_singleClass.php",
            method: "POST",
            data: { ClassId: ClassId },
            dataType: "json",
            success: function (data) {
                $('#ClassModal').modal('show');
                $('#ClassName').val(data.ClassName);
                $('#Section').val(data.Section);
                $('#SubjectName').val(data.SubjectName);
                
                $('#modal-title').text("Edit Class Info");
                $('#ClassId').val(ClassId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionClass').val("Edit");
                $('#operationClass').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteClass', function () {
        var ClassId = $(this).attr("id");
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
                            url: "deleteClass.php",
                            method: "POST",
                            data: { ClassId: ClassId }
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