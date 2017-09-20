$(document).ready(function () {
    load_data();
    $('#actionschedule').val("Insert");
    $('#addLinkSchedule').click(function () {
        $('#addFormSchedule').slideDown();
        $('#ScheduleForm')[0].reset();
        
        $('#button_actionschedule').val("Insert");
    });
    function load_data() {
        var actionschedule = "Load";
        $.ajax({
            url: "actionSchedule.php",
            method: "POST",
            data: { actionschedule: actionschedule },
            success: function (data) {
                $('#schedule_table').html(data);
            }
        });
    }
    $('#ScheduleForm').on('submit', function (event) {
        event.preventDefault();
        var FromTime = $('#FromTime').val();
        var ToTime = $('#ToTime').val();
        var Occurs = $('#Occurs').val();
        var TeacherSubject = $('#TeacherSubject').val();
        
        if (FromTime != '' && ToTime != '' && Occurs != '' && TeacherSubject != '') {
            
            $.ajax({
                url: "actionSchedule.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#ScheduleForm')[0].reset();
                    load_data();
                    $("#actionschedule").val("Insert");
                    $('#button_actionschedule').val("Insert");
                    
                    $('#addFormSchedule').slideUp();
                }
            });
        }
        else {
            var ev = event;
            return (function () {
                var form = $(this);

                form.addClass("form--valid");

                var controller = new snapkitValidation(form);

                //Prevent form from being submitted
                if (!form.hasClass("form--valid")) {
                    ev.preventDefault();
                }
            });
        }
    });
    $(document).on('click', '.updateschedule', function () {
        var schedule_id = $(this).attr("id");
        var actionschedule = "Fetch Single Data";
        $.ajax({
            url: "actionSchedule.php",
            method: "POST",
            data: { schedule_id: schedule_id, actionschedule: actionschedule },
            dataType: "json",
            success: function (data) {
                $('#addFormSchedule').slideDown();
                $('#FromTime').val(data.FromTime);
                $('#ToTime').val(data.ToTime);
                $('#Occurs').val(data.Occurs);
                $('#TeacherSubject').val(data.TeacherSubject);
                
                $('#button_actionschedule').val("Edit");
                $('#actionschedule').val("Edit");
                $('#schedule_id').val(schedule_id);
                
            }
        });
    });

    $(document).on('click', '.deleteschedule', function (e) {
        e.preventDefault();
        var schedule_id = $(this).attr("id");
        var actionschedule = "delete";
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
                        callback: function() {       
                            $.ajax({        
                                url: "actionSchedule.php",
                                method: "POST",
                                data: { schedule_id: schedule_id, actionschedule: actionschedule }
                            })
                            .done(function(response){        
                                bootbox.alert(response);
                                bootbox.alert(response);
                                window.setTimeout(function () {
                                    bootbox.hideAll();
                                }, 2000);
                                load_data();
                            })
                            .fail(function(){        
                                bootbox.alert('Error....');

                            })              
                        }
                    }
                }
            });   
    });
});