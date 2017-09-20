$(document).ready(function () {
    load_data();
    $('#action').val("Insert");
    $('#addLinkInfo').click(function () {
        $('#addFormAdmin').slideDown();
        $('#AdminForm')[0].reset();
        
        $('#button_action').val("Insert");
    });
    function load_data() {
        var action = "Load";
        $.ajax({
            url: "actionAdmin.php",
            method: "POST",
            data: { action: action },
            success: function (data) {
                $('#user_table').html(data);
            }
        });
    }
    $('#AdminForm').on('submit', function (event) {
        event.preventDefault();
        var UserName = $('#UserName').val();
        var Email = $('#Email').val();
        var DateReg = $('#DateReg').val();
        var Password = $('#Password').val();
     
        
        if (UserName != '' && Email != '' && DateReg != '' && Password != '') {

            $.ajax({
                url: "actionAdmin.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#AdminForm')[0].reset();
                    load_data();
                    $("#action").val("Insert");
                    $('#button_action').val("Insert");
                    $('#uploaded_image').html('');
                    $('#addFormAdmin').slideUp();
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
        var user_id = $(this).attr("id");
        var action = "Fetch Single Data";
        $.ajax({
            url: "actionAdmin.php",
            method: "POST",
            data: { user_id: user_id, action: action },
            dataType: "json",
            success: function (data) {
                $('#addFormAdmin').slideDown();
                $('#UserName').val(data.UserName);
                $('#Email').val(data.Email);
                $('#DateReg').val(data.DateReg);
                $('#Password').val(data.Password);
                $('#Longitude').val(data.longitude);
               
                $('#button_action').val("Edit");
                $('#action').val("Edit");
                $('#user_id').val(user_id);

            }
        });
    });

    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        var user_id = $(this).attr("id");
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
                            url: "actionAdmin.php",
                            method: "POST",
                            data: { user_id: user_id, action: action }
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