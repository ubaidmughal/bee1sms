$(document).ready(function () {
    load_data();
    $('#action').val("Insert");
    $('#addLinkInfo').click(function () {
        $('#addFormTeacher').slideDown();
        $('#TeacherForm')[0].reset();
        
        $('#button_action').val("Insert");
    });
    function load_data() {
        var action = "Load";
        $.ajax({
            url: "actionTeacher.php",
            method: "POST",
            data: { action: action },
            success: function (data) {
                $('#user_table').html(data);
            }
        });
    }
    $('#TeacherForm').on('submit', function (event) {
        event.preventDefault();
        var TContact = $('#TContact').val();
        var TQualification = $('#TQualification').val();
       
        if (TContact != '' && TQualification != '') {

            $.ajax({
                url: "actionTeacher.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#TeacherForm')[0].reset();
                    load_data();
                    $("#action").val("Insert");
                    $('#button_action').val("Insert");
                    
                    $('#addFormTeacher').slideUp();
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
    $(document).on('click', '.update', function () {
        var teacher_id = $(this).attr("id");
        var action = "Fetch Single Data";
        $.ajax({
            url: "actionTeacher.php",
            method: "POST",
            data: { teacher_id: teacher_id, action: action },
            dataType: "json",
            success: function (data) {
                $('#addFormTeacher').slideDown();
                $('#TContact').val(data.teachercontact);
                $('#TQualification').val(data.teacherqualification);
                $('#button_action').val("Edit");
                $('#action').val("Edit");
                $('#teacher_id').val(teacher_id);

            }
        });
    });

    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        var teacher_id = $(this).attr("id");
        var action = "delete";
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
                            url: "actionTeacher.php",
                            method: "POST",
                            data: { teacher_id: teacher_id, action: action }
                        })
                        .done(function (response) {
                            bootbox.alert(response);
                            bootbox.alert(response);
                            window.setTimeout(function () {
                                bootbox.hideAll();
                            }, 2000);
                            load_data();
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