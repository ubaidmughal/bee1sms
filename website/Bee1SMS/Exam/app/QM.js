$(document).ready(function () {
    load_data();
    $('#actionQ').val("Insert");
    $('#addLinkInfoQM').click(function () {
        $('#addFormQM').slideDown();
        $('#QMForm')[0].reset();
        
        $('#button_actionQ').val("Insert");
    });
    function load_data() {
        var actionQ = "Load";
        $.ajax({
            url: "actionQue.php",
            method: "POST",
            data: { actionQ: actionQ },
            success: function (data) {
                $('#user_table').html(data);
            }
        });
    }
    $('#QMForm').on('submit', function (event) {
        event.preventDefault();
        var Chapter = $('#Chapter').val();
        var BookName = $('#BookName').val();
        var QuestionType = $('#QuestionType').val();
        var QuestionString = $('#QuestionString').val();
        var McqsOption = $('#McqsOption').val();
       
        if (Chapter != '' && BookName != '' && QuestionType != '' && QuestionString != '' && McqsOption != '') {

            $.ajax({
                url: "actionQue.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#QMForm')[0].reset();
                    load_data();
                    $("#actionQ").val("Insert");
                    $('#button_actionQ').val("Insert");
                    
                    $('#addFormQM').slideUp();
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
        var question_id = $(this).attr("id");
        var actionQ = "Fetch Single Data";
        $.ajax({
            url: "actionQue.php",
            method: "POST",
            data: { question_id: question_id, actionQ: actionQ },
            dataType: "json",
            success: function (data) {
                $('#addFormQM').slideDown();
                $('#Chapter').val(data.Chapter);
                $('#BookName').val(data.BookName);
                $('#QuestionType').val(data.QuestionType);
                $('#QuestionString').val(data.QuestionString);
                $('#McqsOption').val(data.McqsOption);
               
                $('#button_actionQ').val("Edit");
                $('#actionQ').val("Edit");
                $('#question_id').val(question_id);

            }
        });
    });

    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        var question_id = $(this).attr("id");
        var actionQ = "delete";
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
                            url: "actionQue.php",
                            method: "POST",
                            data: { question_id: question_id, actionQ: actionQ }
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