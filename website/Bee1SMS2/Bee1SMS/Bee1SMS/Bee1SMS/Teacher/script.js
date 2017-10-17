$(document).ready(function () {
    $('#add_button').click(function () {
        $('#user_form')[0].reset();
        $('.modal-title').text("Add Teacher Info");
        $('#action').val("Add");
        $('#operation').val("Add");
        $('#userModal').modal('show');
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
			    "targets": [0, 1, 2],
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
        var teachercontact = $('#teacher_contact').val();
        var teacherqualification = $('#teacher_qualification').val();


        if (teachercontact != '' && teacherqualification != '') {
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
            alert("Both Fields are Required");
        }
    });

    $(document).on('click', '.update', function () {
        var TId = $(this).attr("id");
        $.ajax({
            url: "fetch_single.php",
            method: "POST",
            data: { TId: TId },
            dataType: "json",
            success: function (data) {
                $('#userModal').modal('show');
                $('#teacher_contact').val(data.teachercontact);
                $('#teacher_qualification').val(data.teacherqualification);
                $('.modal-title').text("Edit User");
                $('#TId').val(TId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#action').val("Edit");
                $('#operation').val("Edit");
            }
        })
    });

   

    $(document).on('click', '.delete', function () {
        var TId = $(this).attr("id");
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
                            data: { TId: TId }
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