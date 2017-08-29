function getUsers() {
    $.ajax({
        type: 'POST',
        url: 'infoaction.php',
        data: 'action_type=view&' + $("#userForm").serialize(),
        success: function (html) {
            $('#userData').html(html);
        }
    });
}
function infoaction(type, SchoolId) {
    SchoolId = (typeof SchoolId == "undefined") ? '' : SchoolId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var userData = '';
    if (type == 'add') {
        var extension = $('#logo').val().split('.').pop().toLowerCase();
        if (extension != '') {
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image File");
                $('#logo').val('');
                return false;
            }
        }
        userData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&SchoolId=' + SchoolId;
    
    } else if (type == 'edit') {
        userData = $("#editForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        userData = 'action_type=' + type + '&SchoolId=' + SchoolId;
    }

    $.ajax({
        
        type: 'POST',
        url: 'infoaction.php',
        data: userData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('SchoolInfo data has been ' + statusArr[type] + ' successfully.');
                getUsers();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editUser(SchoolId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'infoaction.php',
        data: 'action_type=data&SchoolId=' + SchoolId,
        success: function (data) {
            $('#idEdit').val(data.SchoolId);
            $('#SchoolNameEdit').val(data.SchoolName);
            $('#LogoEdit').val(data.Logo);
            $('#RegEdit').val(data.Reg);
            $('#AdressEdit').val(data.Address);
            $('#LatitudeEdit').val(data.latitude);
            $('#LongitudeEdit').val(data.Longitude);
            $('#editForm').slideDown();
        }
    });
}


