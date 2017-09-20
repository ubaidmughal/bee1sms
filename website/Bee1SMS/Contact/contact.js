$(document).ready(function () {
    load_data();
    $('#action').val("Insert");
    $('#addLinkInfo').click(function () {
        $('#addFormCon').slideDown();
        $('#ConForm')[0].reset();
        
        $('#button_action').val("Insert");
    });
    function load_data() {
        var action = "Load";
        $.ajax({
            url: "actionContact.php",
            method: "POST",
            data: { action: action },
            success: function (data) {
                $('#user_table').html(data);
            }
        });
    }
    $('#ConForm').on('submit', function (event) {
        event.preventDefault();
        var ContactType = $('#ContactType').val();
        var Name = $('#Name').val();
        var Address = $('#Address').val();
        var Phone = $('#Phone').val();
        var Email = $('#Email').val();
        var DOB = $('#DOB').val();
        var TimeOfContact = $('#TimeOfContact').val();
        var WayOfContact = $('#WayOfContact').val();
        var Profession = $('#Profession').val();
        
        if (ContactType != '' && Name != '' && Address != '' && Phone != '' && Email != '' && DOB != '' && TimeOfContact != '' && WayOfContact != '' && Profession != '') {

            $.ajax({
                url: "actionContact.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#ConForm')[0].reset();
                    load_data();
                    $("#action").val("Insert");
                    $('#button_action').val("Insert");
                    
                    $('#addFormCon').slideUp();
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
        var contact_id = $(this).attr("id");
        var action = "Fetch Single Data";
        $.ajax({
            url: "actionContact.php",
            method: "POST",
            data: { contact_id: contact_id, action: action },
            dataType: "json",
            success: function (data) {
                $('#addFormCon').slideDown();
                $('#ContactType').val(data.ContactType);
                $('#Name').val(data.Name);
                $('#Address').val(data.Address);
                $('#Phone').val(data.Phone);
                $('#Email').val(data.Email);
                $('#DOB').val(data.DOB);
                $('#TimeOfContact').val(data.TimeOfContact);
                $('#WayOfContact').val(data.WayOfContact);
                $('#Profession').val(data.Profession);
                
                $('#button_action').val("Edit");
                $('#action').val("Edit");
                $('#contact_id').val(contact_id);

            }
        });
    });

    $(document).on('click', '.delete', function (e) {
        e.preventDefault();
        var contact_id = $(this).attr("id");
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
                            url: "actionContact.php",
                            method: "POST",
                            data: { contact_id: contact_id, action: action }
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