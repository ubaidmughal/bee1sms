﻿function getQM() {
    $.ajax({
        type: 'POST',
        url: 'actionQue.php',
        data: 'action_type=view&' + $("#QMForm").serialize(),
        success: function (html) {
            $('#QMData').html(html);
        }
    });
}
function actionQue(type, QuestionId) {
    QuestionId = (typeof QuestionId == "undefined") ? '' : QuestionId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var QMData = '';
    if (type == 'add') {
        QMData = $("#addFormQM").find('.form').serialize() + '&action_type=' + type + '&QuestionId=' + QuestionId;

    } else if (type == 'edit') {
        QMData = $("#editFormQM").find('.form').serialize() + '&action_type=' + type;
    } else {
        QMData = 'action_type=' + type + '&QuestionId=' + QuestionId;
    }

    $.ajax({

        type: 'POST',
        url: 'actionQue.php',
        data: QMData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Question Master data has been ' + statusArr[type] + ' successfully.');
                getQM();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editQM(QuestionId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'actionQue.php',
        data: 'action_type=data&QuestionId=' + QuestionId,
        success: function (data) {
            $('#idEditQM').val(data.QuestionId);
            $('#ChapterEdit').val(data.Chapter);
            $('#BookIdEdit').val(data.BookId);
            $('#QuestionTypeEdit').val(data.QuestionType);
            $('#QuestionStringEdit').val(data.QuestionString);
            $('#McqsOptionEdit').val(data.McqsOption);
            $('#editFormQM').slideDown();
        }
    });
}

function formValidatorQM() {
    // Make quick references to our fields
    var Chapter = document.getElementById('Chapter');
    var BookId = document.getElementById('BookId');
    var QuestionType = document.getElementById('QuestionType');
    var QuestionString = document.getElementById('QuestionString');
    var McqsOption = document.getElementById('McqsOption');


    // Check each input in the order that it appears in the form!
    if (notEmpty(Chapter, "Please enter Chapter")) {
        if (notEmpty(BookId, "Please enter BookId")) {
            if (notEmpty(QuestionType, "Please enter QuestionType")) {
                if (notEmpty(QuestionString, "Please enter QuestionString")) {
                    if (notEmpty(McqsOption, "Please enter McqsOption")) {

                        actionQue('add');
                        return true;
                    }
                }
            }
        }
    }




    return false;

}

function EditformValidatorQM() {
    // Make quick references to our fields
    var ChapterEdit = document.getElementById('ChapterEdit');
    var BookIdEdit = document.getElementById('BookIdEdit');
    var QuestionTypeEdit = document.getElementById('QuestionTypeEdit');
    var QuestionStringEdit = document.getElementById('QuestionStringEdit');
    var McqsOptionEdit = document.getElementById('McqsOptionEdit');


    // Check each input in the order that it appears in the form!
    if (notEmpty(ChapterEdit, "Please enter chapter no")) {
        if (notEmpty(BookIdEdit, "Please enter BookId")) {
            if (notEmpty(QuestionTypeEdit, "Please enter QuestionType")) {
                if (notEmpty(QuestionStringEdit, "Please enter QuestionString")) {
                    if (notEmpty(McqsOptionEdit, "Please enter Contact Person")) {

                        actionQue('edit');
                        return true;
                    }
                }
            }
        }
    }


    return false;

}




function getBM() {
    $.ajax({
        type: 'POST',
        url: 'actionBM.php',
        data: 'action_type=view&' + $("#BMForm").serialize(),
        success: function (html) {
            $('#BMData').html(html);
        }
    });
}
function actionBM(type, BookId) {
    BookId = (typeof BookId == "undefined") ? '' : BookId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var BMData = '';
    if (type == 'add') {
        BMData = $("#addFormBM").find('.form').serialize() + '&action_type=' + type + '&BookId=' + BookId;

    } else if (type == 'edit') {
        BMData = $("#editFormBM").find('.form').serialize() + '&action_type=' + type;
    } else {
        BMData = 'action_type=' + type + '&BookId=' + BookId;
    }

    $.ajax({

        type: 'POST',
        url: 'actionBM.php',
        data: BMData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Book Master data has been ' + statusArr[type] + ' successfully.');
                getBM();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editUserBM(BookId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'actionBM.php',
        data: 'action_type=data&BookId=' + BookId,
        success: function (data) {
            $('#idEditBM').val(data.BookId);
            $('#BookNameEdit').val(data.BookName);
            $('#AuthorEdit').val(data.Author);
            $('#PublisherEdit').val(data.Publisher);
            $('#ContactPersonEdit').val(data.ContactPerson);
            $('#editFormBM').slideDown();
        }
    });
}

function formValidatorBM() {
    // Make quick references to our fields
    var BookName = document.getElementById('BookName');
    var Author = document.getElementById('Author');
    var Publisher = document.getElementById('Publisher');
    var ContactPerson = document.getElementById('ContactPerson');


    // Check each input in the order that it appears in the form!
    if (notEmpty(BookName, "Please enter BookName")) {
        if (notEmpty(Author, "Please enter Author")) {
            if (notEmpty(Publisher, "Please enter Publisher")) {
                if (notEmpty(ContactPerson, "Please enter ContactPerson")) {

                    actionBM('add');
                    return true;
                }
            }
        }
    }





    return false;

}

function editFormBMValidatorBM() {
    // Make quick references to our fields
    var BookNameEdit = document.getElementById('BookNameEdit');
    var AuthorEdit = document.getElementById('AuthorEdit');
    var PublisherEdit = document.getElementById('PublisherEdit');
    var ContactPersonEdit = document.getElementById('ContactPersonEdit');


    // Check each input in the order that it appears in the form!
    if (notEmpty(BookNameEdit, "Please enter BookName")) {
        if (notEmpty(AuthorEdit, "Please enter Author")) {
            if (notEmpty(PublisherEdit, "Please enter Publisher")) {
                if (notEmpty(ContactPersonEdit, "Please enter Contact Person")) {

                    actionBM('edit');
                    return true;
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
