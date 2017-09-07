function getSec() {
    $.ajax({
        type: 'POST',
        url: 'secaction.php',
        data: 'action_type=view&' + $("#SecForm").serialize(),
        success: function (html) {
            $('#secData').html(html);
        }
    });
}

function actionsec(type, SectionId) {
    SectionId = (typeof SectionId == "undefined") ? '' : SectionId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var secData = '';
    if (type == 'add') {
        secData = $("#addFormSec").find('.form').serialize() + '&action_type=' + type + '&SectionId=' + SectionId;
    } else if (type == 'edit') {
        secData = $("#editFormSec").find('.form').serialize() + '&action_type=' + type;
    } else {
        secData = 'action_type=' + type + '&SectionId=' + SectionId;
    }
    $.ajax({
        type: 'POST',
        url: 'secaction.php',
        data: secData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Section has been ' + statusArr[type] + ' successfully.');
                getSec();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editSec(SectionId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'secaction.php',
        data: 'action_type=data&SectionId=' + SectionId,
        success: function (data) {
            $('#idEditSec').val(data.SectionId);
            $('#SectionNameEdit').val(data.SectionName);
            $('#editFormSec').slideDown();
        }
    });
}

function formValidatorSec() {
    // Make quick references to our fields
    var SectionName = document.getElementById('SectionName');
   

    // Check each input in the order that it appears in the form!
    if (notEmpty(SectionName, "Please enter Section Name"))
    {

        actionsec('add');
        return true;
    }
    return false;

}

function EditformValidator() {
    // Make quick references to our fields
    var SectionNameEdit = document.getElementById('SectionNameEdit');
   

    // Check each input in the order that it appears in the form!
    if (notEmpty(SectionNameEdit, "Please enter Section Name"))
    {

        actionsec('edit');
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
