function getUsers() {
    $.ajax({
        type: 'POST',
        url: 'actionBM.php',
        data: 'action_type=view&' + $("#userForm").serialize(),
        success: function (html) {
            $('#userData').html(html);
        }
    });
}
function actionBM(type, BookId) {
    BookId = (typeof BookId == "undefined") ? '' : BookId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var userData = '';
    if (type == 'add') {
        userData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&BookId=' + BookId;
    
    } else if (type == 'edit') {
        userData = $("#editForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        userData = 'action_type=' + type + '&BookId=' + BookId;
    }

    $.ajax({
        
        type: 'POST',
        url: 'actionBM.php',
        data: userData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Book Master data has been ' + statusArr[type] + ' successfully.');
                getUsers();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editUser(BookId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'actionBM.php',
        data: 'action_type=data&BookId=' + BookId,
        success: function (data) {
            $('#idEdit').val(data.BookId);
            $('#BookNameEdit').val(data.BookName);
            $('#AuthorEdit').val(data.Author);
            $('#PublisherEdit').val(data.Publisher);
            $('#ContactPersonEdit').val(data.ContactPerson);
            $('#editForm').slideDown();
        }
    });
}

function formValidator() {
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

function EditformValidator() {
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

            function ContactPersonValidator(elem, helperMsg) {
                var ContactPersonExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                if (elem.value.match(ContactPersonExp)) {
                    return true;
                } else {
                    alert(helperMsg);
                    elem.value = '';
                    elem.focus();
                    return false;
                }

            }
        