function getUsers() {
    $.ajax({
        type: 'POST',
        url: 'actionOrg.php',
        data: 'action_type=view&' + $("#userForm").serialize(),
        success: function (html) {
            $('#userData').html(html);
        }
    });
}
function action(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var userData = '';
    if (type == 'add') {
        userData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&id=' + id;
    } else if (type == 'edit') {
        userData = $("#editForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        userData = 'action_type=' + type + '&id=' + id;
    }
    $.ajax({
        type: 'POST',
        url: 'actionOrg.php',
        data: userData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('User data has been ' + statusArr[type] + ' successfully.');
                getUsers();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editUser(id) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'actionOrg.php',
        data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#idEdit').val(data.id);
            $('#OrgCodeEdit').val(data.OrgCode);
            $('#OrgNameEdit').val(data.OrgName);
            $('#OrgTypeEdit').val(data.OrgType);
            $('#DescriptionEdit').val(data.Description);
            $('#AddressEdit').val(data.Address);
            $('#CityEdit').val(data.City);
            $('#StateEdit').val(data.State);
            $('#ZipCodeEdit').val(data.ZipCode);
            $('#PhoneEdit').val(data.Phone);
            $('#AdminIdEdit').val(data.AdminId);
            $('#AdminPwdEdit').val(data.AdminPwd);
            $('#editForm').slideDown();
        }
    });
}