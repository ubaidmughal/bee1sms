//Activities Section
    //Starts From Here
    load_data_activity();
    $('#actionactivity').val("Insert");
    $('#addLinkactivity').click(function () {
        $('#addFormactivity').slideDown();
        $('#activityForm')[0].reset();
        $('#button_actionactivity').val("Insert");
    });
    function load_data_activity() {
        var actionactivity = "Load";
        $.ajax({
            url: "activityaction.php",
            method: "POST",
            data: { actionactivity: actionactivity },
            success: function (data) {
                $('#activity_table').html(data);
            }
        });
    }
    $('#activityForm').on('submit', function (event) {
        event.preventDefault();
        var ActivityName = $('#ActivityName').val();
        var ActivityDescription = $('#ActivityDescription').val();
        if (ActivityName != '' && ActivityDescription != '') {

            $.ajax({
                url: "activityaction.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#activityForm')[0].reset();
                    load_data_activity();
                    $("#actionactivity").val("Insert");
                    $('#button_actionactivity').val("Insert");
                    $('#addFormactivity').slideUp();
                    
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
    $(document).on('click', '.updateactivity', function () {
        var Activity_id = $(this).attr("id");
        var actionactivity = "Fetch Single Data";
        $.ajax({
            url: "activityaction.php",
            method: "POST",
            data: { Activity_id: Activity_id, actionactivity: actionactivity },
            dataType: "json",
            success: function (data) {
                $('#addFormactivity').slideDown();
                $('#ActivityName').val(data.ActivityName);
                $('#ActivityDescription').val(data.ActivityDescription);
                $('#button_actionactivity').val("Edit");
                $('#actionactivity').val("Edit");
                $('#Activity_id').val(Activity_id);

            }
        });
    });
    $(document).on('click', '.deleteactivity', function (e) {
        e.preventDefault();
        var Activity_id = $(this).attr("id");
        var actionactivity = "delete";
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
                            url: "activityaction.php",
                            method: "POST",
                            data: { Activity_id: Activity_id, actionactivity: actionactivity }
                        })
                        .done(function (response) {
                            bootbox.alert(response);
                            window.setTimeout(function () {
                                bootbox.hideAll();
                            }, 2000);
                            load_data_activity();
                        })
                        .fail(function () {
                            bootbox.alert('Error....');

                        })
                    }
                }
            }
        });
    });
    //Activities Section
    //Activities Section End Here