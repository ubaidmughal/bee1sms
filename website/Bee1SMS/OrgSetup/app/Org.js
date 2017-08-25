function getUsers() {
    $.ajax({
        type: 'POST',
        url: 'Orgaction.php',
        data: 'action_type=view&' + $("#userForm").serialize(),
        success: function (html) {
            $('#userData').html(html);
        }
    });
}
function Orgaction(type, id) {
    id = (typeof id == "undefined") ? '' : id;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var userData = '';
    if (type == 'add') {
        userData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&id=' + id;
    } else if (type == 'edit') {
        userData = $("#editForm").find('.form').serialize() + '&action_type=' + type;
    } else {
        userData = 'action_type=' + type + '&id=' + id;
    }
    $.ajax({
        type: 'POST',
        url: 'Orgaction.php',
        data: userData,
        success: function (msg) {
            if (msg == 'ok') {
                alert('Organization data has been ' + statusArr[type] + ' successfully.');
                getUsers();
                $('.form')[0].reset();
                $('.formData').slideUp();
            } else {
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editUser(id) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'Orgaction.php',
        data: 'action_type=data&id=' + id,
        success: function (data) {
            $('#idEdit').val(data.id);
            $('#OrgCodeEdit').val(data.OrgCode);
            $('#OrgNameEdit').val(data.OrgName);
            $('#OrgTypeEdit').val(data.OrgType);
            $('#DescriptionEdit').val(data.Description);
            $('#AddressEdit').val(data.Address);
            $('#CityEdit').val(data.City);
            $('#StateEdit').val(data.State);
            $('#ZipCodeEdit').val(data.ZipCode);
            $('#PhoneEdit').val(data.Phone);
            $('#AdminIdEdit').val(data.AdminId);
            $('#AdminPwdEdit').val(data.AdminPwd);
            $('#editForm').slideDown();
        }
    });
}



function formValidator() {
    // Make quick references to our fields
    var OrgCode = document.getElementById('OrgCode');
    var OrgName = document.getElementById('OrgName');
    var OrgType = document.getElementById('OrgType');
    var Description = document.getElementById('Description');
    var Address = document.getElementById('Address');
    var City = document.getElementById('City');
    var State = document.getElementById('State');
    var ZipCode = document.getElementById('ZipCode');
    var Phone = document.getElementById('Phone');
    var AdminId = document.getElementById('AdminId');
    var AdminPwd = document.getElementById('AdminPwd');

    // Check each input in the order that it appears in the form!
    if (isNumeric(OrgCode, "Please enter only Numbers for your OrganizationCode")) {
        if (notEmpty(OrgName, "Please enter your OrganizationName")) {
            if (notEmpty(OrgType, "Please enter your OrganizationType")) {
                if (notEmpty(Description, "Please enter your Description")) {
                    if (notEmpty(Address, "Please enter your Address")) {
                        if (notEmpty(City, "Please enter your City")) {
                            if (notEmpty(State, "Please enter your State")) {
                                if (isNumeric(ZipCode, "Please enter only Numbers for your ZipCode")) {
                                    if (isNumeric(Phone, "Please enter only Numbers for your Phone")) {
                                        if (notEmpty(AdminId, "Please enter your AdminId")) {
                                            if (notEmpty(AdminPwd, "Please enter your Password")) {
                                                Orgaction('add');
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
        }
    }


    return false;

}

function EditformValidator() {
    // Make quick references to our fields
    var OrgCodeEdit = document.getElementById('OrgCodeEdit');
    var OrgNameEdit = document.getElementById('OrgNameEdit');
    var OrgTypeEdit = document.getElementById('OrgTypeEdit');
    var DescriptionEdit = document.getElementById('DescriptionEdit');
    var AddressEdit = document.getElementById('AddressEdit');
    var CityEdit = document.getElementById('CityEdit');
    var StateEdit = document.getElementById('StateEdit');
    var ZipCodeEdit = document.getElementById('ZipCodeEdit');
    var PhoneEdit = document.getElementById('PhoneEdit');
    var AdminIdEdit = document.getElementById('AdminIdEdit');
    var AdminPwdEdit = document.getElementById('AdminPwdEdit');

    // Check each input in the order that it appears in the form!
    if (isNumeric(OrgCodeEdit, "Please enter only Numbers for your OrganizationCode")) {
        if (notEmpty(OrgNameEdit, "Please enter your OrganizationName")) {
            if (notEmpty(OrgTypeEdit, "Please enter your OrganizationType")) {
                if (isAlphabet(DescriptionEdit, "Please enter your Description")) {
                    if (notEmpty(AddressEdit, "Please enter your Address")) {
                        if (notEmpty(CityEdit, "Please enter your City")) {
                            if (notEmpty(StateEdit, "Please enter your State")) {
                                if (isNumeric(ZipCodeEdit, "Please enter only Numbers for your ZipCode")) {
                                    if (isNumeric(PhoneEdit, "Please enter only Numbers for your Phone")) {
                                        if (notEmpty(AdminIdEdit, "Please enter for your AdminId")) {
                                            if (notEmpty(AdminPwdEdit, "Please enter your Password")) {
                                                Orgaction('edit');
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
