function getUsers() {
    $.ajax({
        type: 'POST',
        url: 'secscheduleaction.php',
        data: 'action_type=view&' + $("#userForm").serialize(),
        success: function (html) {
            $('#userData').html(html);
        }
    });
}

function action(type, id) {
    if (type == 'add') {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var userData = '';
        userData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&id=' + id;
    } else if (type == 'edit') {
        userData = $("#editForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        userData = 'action_type=' + type + '&id=' + id;
    }
    $.ajax({
        type: 'POST',
        url: 'secscheduleaction.php',
        data: userData,
        success: function (msg) {
            if (msg == 'ok') {
                 alert('Schedule data has been ' + statusArr[type] + ' successfully.');
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
        url: 'secscheduleaction.php',
        data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#idEdit').val(data.id);
            $('#FromTimeEdit').val(data.FromTime);
            $('#ToTimeEdit').val(data.ToTime);
            $('#OccursEdit').val(data.Occurs);
            $('#TeacherSubjectEdit').val(data.TeacherSubject);
            $('#editForm').slideDown();
        }
    });
}

function formValidator() {
    // Make quick references to our fields
    var FromTime = document.getElementById('FromTime');
    var ToTime = document.getElementById('ToTime');
    var Occurs = document.getElementById('Occurs');
    var TeacherSubject = document.getElementById('TeacherSubject');
  

    // Check each input in the order that it appears in the form!
    if (notEmpty(FromTime, "Please enter from time")) {
        if (notEmpty(ToTime, "Please enter to time")) {
            if (notEmpty(Occurs, "Please enter occurs")) {
                if (notEmpty(TeacherSubject, "Please enter teacher subject")) {

                    action('add');
                    return true;
                    //}
                }
            }
        }
    }

    return false;

}

function EditformValidator() {
    // Make quick references to our fields
    var FromTimeEdit = document.getElementById('FromTimeEdit');
    var ToTimeEdit = document.getElementById('ToTimeEdit');
    var OccursEdit = document.getElementById('OccursEdit');
    var TeacherSubjectEdit = document.getElementById('TeacherSubjectEdit');

    // Check each input in the order that it appears in the form!
    if (notEmpty(FromTimeEdit, "Please enter from time")) {
        if (notEmpty(ToTimeEdit, "Please enter to time")) {
            if (notEmpty(OccursEdit, "Please enter occurs")) {
                if (notEmpty(TeacherSubjectEdit, "Please enter teacher subject")) {

                    action('edit');
                    return true;
                    //}
                }
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
