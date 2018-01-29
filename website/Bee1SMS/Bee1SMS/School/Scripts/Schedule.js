$(document).ready(function () {
    $('#add_button_Schedule').click(function () {
        $('#Schedule_form')[0].reset();
        $('#modal-title').text("Add Schedule Info");
        $('#actionSchedule').val("Add");
        $('#operationSchedule').val("Add");
        $('#ScheduleModal').modal('show');

    });

    var operationSchedule = "fetch";
    var dataTable = $('#Schedule_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actionSchedule.php",
            type: "POST",
            data: { operationSchedule: operationSchedule }
        },
        "columnDefs": [
			{
			    "targets": [0, 1],
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

    $(document).on('submit', '#Schedule_form', function (event) {
        event.preventDefault();
        var Class = $('#Class').val();
        if (Class != '') {
            $.ajax({
                url: "Actions/actionSchedule.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 1500);
                    $('#Schedule_form')[0].reset();
                   
                    $('#ScheduleModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {


        }
    });


    $(document).on('click', '.updateSchedule', function () {
        var operationSchedule = "fetch_single_record";
        var ScheduleId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionSchedule.php",
            method: "POST",
            data: { ScheduleId: ScheduleId, operationSchedule: operationSchedule },
            dataType: "json",
            success: function (data) {
                $('#ScheduleModal').modal('show');
                $('#Class').val(data.Class);
                $('#Section').val(data.Section);
                $('#Day').val(data.Day);
                $('#FromTime').val(data.FromTime);
                $('#ToTime').val(data.ToTime);
                $('#Subject').val(data.Subject);
                $('#Teacher').val(data.Teacher);

                $('#modal-title').text("Edit Schedule Info");
                $('#ScheduleId').val(ScheduleId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionSchedule').val("Edit");
                $('#operationSchedule').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteSchedule', function () {
        var operationSchedule = "delete";
        var ScheduleId = $(this).attr("id");
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
                            url: "Actions/actionSchedule.php",
                            method: "POST",
                            data: { ScheduleId: ScheduleId, operationSchedule: operationSchedule }
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