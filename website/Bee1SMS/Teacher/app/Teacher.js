function getUsers() {
    $.ajax({
        type: 'POST',
        url: 'actionTeacher.php',
        data: 'action_type=view&' + $("#userForm").serialize(),
        success: function (html) {
            $('#userData').html(html);
        }
    });
}
function actionTeacher(type, TId) {
    TId = (typeof TId == "undefined") ? '' : TId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var userData = '';
    if (type == 'add') {
        userData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&TId=' + TId;
    
    } else if (type == 'edit') {
        userData = $("#editForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        userData = 'action_type=' + type + '&TId=' + TId;
    }

    $.ajax({
        
        type: 'POST',
        url: 'actionTeacher.php',
        data: userData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('TeacherInfo data has been ' + statusArr[type] + ' successfully.');
                getUsers();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editUser(TId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'actionTeacher.php',
        data: 'action_type=data&TId=' + TId,
        success: function (data) {
            $('#idEdit').val(data.TId);
            $('#TeacherContactEdit').val(data.teachercontact);
            $('#TeacherQualificationEdit').val(data.teacherqualification);
            
            $('#editForm').slideDown();
        }
    });
}

function formValidator() {
    // Make quick references to our fields
    var TeacherContact = document.getElementById('TeacherContact');
    var TeacherQualification = document.getElementById('TeacherQualification');
   

    // Check each input in the order that it appears in the form!
    if (isNumeric(TeacherContact, "Please enter TeacherContact")) {
        if (notEmpty(TeacherQualification, "Please enter TeacherQualification")) {
            
                                            actionTeacher('add');
                                            return true;
                                        }
                                    }
                                


    return false;

}

function EditformValidator() {
    // Make quick references to our fields
    var TeacherContactEdit = document.getElementById('TeacherContactEdit');
    var TeacherQualificationEdit = document.getElementById('TeacherQualificationEdit');
   
    // Check each input in the order that it appears in the form!
    if (isNumeric(TeacherContactEdit, "Please enter TeacherContact")) {
        if (notEmpty(TeacherQualificationEdit, "Please enter Teacher Qualification")) {
          
                                        actionTeacher('edit');
                                        return true;
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
        