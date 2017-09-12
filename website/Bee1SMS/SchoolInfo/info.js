$(document).ready(function () {
    load_data();
    $('#action').val("Insert");
    $('#addLinkInfo').click(function () {
        $('#addFormSInfo').slideDown();
        $('#schoolform')[0].reset();
        $('#uploaded_image').html('');
        $('#button_action').val("Insert");
    });
    function load_data() {
        var action = "Load";
        $.ajax({
            url: "infoaction.php",
            method: "POST",
            data: { action: action },
            success: function (data) {
                $('#user_table').html(data);
            }
        });
    }
    $('#schoolform').on('submit', function (event) {
        event.preventDefault();
        var SchoolName = $('#SchoolName').val();

        var extension = $('#user_image').val().split('.').pop().toLowerCase();
        if (extension != '') {
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image File");
                $('#user_image').val('');
                return false;
            }
        }
        if (SchoolName != '') {
            $.ajax({
                url: "infoaction.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    alert(data);
                    $('#schoolform')[0].reset();
                    load_data();
                    $("#action").val("Insert");
                    $('#button_action').val("Insert");
                    $('#uploaded_image').html('');
                    $('#addFormSInfo').slideUp();
                }
            });
        }
        else {
            alert("Both Fields are Required");
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
                $('#hidden_user_image').val(data.image);
                $('#button_action').val("Edit");
                $('#action').val("Edit");
                $('#user_id').val(user_id);
                
            }
        });
    });
    $(document).on('click', '.delete', function () {
        var user_id = $(this).attr("id");
        var action = "delete";
        if (confirm("Are you sure you want to remove this image from database?")) {
            $.ajax({
                url: "infoaction.php",
                method: "POST",
                data: { user_id: user_id, action: action },
                success: function (data) {
                    alert(data);
                    load_data();
                }
            })
        }
        else {
            return false;
        }
    });
});