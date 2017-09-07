
    function getMenu() {
        $.ajax({
            type: 'POST',
            url: 'actionMenu.php',
            data: 'action_type=view&' + $("#MenuForm").serialize(),
            success: function (html) {
                $('#MenuData').html(html);
                
            }
        });
    }
    function actionMenu(type, id) {
        id = (typeof id == "undefined") ? '' : id;
        var statusArr = { add: "added", edit: "updated", delete: "deleted" };
        var MenuData = '';
        if (type == 'add') {
            MenuData = $("#addFormMenu").find('.form').serialize() + '&action_type=' + type + '&id=' + id;
        } else if (type == 'edit') {
            MenuData = $("#editFormMenu").find('.form').serialize() + '&action_type=' + type;
        } else {
            MenuData = 'action_type=' + type + '&id=' + id;
        }
        $.ajax({
            type: 'POST',
            url: 'actionMenu.php',
            data: MenuData,
            success: function (msg) {
                if (msg == 'ok') {
                    alert('Menu data has been ' + statusArr[type] + ' successfully.');
                    getMenu();
                    $('.form')[0].reset();
                    $('.formData').slideUp();
                } else {
                    alert('Some problem occurred, please try again.');
                }
            }
        });
    }
    function editMenu(id) {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: 'actionMenu.php',
            data: 'action_type=data&id=' + id,
            success: function (data) {
                $('#idEditMenu').val(data.id);
                $('#MenuCodeEdit').val(data.MenuCode);
                $('#MenuNameEdit').val(data.MenuName);
                $('#MenuTypeEdit').val(data.MenuType);
                $('#GroupCodeEditMenu').val(data.GroupCode);
                $('#PositionEditMenu').val(data.Position);
                $('#TitleEdit').val(data.Title);
                $('#DetailEdit').val(data.Detail);
                $('#editFormMenu').slideDown();
            }
        });
    }

    function formValidatorMenu() {
        // Make quick references to our fields
        var MenuCode = document.getElementById('MenuCode');
        var MenuName = document.getElementById('MenuName');
        var MenuType = document.getElementById('MenuType');
        var GroupCode = document.getElementById('GroupCodeMenu');
        var Position = document.getElementById('PositionMenu');
        var Title = document.getElementById('Title');
        var Detail = document.getElementById('Detail');

        // Check each input in the order that it appears in the form!
        if (isNumeric(MenuCode, "Please enter only Numbers for your MenuCode")) {
            if (notEmpty(MenuName, "Please enter only Letters for your MenuName")) {
                if (notEmpty(MenuType, "Please enter your MenuType")) {
                    if (isNumeric(GroupCode, "Please enter only Numbers for your GroupCode")) {
                        if (isNumeric(Position, "Please enter only Numbers for your Position")) {
                            if (notEmpty(Title, "Please enter your Menu Title")) {
                                if (notEmpty(Detail, "Please enter your Menu Detail")) {
                                    actionMenu('add');
                                    return true;
                                }
                            }
                        }
                    }
                }
            }
        }


        return false;

    }

    function EditformValidatorMenu() {
        // Make quick references to our fields
        var MenuCodeEdit = document.getElementById('MenuCodeEdit');
        var MenuNameEdit = document.getElementById('MenuNameEdit');
        var MenuTypeEdit = document.getElementById('MenuTypeEdit');
        var GroupCodeEdit = document.getElementById('GroupCodeEditMenu');
        var PositionEdit = document.getElementById('PositionEditMenu');
        var TitleEdit = document.getElementById('TitleEdit');
        var DetailEdit = document.getElementById('DetailEdit');

        // Check each input in the order that it appears in the form!
        if (isNumeric(MenuCodeEdit, "Please enter only Numbers for your MenuCode")) {
            if (notEmpty(MenuNameEdit, "Please enter only Letters for your MenuName")) {
                if (notEmpty(MenuTypeEdit, "Please enter your MenuType")) {
                    if (isNumeric(GroupCodeEdit, "Please enter only Numbers for your GroupCode")) {
                        if (isNumeric(PositionEdit, "Please enter only Numbers for your Position")) {
                            if (notEmpty(TitleEdit, "Please enter your Menu Title")) {
                                if (notEmpty(DetailEdit, "Please enter your Menu Detail")) {
                                    actionMenu('edit');
                                    return true;
                                }
                            }
                        }
                    }
                }
            }
        }


        return false;

    }




    function getGroup() {
        $.ajax({
            type: 'POST',
            url: 'actionGroup.php',
            data: 'action_type=view&' + $("#GroupForm").serialize(),
            success: function (html) {
                $('#GroupData').html(html);
                
            }
        });
    }
    function actionGroup(type, id) {
        id = (typeof id == "undefined") ? '' : id;
        var statusArr = { add: "added", edit: "updated", delete: "deleted" };
        var GroupData = '';
        if (type == 'add') {
            GroupData = $("#addFormGroup").find('.form').serialize() + '&action_type=' + type + '&id=' + id;
        } else if (type == 'edit') {
            GroupData = $("#editFormGroup").find('.form').serialize() + '&action_type=' + type;
        } else {
            GroupData = 'action_type=' + type + '&id=' + id;
        }
        $.ajax({
            type: 'POST',
            url: 'actionGroup.php',
            data: GroupData,
            success: function (msg) {
                if (msg == 'ok') {
                    alert('Group data has been ' + statusArr[type] + ' successfully.');
                    getGroup();
                    $('.form')[0].reset();
                    $('.formData').slideUp();
                } else {
                    alert('Some problem occurred, please try again.');
                }
            }
        });
    }
    function editGroup(id) {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: 'actionGroup.php',
            data: 'action_type=data&id=' + id,
            success: function (data) {
                $('#idEditGroup').val(data.id);
                $('#GroupCodeEdit').val(data.GroupCode);
                $('#GroupNameEdit').val(data.GroupName);
                $('#PositionEdit').val(data.Position);
                $('#editFormGroup').slideDown();
            }
        });
    }

    function formValidatorGroup() {
        // Make quick references to our fields
        var GroupCode = document.getElementById('GroupCode');
        var GroupName = document.getElementById('GroupName');
        var Position = document.getElementById('Position');

        // Check each input in the order that it appears in the form!
        if (isNumeric(GroupCode, "Please enter only Numbers for your GroupCode")) {
            if (notEmpty(GroupName, "Please enter your GroupName")) {
                if (isNumeric(Position, "Please enter only Numbers for your Position")) {
                    actionGroup('add');
                    return true;
                }
            }
        }


        return false;

    }

    function EditformValidatorGroup() {
        // Make quick references to our fields
        var GroupCodeEdit = document.getElementById('GroupCodeEdit');
        var GroupNameEdit = document.getElementById('GroupNameEdit');
        var PositionEdit = document.getElementById('PositionEdit');

        // Check each input in the order that it appears in the form!
        if (isNumeric(GroupCodeEdit, "Please enter only Numbers for your GroupCode")) {
            if (notEmpty(GroupNameEdit, "Please enter your GroupName")) {
                if (isNumeric(PositionEdit, "Please enter only Numbers for your Position")) {
                    actionGroup('edit');
                    return true;
                }
            }
        }


        return false;

    }





    function getOrg() {
        $.ajax({
            type: 'POST',
            url: 'Orgaction.php',
            data: 'action_type=view&' + $("#OrgForm").serialize(),
            success: function (html) {
                $('#OrgData').html(html);
            }
        });
    }
    function Orgaction(type, id) {
        id = (typeof id == "undefined") ? '' : id;
        var statusArr = { add: "added", edit: "updated", delete: "deleted" };
        var OrgData = '';
        if (type == 'add') {
            OrgData = $("#addFormOrg").find('.form').serialize() + '&action_type=' + type + '&id=' + id;
        } else if (type == 'edit') {
            OrgData = $("#editFormOrg").find('.form').serialize() + '&action_type=' + type;
        } else {
            OrgData = 'action_type=' + type + '&id=' + id;
        }
        $.ajax({
            type: 'POST',
            url: 'Orgaction.php',
            data: OrgData,
            success: function (msg) {
                if (msg == 'ok') {
                    alert('Organization data has been ' + statusArr[type] + ' successfully.');
                    getOrg();
                    $('.form')[0].reset();
                    $('.formData').slideUp();
                } else {
                    alert('Some problem occurred, please try again.');
                }
            }
        });
    }
    function editOrg(id) {
        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            url: 'Orgaction.php',
            data: 'action_type=data&id=' + id,
            success: function (data) {
                $('#idEditOrg').val(data.id);
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
                $('#editFormOrg').slideDown();
            }
        });
    }



    function formValidatorOrg() {
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

    function EditformValidatorOrg() {
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
