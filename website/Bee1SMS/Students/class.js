function getClass() {
    $.ajax({
        type: 'POST',
        url: 'classaction.php',
        data: 'action_type=view&' + $("#ClassForm").serialize(),
        success: function (html) {
            $('#ClassData').html(html);
        }
    });
}

function actionClass(type, ClassId) {
    ClassId = (typeof ClassId == "undefined") ? '' : ClassId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var ClassData = '';
    if (type == 'add') {
        ClassData = $("#addFormClass").find('.form').serialize() + '&action_type=' + type + '&ClassId=' + ClassId;
    } else if (type == 'edit') {
        ClassData = $("#editFormClass").find('.form').serialize() + '&action_type=' + type;
    } else {
        ClassData = 'action_type=' + type + '&ClassId=' + ClassId;
    }
    $.ajax({
        type: 'POST',
        url: 'classaction.php',
        data: ClassData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Class has been ' + statusArr[type] + ' successfully.');
                getClass();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editClass(ClassId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'classaction.php',
        data: 'action_type=data&ClassId=' + ClassId,
        success: function (data) {
            $('#idEditClass').val(data.ClassId);
            $('#ClassNameEdit').val(data.ClassName);
            $('#editFormClass').slideDown();
        }
    });
}

function formValidatorClass() {
    // Make quick references to our fields
    var ClassName = document.getElementById('ClassName');
   

    // Check each input in the order that it appears in the form!
    if (notEmpty(ClassName, "Please enter Class"))
    {
        actionClass('add');
        return true;
    }
                                


    return false;

}

function EditformValidator() {
    // Make quick references to our fields
    var ClassNameEdit = document.getElementById('ClassNameEdit');
    

    // Check each input in the order that it appears in the form!
    if (notEmpty(ClassNameEdit, "Please enter Class"))
    {

        actionClass('edit');
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
