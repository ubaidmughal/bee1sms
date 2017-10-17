$(document).ready(function () {
    $('#add_button_Subject').click(function () {
        $('#Subject_form')[0].reset();
        $('#modal-title').text("Add Subject Info");
        $('#actionSubject').val("Add");
        $('#operationSubject').val("Add");
        $('#SubjectModal').modal('show');

    });

    var dataTable = $('#Subject_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "fetchSubject.php",
            type: "POST"
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
        responsive: true,
        colReorder: true

    });

    $(document).on('submit', '#Subject_form', function (event) {
        event.preventDefault();
        var SubjectNames = $('#SubjectNames').val();
       
        

        if (SubjectNames != '') {
            $.ajax({
                url: "insertSubject.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#Subject_form')[0].reset();
                    $('#SubjectModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            alert("Both Fields requireds");
        }
    });

    $(document).on('click', '.updateSubject', function () {
        var SubjectId = $(this).attr("id");
        $.ajax({
            url: "fetch_singleSubject.php",
            method: "POST",
            data: { SubjectId: SubjectId },
            dataType: "json",
            success: function (data) {
                $('#SubjectModal').modal('show');
                $('#SubjectNames').val(data.SubjectName);
                
                
                $('#modal-title').text("Edit Subject Info");
                $('#SubjectId').val(SubjectId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionSubject').val("Edit");
                $('#operationSubject').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteSubject', function () {
        var SubjectId = $(this).attr("id");
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
                            url: "deleteSubject.php",
                            method: "POST",
                            data: { SubjectId: SubjectId }
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