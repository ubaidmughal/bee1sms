function getUsers() {
    $.ajax({
        type: 'POST',
        url: 'actionContact.php',
        data: 'action_type=view&' + $("#userForm").serialize(),
        success: function (html) {
            $('#userData').html(html);
        }
    });
}
function actionContact(type, ContactId) {
    ContactId = (typeof ContactId == "undefined") ? '' : ContactId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var userData = '';
    if (type == 'add') {
        userData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&ContactId=' + ContactId;
    
    } else if (type == 'edit') {
        userData = $("#editForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        userData = 'action_type=' + type + '&ContactId=' + ContactId;
    }

    $.ajax({
        
        type: 'POST',
        url: 'actionContact.php',
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
function editUser(ContactId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'actionContact.php',
        data: 'action_type=data&ContactId=' + ContactId,
        success: function (data) {
            $('#idEdit').val(data.ContactId);
            $('#ContactTypeEdit').val(data.ContactType);
            $('#NameEdit').val(data.Name);
            $('#AddressEdit').val(data.Address);
            $('#PhoneEdit').val(data.Phone);
            $('#EmailEdit').val(data.Email);
            $('#DOBEdit').val(data.DOB);
            $('#TimeofContactEdit').val(data.TimeofContact);
            $('#WayOfContactEdit').val(data.WayOfContact);
            $('#ProfessionEdit').val(data.Profession);
            $('#editForm').slideDown();
        }
    });
}
