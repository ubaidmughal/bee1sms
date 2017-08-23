function getUsers() {
    $.ajax({
        type: 'POST',
        url: 'actionMenu.php',
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
        url: 'actionMenu.php',
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
        url: 'actionMenu.php',
        data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#idEdit').val(data.id);
            $('#MenuCodeEdit').val(data.MenuCode);
            $('#MenuNameEdit').val(data.MenuName);
            $('#MenuTypeEdit').val(data.MenuType);
            $('#GroupCodeEdit').val(data.GroupCode);
            $('#PositionEdit').val(data.Position);
            $('#TitleEdit').val(data.Title);
            $('#DetailEdit').val(data.Detail);
            $('#editForm').slideDown();
        }
    });
}