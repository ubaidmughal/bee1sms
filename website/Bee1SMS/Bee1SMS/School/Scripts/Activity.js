$(document).ready(function () {
    $('#add_button_Activity').click(function () {
        $('#Activity_form')[0].reset();
        $('.modal-title').text("Add Activity Info");
        $('#actionActivity').val("Add");
        $('#operationActivity').val("Add");
        $('#ActivityModal').modal('show');
    });

    var operationActivity = "fetch";
    var dataTable = $('#Activity_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actionactivity.php",
            type: "POST",
            data: { operationActivity: operationActivity }
        },
        "columnDefs": [
			{
			    "targets": [0, 1, 2,3],
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

    $(document).on('submit', '#Activity_form', function (event) {
        event.preventDefault();
        var ActivityName = $('#ActivityName').val();
        var ActivityDescription = $('#ActivityDescription').val();
       

        if (ActivityName != '' && ActivityDescription != '') {
            $.ajax({
                url: "Actions/actionactivity.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#Activity_form')[0].reset();
                    $('#ActivityModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            alert("Both Fields requireds");
        }
    });

    $(document).on('click', '.updateActivity', function () {
        var operationActivity = "fetch_single_record";
        var ActivityId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionactivity.php",
            method: "POST",
            data: { ActivityId: ActivityId, operationActivity: operationActivity },
            dataType: "json",
            success: function (data) {
                $('#ActivityModal').modal('show');
                $('#ActivityName').val(data.ActivityName);
                $('#ActivityDate').val(data.ActivityDate);
                $('#ActivityDescription').val(data.ActivityDescription);
               
                $('.modal-title').text("Edit Activity Info");
                $('#ActivityId').val(ActivityId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionActivity').val("Edit");
                $('#operationActivity').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteActivity', function () {
        var operationActivity = "delete";
        var ActivityId = $(this).attr("id");
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
                            url: "Actions/actionactivity.php",
                            method: "POST",
                            data: { ActivityId: ActivityId, operationActivity: operationActivity }
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