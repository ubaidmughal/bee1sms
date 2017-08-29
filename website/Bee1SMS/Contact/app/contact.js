function getUsers() {
    $.ajax({
        type: 'POST',
        url: 'actionContact.php',
        data: 'action_type=view&' + $("#userForm").serialize(),
        success: function (html) {
            $('#userData').html(html);
        }
    });
}
function actionContact(type, ContactId) {
    ContactId = (typeof ContactId == "undefined") ? '' : ContactId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var userData = '';
    if (type == 'add') {
        userData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&ContactId=' + ContactId;
    
    } else if (type == 'edit') {
        userData = $("#editForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        userData = 'action_type=' + type + '&ContactId=' + ContactId;
    }

    $.ajax({
        
        type: 'POST',
        url: 'actionContact.php',
        data: userData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('SchoolInfo data has been ' + statusArr[type] + ' successfully.');
                getUsers();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editUser(ContactId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'actionContact.php',
        data: 'action_type=data&ContactId=' + ContactId,
        success: function (data) {
            $('#idEdit').val(data.ContactId);
            $('#ContactTypeEdit').val(data.ContactType);
            $('#NameEdit').val(data.Name);
            $('#AddressEdit').val(data.Address);
            $('#PhoneEdit').val(data.Phone);
            $('#EmailEdit').val(data.Email);
            $('#DOBEdit').val(data.DOB);
            $('#TimeOfContactEdit').val(data.TimeOfContact);
            $('#WayOfContactEdit').val(data.WayOfContact);
            $('#ProfessionEdit').val(data.Profession);
            $('#editForm').slideDown();
        }
    });
}

function formValidator() {
    // Make quick references to our fields
    var ContactType = document.getElementById('ContactType');
    var Name = document.getElementById('Name');
    var Phone = document.getElementById('Phone');
    var Address = document.getElementById('Address');
    var Email = document.getElementById('Email');
    var DOB = document.getElementById('DOB');
    var TimeOfContact = document.getElementById('TimeOfContact');
    var WayOfContact = document.getElementById('WayOfContact');
    var Profession = document.getElementById('Profession');

    // Check each input in the order that it appears in the form!
    if (madeSelection(ContactType, "Please enter ContactType")) {
        if (notEmpty(Name, "Please enter Name")) {
            if (isNumeric(Phone, "Please enter Phone Number")) {
                if (notEmpty(Address, "Please enter Address")) {
                    if (emailValidator(Email, "Please enter Email")) {
                        if (notEmpty(DOB, "Please ente DOB")) {
                            if (notEmpty(TimeOfContact, "Please enter TimeOfContact")) {
                                if (notEmpty(WayOfContact, "Please enter WayOfContact")) {
                                    if (notEmpty(Profession, "Please enter Profession ")) {
                                            actionContact('add');
                                            return true;
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

function EditformValidator() {
    // Make quick references to our fields
    var ContactTypeEdit = document.getElementById('ContactTypeEdit');
    var NameEdit = document.getElementById('NameEdit');
    var PhoneEdit = document.getElementById('PhoneEdit');
    var AddressEdit = document.getElementById('AddressEdit');
    var EmailEdit = document.getElementById('EmailEdit');
    var DOBEdit = document.getElementById('DOBEdit');
    var TimeOfContactEdit = document.getElementById('TimeOfContactEdit');
    var WayOfContactEdit = document.getElementById('WayOfContactEdit');
    var ProfessionEdit = document.getElementById('ProfessionEdit');

    // Check each input in the order that it appears in the form!
    if (madeSelection(ContactTypeEdit, "Please enter ContactType")) {
        if (notEmpty(NameEdit, "Please enter Name")) {
            if (isNumeric(PhoneEdit, "Please enter phone Number")) {
                if (notEmpty(AddressEdit, "Please enter Address")) {
                    if (emailValidator(EmailEdit, "Please enter Email")) {
                        if (notEmpty(DOBEdit, "Please enter DOB")) {
                            if (notEmpty(TimeOfContactEdit, "Please enter TimeOfContact")) {
                                if (notEmpty(WayOfContactEdit, "Please enter WayOfContact")) {
                                    if (notEmpty(ProfessionEdit, "Please enter Profession")) {
                                        actionContact('edit');
                                        return true;
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
        