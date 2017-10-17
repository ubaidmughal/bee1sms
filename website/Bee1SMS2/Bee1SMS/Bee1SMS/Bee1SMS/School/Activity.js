$(document).ready(function () {
    $('#add_button_Act').click(function () {
        $('#Act_form')[0].reset();
        $('#modal-title').text("Add Activity Info");
        $('#actionAct').val("Add");
        $('#operationAct').val("Add");
        $('#ActModal').modal('show');

    });

    var dataTable = $('#Act_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "fetchActivity.php",
            type: "POST"
        },
        "columnDefs": [
			{
			    "targets": [0,1,2],
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

    $(document).on('submit', '#Act_form', function (event) {
        event.preventDefault();
        var ActivityName = $('#ActivityName').val();
        var ActivityDescription = $('#ActivityDescription').val();
        
        

        if (ActivityName != '' && ActivityDescription != '') {
            $.ajax({
                url: "insertActivity.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#Act_form')[0].reset();
                    $('#ActModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            alert("Both Fields requireds");
        }
    });

    $(document).on('click', '.updateActi', function () {
        var ActivityId = $(this).attr("id");
        $.ajax({
            url: "fetch_singleActivity.php",
            method: "POST",
            data: { ActivityId: ActivityId },
            dataType: "json",
            success: function (data) {
                $('#ActModal').modal('show');
                $('#ActivityName').val(data.ActivityName);
                $('#ActivityDescription').val(data.ActivityDescription);
                

                $('#modal-title').text("Edit Activity Info");
                $('#ActivityId').val(ActivityId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionAct').val("Edit");
                $('#operationAct').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteAct', function () {
        var ActivityId = $(this).attr("id");
        bootbox.dialog({
            message: "Are you sure you want to Delete ?",
            title: "<i Activity='glyphicon glyphicon-trash'></i> Delete !",
            buttons: {
                success: {
                    label: "No",
                    ActivityName: "btn-success",
                },
                danger: {
                    label: "Delete!",
                    ActivityName: "btn-danger",
                    callback: function () {
                        $.ajax({
                            url: "deleteActivity.php",
                            method: "POST",
                            data: { ActivityId: ActivityId }
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