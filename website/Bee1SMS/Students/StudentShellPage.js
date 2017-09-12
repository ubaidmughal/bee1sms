
//Activity Section Script
function getUsers() {
    $.ajax({
        type: 'POST',
        url: 'activityaction.php',
        data: 'action_type=view&' + $("#userForm").serialize(),
        success: function (html) {
            $('#userData').html(html);
        }
    });
}

function action(type, ActivityId) {
    ActivityId = (typeof ActivityId == "undefined") ? '' : ActivityId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var userData = '';
    if (type == 'add') {
        userData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&ActivityId=' + ActivityId;
    } else if (type == 'edit') {
        userData = $("#editForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        userData = 'action_type=' + type + '&ActivityId=' + ActivityId;
    }
    $.ajax({
        type: 'POST',
        url: 'activityaction.php',
        data: userData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Activity has been ' + statusArr[type] + ' successfully.');
                getUsers();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editUser(ActivityId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'activityaction.php',
        data: 'action_type=data&ActivityId=' + ActivityId,
        success: function (data) {
            $('#IdEdit').val(data.ActivityId);
            $('#ActivityNameEdit').val(data.ActivityName);
            $('#ActDescriptionEdit').val(data.ActivityDescription);
            $('#editForm').slideDown();
        }
    });
}

function formValidator() {
    // Make quick references to our fields
    var ActivityName = document.getElementById('ActivityName');
    var ActivityDescription = document.getElementById('ActDescription');


    // Check each input in the order that it appears in the form!
    if (notEmpty(ActivityName, "Please enter Activity Name")) {
        if (notEmpty(ActivityDescription, "Please enter Activity Description")) {

            action('add');
            return true;
        }
    }
                                        



    return false;

}

function EditformValidator() {
    // Make quick references to our fields
    var ActivityNameEdit = document.getElementById('ActivityNameEdit');
    var ActDescriptionEdit = document.getElementById('ActDescriptionEdit');
  

    // Check each input in the order that it appears in the form!
    if (notEmpty(ActivityNameEdit, "Please enter Activity Name")) {
        if (notEmpty(ActDescriptionEdit, "Please Activity Description")) {

            action('edit');
            return true;
          

        }
    }
    return false;

}


//Class Section Scripts
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
    if (notEmpty(ClassName, "Please enter Class")) {
        actionClass('add');
        return true;
    }



    return false;

}

function EditformValidatorClass() {
    // Make quick references to our fields
    var ClassNameEdit = document.getElementById('ClassNameEdit');


    // Check each input in the order that it appears in the form!
    if (notEmpty(ClassNameEdit, "Please enter Class")) {

        actionClass('edit');
        return true;

    }


    return false;

}


//Section Section Script

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
    if (notEmpty(SectionName, "Please enter Section Name")) {

        actionsec('add');
        return true;
    }
    return false;

}

function EditformValidatorSec() {
    // Make quick references to our fields
    var SectionNameEdit = document.getElementById('SectionNameEdit');


    // Check each input in the order that it appears in the form!
    if (notEmpty(SectionNameEdit, "Please enter Section Name")) {

        actionsec('edit');
        return true;
    }


    return false;

}

//Student Section Script
function getStudents() {
    $.ajax({
        type: 'POST',
        url: 'Studentaction.php',
        data: 'action_type=view&' + $("#StdForm").serialize(),
        success: function (html) {
            $('#stdData').html(html);
        }
    });
}

