function getUsers() {
    $.ajax({
        type: 'POST',
        url: 'actionQueMaster.php',
        data: 'action_type=view&' + $("#userForm").serialize(),
        success: function (html) {
            $('#userData').html(html);
        }
    });
}
function actionQueMaster(type, QuestionId) {
    QuestionId = (typeof QuestionId == "undefined") ? '' : QuestionId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var userData = '';
    if (type == 'add') {
        userData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&QuestionId=' + QuestionId;
    
    } else if (type == 'edit') {
        userData = $("#editForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        userData = 'action_type=' + type + '&QuestionId=' + QuestionId;
    }

    $.ajax({
        
        type: 'POST',
        url: 'actionQueMaster.php',
        data: userData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Question Master data has been ' + statusArr[type] + ' successfully.');
                getUsers();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editUser(QuestionId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'actionQueMaster.php',
        data: 'action_type=data&QuestionId=' + QuestionId,
        success: function (data) {
            $('#idEdit').val(data.QuestionId);
            $('#ChpaterEdit').val(data.Chapter);
            $('#BookNameEdit').val(data.BookId);
            $('#QuestionTypeEdit').val(data.QuestionType);
            $('#QuestionStringEdit').val(data.QuestionString);
            $('#McqsOptionEdit').val(data.Mcqsoption);
            
            $('#editForm').slideDown();
        }
    });
}

function formValidator() {
    // Make quick references to our fields
    var Chapter = document.getElementById('Chapter');
    var BookName = document.getElementById('BookName');
    var QuestionType = document.getElementById('QuestionType');
    var QuestionString = document.getElementById('QuestionString');
    var McqsOption = document.getElementById('McqsOption');
  

    // Check each input in the order that it appears in the form!
    if (madeSelection(Chapter, "Please enter Chapter")) {
        if (notEmpty(BookName, "Please enter BookName")) {
            if (notEmpty(QuestionType, "Please enter QuestionType")) {
                if (notEmpty(QuestionString, "Please enter QuestionString")) {
                    if (notEmpty(McqsOption, "Please enter McqsOption")) {

                        actionQueMaster('add');
                        return true;
                    }
                }
            }
        }
    }
    return false;

}

function EditformValidator() {
    // Make quick references to our fields
    var ChapterEdit = document.getElementById('ChapterEdit');
    var BookNameEdit = document.getElementById('BookNameEdit');
    var QuestionTypeEdit = document.getElementById('QuestionTypeEdit');
    var QuestionStringEdit = document.getElementById('QuestionStringEdit');
    var McqsOptionEdit = document.getElementById('McqsOptionEdit');
  

    // Check each input in the order that it appears in the form!
    if (madeSelection(ChapterEdit, "Please enter Chapter")) {
        if (notEmpty(BookNameEdit, "Please enter BookName")) {
            if (notEmpty(QuestionTypeEdit, "Please enter QuestionType")) {
                if (notEmpty(QuestionStringEdit, "Please enter QuestionString")) {
                    if (notEmpty(McqsOptionEdit, "Please enter McqsOption")) {

                        actionQueMaster('edit');
                        return true;
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
        