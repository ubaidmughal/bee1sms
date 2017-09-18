function getClassSchedule() {
    $.ajax({
        type: 'POST',
        url: 'classscheduleaction.php',
        data: 'action_type=view&' + $("#ScheduleForm").serialize(),
        success: function (html) {
            $('#ScheduleData').html(html);
        }
    });
}

function actionSchedule(type, ClassSectionId) {
    ClassSectionId = (typeof ClassSectionId == "undefined") ? '' : ClassSectionId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var userData = '';
    if (type == 'add') {
        userData = $("#ScheduleForm").find('.form').serialize() + '&action_type=' + type + '&ClassSectionId=' + ClassSectionId;
    } else if (type == 'edit') {
        userData = $("#ScheduleeditForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        userData = 'action_type=' + type + '&ClassSectionId=' + ClassSectionId;
    }
    $.ajax({
        type: 'POST',
        url: 'classscheduleaction.php',
        data: userData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Schedule has been ' + statusArr[type] + ' successfully.');
                getClassSchedule();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editSchedule(ClassSectionId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'classscheduleaction.php',
        data: 'action_type=data&ClassSectionId=' + ClassSectionId,
        success: function (data) {
            $('#ClassSectionIdEdit').val(data.ClassSectionId);
            $('#FromTimeEdit').val(data.FromTime);
            $('#ToTimeEdit').val(data.ToTime);
            $('#OccursEdit').val(data.Occurs);
            $('#TeacherSubjectEdit').val(data.TeacherSubject);
            $('#ScheduleeditForm').slideDown();
        }
    });
}

function formValidatorSchedule() {
    // Make quick references to our fields
    var StudentCode = document.getElementById('StudentCode');
    var StudentName = document.getElementById('StudentName');
    var FamilyGroup = document.getElementById('FamilyGroup');
    var NameOfGroup = document.getElementById('NameOfGroup');
    var FatherName = document.getElementById('FatherName');
    var Age = document.getElementById('Age');
    var DOB = document.getElementById('DOB');
   // var Gender = document.getElementById('GroupName');
    var Address = document.getElementById('Address');
    var ContactPerson = document.getElementById('ContactPerson');

    // Check each input in the order that it appears in the form!
    if (isNumeric(StudentCode, "Please enter only Numbers for Student Code")) {
        if (notEmpty(StudentName, "Please enter your GroupName")) {
            if (notEmpty(FamilyGroup, "Please enter Family Group")) {
                if (notEmpty(NameOfGroup, "Please enter Name of Group")) {
                    if (notEmpty(FatherName, "Please enter Father Name")) {
                        if (isNumeric(Age, "Please enter Age in Numbers")) {
                            if (madeSelection(DOB, "Please select Date Of Birth")) {
                               // if (notEmpty(StudentName, "Please enter your GroupName")) {
                                    if (notEmpty(Address, "Please enter Address")) {
                                        if (isNumeric(ContactPerson, "Please enter only Numbers for Contact Person")) {
                                            actionSchedule('add');
                                            return true;
                                        //}
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }


    return false;

}

function EditformValidatorSchedule() {
    // Make quick references to our fields
    var StudentCodeEdit = document.getElementById('StudentCodeEdit');
    var StudentNameEdit = document.getElementById('StudentNameEdit');
    var FamilyGroupEdit = document.getElementById('FamilyGroupEdit');
    var NameOfGroupEdit = document.getElementById('NameOfGroupEdit');
    var FatherNameEdit = document.getElementById('FatherNameEdit');
    var AgeEdit = document.getElementById('AgeEdit');
    var DOBEdit = document.getElementById('DOBEdit');
    // var Gender = document.getElementById('GroupName');
    var AddressEdit = document.getElementById('AddressEdit');
    var ContactPersonEdit = document.getElementById('ContactPersonEdit');

    // Check each input in the order that it appears in the form!
    if (isNumeric(StudentCodeEdit, "Please enter only Numbers for Student Code")) {
        if (notEmpty(StudentNameEdit, "Please enter your GroupName")) {
            if (notEmpty(FamilyGroupEdit, "Please enter Family Group")) {
                if (notEmpty(NameOfGroupEdit, "Please enter Name of Group")) {
                    if (notEmpty(FatherNameEdit, "Please enter Father Name")) {
                        if (isNumeric(AgeEdit, "Please enter Age in Numbers")) {
                            if (madeSelection(DOBEdit, "Please select Date Of Birth")) {
                                // if (notEmpty(StudentName, "Please enter your GroupName")) {
                                if (notEmpty(AddressEdit, "Please enter Address")) {
                                    if (isNumeric(ContactPersonEdit, "Please enter only Numbers for Contact Person")) {
                                        actionSchedule('edit');
                                        return true;
                                        //}
                                    }
                                }
                            }
                        }
                    }
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
