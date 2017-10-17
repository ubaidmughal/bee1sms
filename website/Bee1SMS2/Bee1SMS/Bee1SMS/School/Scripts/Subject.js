$(document).ready(function () {
    $('#add_button_Subject').click(function () {
        $('#Subject_form')[0].reset();
        $('#modal-title').text("Add Subject Info");
        $('#actionSubject').val("Add");
        $('#operationSubject').val("Add");
        $('#SubjectModal').modal('show');

    });

    var operationSubject = "fetch";
    var dataTable = $('#Subject_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actionsubject.php",
            type: "POST",
            data: { operationSubject: operationSubject }
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
                url: "Actions/actionsubject.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 1500);
                    $('#Subject_form')[0].reset();
                    $('#SubjectNames').css('border', '');
                    $('#suberror').hide();
                    $('#SubjectModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            
            HideBorder();
        }
    });
    $("input").blur(function () {
        HideBorder();
    });
    function HideBorder() {
        var SubjectNames = $('#SubjectNames').val();
        if (SubjectNames == '') {
            $("#SubjectNames").css('border', '1px solid red');
            $('#suberror').show();
            $('#SubjectNames').focus();
            return false;
        }
        else {
            $('#SubjectNames').css('border', '1px solid green');
            $('#suberror').hide();
        }

        return true;
    }

    $(document).on('click', '.updateSubject', function () {
        var operationSubject = "fetch_single_record";
        var SubjectId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionsubject.php",
            method: "POST",
            data: { SubjectId: SubjectId, operationSubject: operationSubject },
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
        var operationSubject = "delete";
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
                            url: "Actions/actionsubject.php",
                            method: "POST",
                            data: { SubjectId: SubjectId, operationSubject: operationSubject }
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