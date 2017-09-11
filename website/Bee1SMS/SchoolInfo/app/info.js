
$(document).ready(function () {

    fetch_data();

    function fetch_data() {
        var action = "fetch";
        $.ajax({
            url: "infoaction.php",
            method: "POST",
            data: { action: action },
            success: function (data) {
                $('#image_data').html(data);
            }
        })
    }
    $('#addLinkInfo').click(function () {
        $('#addFormSInfo').slideDown();
        $('#schoolform')[0].reset();
        
        $('#image_id').val('');
        $('#action').val('insert');
        $('#insert').val("Insert");
    });
    $('#schoolform').submit(function (event) {
        event.preventDefault();
        var image_name = $('#image').val();
        if (image_name == '') {
            alert("Please Select Image");
            return false;
        }
        else {
            var extension = $('#image').val().split('.').pop().toLowerCase();
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image File");
                $('#image').val('');
                return false;
            }
            else {
                $.ajax({
                    url: "infoaction.php",
                    method: "POST",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        alert(data);
                        fetch_data();
                        $('#schoolform')[0].reset();
                        $('#imageModal').modal('hide');
                    }
                });
            }
        }
    });
    $(document).on('click', '.update', function () {
        $('#image_id').val($(this).attr("id"));
        $('#action').val("update");
        
        $('#insert').val("Update");
        $('#addFormSInfo').slideDown();
    });
    $(document).on('click', '.delete', function () {
        var image_id = $(this).attr("id");
        var action = "delete";
        if (confirm("Are you sure you want to remove this image from database?")) {
            $.ajax({
                url: "infoaction.php",
                method: "POST",
                data: { image_id: image_id, action: action },
                success: function (data) {
                    alert(data);
                    fetch_data();
                }
            })
        }
        else {
            return false;
        }
    });
});