function actionstd(type, StudentId) {
    StudentId = (typeof StudentId == "undefined") ? '' : StudentId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var stdData = '';
    if (type == 'add') {
        stdData = $("#addFormStd").find('.form').serialize() + '&action_type=' + type + '&StudentId=' + StudentId;
    } else if (type == 'edit') {
        stdData = $("#editFormStd").find('.form').serialize() + '&action_type=' + type;
    } else {
        stdData = 'action_type=' + type + '&StudentId=' + StudentId;
    }
    $.ajax({
        type: 'POST',
        url: 'Studentaction.php',
        data: stdData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Student data has been ' + statusArr[type] + ' successfully.');
                getStudents();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editStd(StudentId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'Studentaction.php',
        data: 'action_type=data&StudentId=' + StudentId,
        success: function (data) {
            $('#idEditStd').val(data.StudentId);
            $('#StudentCodeEdit').val(data.StudentCode);
            $('#StudentNameEdit').val(data.StudentName);
            $('#FamilyGroupEdit').val(data.FamilyGroup);
            $('#NameOfGroupEdit').val(data.NameOfGroup);
            $('input[type="radio"]:checked').val(data.Gender);
            $('#FatherNameEdit').val(data.FatherName);

            $('#ClassEdit').val(data.Class);
            $('#SectionEdit').val(data.Section);
            $('#AgeEdit').val(data.Age);
            $('#DOBEdit').val(data.DOB);
            $('#ContactPersonEdit').val(data.ContactPerson);
            $('#AddressEdit').val(data.Address);
            $('#editFormStd').slideDown();
        }
    });
}

function formValidatorStd() {
    // Make quick references to our fields
    var StudentCode = document.getElementById('StudentCode');
    var StudentName = document.getElementById('StudentName');
    var FamilyGroup = document.getElementById('FamilyGroup');
    var NameOfGroup = document.getElementById('NameOfGroup');
    var FatherName = document.getElementById('FatherName');
    var Class = document.getElementById('Class');
    var Section = document.getElementById('Section');
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
                                if (madeSelection(Class, "Please select Class")) {
                                    if (madeSelection(Section, "Please select Section")) {
                                        // if (notEmpty(StudentName, "Please enter your GroupName")) {
                                        if (notEmpty(Address, "Please enter Address")) {
                                            if (isNumeric(ContactPerson, "Please enter only Numbers for Contact Person")) {
                                                actionstd('add');
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
        }
    }


    return false;

}

function EditformValidatorStd() {
    // Make quick references to our fields
    var StudentCodeEdit = document.getElementById('StudentCodeEdit');
    var StudentNameEdit = document.getElementById('StudentNameEdit');
    var FamilyGroupEdit = document.getElementById('FamilyGroupEdit');
    var NameOfGroupEdit = document.getElementById('NameOfGroupEdit');
    var FatherNameEdit = document.getElementById('FatherNameEdit');
    var ClassEdit = document.getElementById('ClassEdit');
    var SectionEdit = document.getElementById('SectionEdit');
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
                        if (madeSelection(ClassEdit, "Please select Class")) {
                            if (madeSelection(SectionEdit, "Please select Section")) {
                                if (isNumeric(AgeEdit, "Please enter Age in Numbers")) {
                                    if (madeSelection(DOBEdit, "Please select Date Of Birth")) {
                                        // if (notEmpty(StudentName, "Please enter your GroupName")) {
                                        if (notEmpty(AddressEdit, "Please enter Address")) {
                                            if (isNumeric(ContactPersonEdit, "Please enter only Numbers for Contact Person")) {
                                                actionstd('edit');
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
        }
    }


    return false;

}

//Subject Section Script
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
    if (notEmpty(SubjectName, "Please enter Subject Name")) {

        actionsub('add');
        return true;
    }


    return false;

}

function EditformValidatorSub() {
    // Make quick references to our fields
    var SubjectNameEdit = document.getElementById('SubjectNameEdit');


    // Check each input in the order that it appears in the form!
    if (notEmpty(SubjectNameEdit, "Please enter Subject Name")) {

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

function McqsOptionValidator(elem, helperMsg) {
    var McqsOptionExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (elem.value.match(McqsOptionExp)) {
        return true;
    } else {
        alert(helperMsg);
        elem.value = '';
        elem.focus();
        return false;
    }

}
