function getSub() {
    $.ajax({
        type: 'POST',
        url: 'subjectaction.php',
        data: 'action_type=view&' + $("#SubForm").serialize(),
        success: function (html) {
            $('#subData').html(html);
        }
    });
}

function actionsub(type, SubjectId) {
    SubjectId = (typeof SubjectId == "undefined") ? '' : SubjectId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var subData = '';
    if (type == 'add') {
        subData = $("#addFormSub").find('.form').serialize() + '&action_type=' + type + '&SubjectId=' + SubjectId;
    } else if (type == 'edit') {
        subData = $("#editFormSub").find('.form').serialize() + '&action_type=' + type;
    } else {
        subData = 'action_type=' + type + '&SubjectId=' + SubjectId;
    }
    $.ajax({
        type: 'POST',
        url: 'subjectaction.php',
        data: subData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Subject has been ' + statusArr[type] + ' successfully.');
                getSub();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editSub(SubjectId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'subjectaction.php',
        data: 'action_type=data&SubjectId=' + SubjectId,
        success: function (data) {
            $('#idEditSub').val(data.SubjectId);
            $('#SubjectNameEdit').val(data.SubjectName);
            $('#editFormSub').slideDown();
        }
    });
}

function formValidatorSub() {
    // Make quick references to our fields
    var SubjectName = document.getElementById('SubjectName');
   

    // Check each input in the order that it appears in the form!
    if (notEmpty(SubjectName, "Please enter Subject Name"))
    {

        actionsub('add');
        return true;
    }


    return false;

}

function EditformValidatorSub() {
    // Make quick references to our fields
    var SubjectNameEdit = document.getElementById('SubjectNameEdit');
  

    // Check each input in the order that it appears in the form!
    if (notEmpty(SubjectNameEdit, "Please enter Subject Name"))
    {

        actionsub('edit');
        return true;
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
