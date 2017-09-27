$(document).ready(function () {
    load_data();
    $('#action').val("Insert");
    $('#addLinkInfo').click(function () {
        $('#addFormSInfo').slideDown();
        $('#schoolform')[0].reset();
        $('#uploaded_image').html('');
        $('#button_actionschool').val("Insert");
    });
    function load_data() {
       
        var action = "Load";
        $.ajax({
            url: "infoaction.php",
            
            method: "POST",
            data: { action: action },
            success: function (data) {

                $('#school_data').html(data);
               

            }
        });
    }
   
    $('#schoolform').on('submit', function (event) {
        event.preventDefault();
        var SchoolName = $('#SchoolName').val();
        var Reg = $('#Reg').val();
        var Address = $('#Address').val();
        var Latitude = $('#Latitude').val();
        var Longitude = $('#Longitude').val();
        var extension = $('#user_image').val().split('.').pop().toLowerCase();
        if (extension != '') {
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image File");
                $('#user_image').val('');
                return false;
            }
        }
        if (SchoolName != '' && Reg != '' && Address != '' && Latitude != '' && Longitude != '') {
            
            $.ajax({
                url: "infoaction.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#schoolform')[0].reset();
                    load_data();
                    $("#action").val("Insert");
                    $('#button_actionschool').val("Insert");
                    $('#uploaded_image').html('');
                    $('#addFormSInfo').slideUp();
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
            url: "infoaction.php",
            method: "POST",
            data: { user_id: user_id, action: action },
            dataType: "json",
            success: function (data) {
                $('#addFormSInfo').slideDown();
                $('#SchoolName').val(data.SchoolName);
                $('#Reg').val(data.Reg);
                $('#Address').val(data.Address);
                $('#Latitude').val(data.latitude);
                $('#Longitude').val(data.longitude);
                $('#uploaded_image').html(data.image);
                $('#hidden_user_image').val(data.user_image);
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
                        callback: function() {       
                            $.ajax({        
                                url: "infoaction.php",
                                method: "POST",
                                data: { user_id: user_id, action: action }
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