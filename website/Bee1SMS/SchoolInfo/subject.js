$(document).ready(function () {
    load_data();
    $('#actionsubject').val("Insert");
    $('#addLinkSub').click(function () {
        $('#addFormSub').slideDown();
        $('#SubForm')[0].reset();
        
        $('#button_actionsubject').val("Insert");
    });
    function load_data() {
        var actionsubject = "Load";
        $.ajax({
            url: "subjectaction.php",
            method: "POST",
            data: { actionsubject: actionsubject },
            success: function (data) {
                $('#subject_table').html(data);
            }
        });
    }
    $('#SubForm').on('submit', function (event) {
        event.preventDefault();
        var SubjectName = $('#SubjectName').val();
        
        if (SubjectName != '') {

            $.ajax({
                url: "subjectaction.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#SubForm')[0].reset();
                    load_data();
                    $("#actionsubject").val("Insert");
                    $('#button_actionsubject').val("Insert");
                    
                    $('#addFormSub').slideUp();
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
    $(document).on('click', '.updatesubject', function () {
        var Subject_id = $(this).attr("id");
        var actionsubject = "Fetch Single Data";
        $.ajax({
            url: "subjectaction.php",
            method: "POST",
            data: { Subject_id: Subject_id, actionsubject: actionsubject },
            dataType: "json",
            success: function (data) {
                $('#addFormSub').slideDown();
                $('#SubjectName').val(data.SubjectName);
                
                $('#button_actionsubject').val("Edit");
                $('#actionsubject').val("Edit");
                $('#Subject_id').val(Subject_id);

            }
        });
    });

    $(document).on('click', '.deletesubject', function (e) {
        e.preventDefault();
        var Subject_id = $(this).attr("id");
        var actionsubject = "delete";
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
                            url: "subjectaction.php",
                            method: "POST",
                            data: { Subject_id: Subject_id, actionsubject: actionsubject }
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