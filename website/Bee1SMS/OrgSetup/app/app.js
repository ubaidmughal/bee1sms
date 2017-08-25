function getUsers() {
    $.ajax({
        type: 'POST',
        url: 'action.php',
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
        url: 'action.php',
        data: userData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Group data has been ' + statusArr[type] + ' successfully.');
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
        url: 'action.php',
        data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#idEdit').val(data.id);
            $('#GroupCodeEdit').val(data.GroupCode);
            $('#GroupNameEdit').val(data.GroupName);
            $('#PositionEdit').val(data.Position);
            $('#editForm').slideDown();
        }
    });
}

    function formValidator() {
        // Make quick references to our fields
        var GroupCode = document.getElementById('GroupCode');
        var GroupName = document.getElementById('GroupName');
        var Position = document.getElementById('Position');

        // Check each input in the order that it appears in the form!
        if (isNumeric(GroupCode, "Please enter only Numbers for your GroupCode")) {
            if (notEmpty(GroupName, "Please enter your GroupName")) {
                if (isNumeric(Position, "Please enter only Numbers for your Position")) {
                    action('add');
                    return true;
                }
            }
        }

        
        return false;
        
    }

    function EditformValidator() {
        // Make quick references to our fields
        var GroupCodeEdit = document.getElementById('GroupCodeEdit');
        var GroupNameEdit = document.getElementById('GroupNameEdit');
        var PositionEdit = document.getElementById('PositionEdit');

        // Check each input in the order that it appears in the form!
        if (isNumeric(GroupCodeEdit, "Please enter only Numbers for your GroupCode")) {
            if (notEmpty(GroupNameEdit, "Please enter your GroupName")) {
                if (isNumeric(PositionEdit, "Please enter only Numbers for your Position")) {
                    action('edit');
                    return true;
                }
            }
        }


        return false;

    }

function notEmpty(elem, helperMsg) {
    if (elem.value.length == false) {
        alert(helperMsg);
        elem.value = '';
        elem.focus(); // set the focus to this input
        return false;
    }
    return true;
}

function isNumeric(elem, helperMsg) {
    var numericExpression = /^[0-9]+$/;
    if (elem.value.match(numericExpression)) {
        return true;
    } else {
        alert(helperMsg);
        elem.value = '';
        elem.focus();
        return false;
    }
}

function isAlphabet(elem, helperMsg) {
    var alphaExp = /^[a-zA-Z]+$/;
    if (elem.value.match(alphaExp)) {
        return true;
    } else {
        alert(helperMsg);
        elem.value = '';
        elem.focus();
        return false;
    }
}

function isAlphanumeric(elem, helperMsg) {
    var alphaExp = /^[0-9a-zA-Z]+$/;
    if (elem.value.match(alphaExp)) {
        return true;
    } else {
        alert(helperMsg);
        elem.value = '';
        elem.focus();
        return false;
    }
}

function lengthRestriction(elem, min, max) {
    var uInput = elem.value;
    if (uInput.length >= min && uInput.length <= max) {
        return true;
    } else {
        alert("Please enter between " + min + " and " + max + " characters");
        elem.value = '';
        elem.focus();
        return false;
    }
}

function madeSelection(elem, helperMsg) {
    if (elem.value == "Please Choose") {
        alert(helperMsg);
        elem.value = '';
        elem.focus();
        return false;
    } else {
        return true;
    }
}

function emailValidator(elem, helperMsg) {
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (elem.value.match(emailExp)) {
        return true;
    } else {
        alert(helperMsg);
        elem.value = '';
        elem.focus();
        return false;
    }
        
}