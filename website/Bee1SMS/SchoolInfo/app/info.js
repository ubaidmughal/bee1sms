function getUsers() {
    $.ajax({
        type: 'POST',
        url: 'infoaction.php',
        data: 'action_type=view&' + $("#SchoolInfoForm").serialize(),
        success: function (html) {
            $('#ScInfoData').html(html);
        }
    });
}
function infoaction(type, SchoolId) {
    SchoolId = (typeof SchoolId == "undefined") ? '' : SchoolId;
    var statusArr = { add: "added", edit: "updated", delete: "deleted" };
    var ScInfoData = '';
    if (type == 'add') {

        userData = $("#addForm").find('.form').serialize() + '&action_type=' + type + '&SchoolId=' + SchoolId;
        $('#uploaded_image').html('');
        var extension = $('#user_image').val().split('.').pop().toLowerCase();
        if (extension != '') {
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image File");
                $('#user_image').val('');
                return false;

            }
        }
        ScInfoData = $("#addFormSInfo").find('.form').serialize() + '&action_type=' + type + '&SchoolId=' + SchoolId;
    
    } else if (type == 'edit') {
        ScInfoData = $("#editFormSInfo").find('.form').serialize() + '&action_type=' + type;
    } else {
        ScInfoData = 'action_type=' + type + '&SchoolId=' + SchoolId;
    }

    $.ajax({
        
        type: 'POST',
        url: 'infoaction.php',
        data: ScInfoData,
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
function editSchoolInfo(SchoolId) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: 'infoaction.php',
        data: 'action_type=data&SchoolId=' + SchoolId,
        success: function (data) {
            $('#idEditSInfo').val(data.SchoolId);
            $('#SchoolNameEdit').val(data.SchoolName);
            $('#LogoEdit').val(data.Logo);
            $('#RegEdit').val(data.Reg);
            $('#AddressEdit').val(data.Address);
            $('#LatitudeEdit').val(data.latitude);
            $('#LongitudeEdit').val(data.longitude);
            $('#editFormSInfo').slideDown();
        }
    });
}
function formValidatorSInfo() {
    // Make quick references to our fields
    var SchoolName = document.getElementById('SchoolName');
    
    var Reg = document.getElementById('Reg');
    var Address = document.getElementById('Address');
    var Latitude = document.getElementById('Latitude');
    var Longitude = document.getElementById('Longitude');
  

    // Check each input in the order that it appears in the form!
    if (notEmpty(SchoolName, "Please enter SchoolName")) {
        
            if (isNumeric(Reg, "Please enter Registration Number")) {
                if (notEmpty(Address, "Please enter Address")) {
                    if (notEmpty(Latitude, "Please enter Latitude")) {
                        if (notEmpty(Longitude, "Please ente Longitude")) {
                         
                                        infoaction('add');
                                        return true;
                                    }
                                }
                            }
                        }
                    }
                
           



    return false;

}

function EditformValidatorSInfo() {
    // Make quick references to our fields
    var SchoolNameEdit = document.getElementById('SchoolNameEdit');
    
    var RegEdit = document.getElementById('RegEdit');
    var AddressEdit = document.getElementById('AddressEdit');
    var LatitudeEdit = document.getElementById('LatitudeEdit');
    var LongitudeEdit = document.getElementById('LongitudeEdit');
   

    // Check each input in the order that it appears in the form!
    if (notEmpty(SchoolNameEdit, "Please enter SchoolName")) {

        if (isNumeric(RegEdit, "Please enter Registration Number")) {
            if (notEmpty(AddressEdit, "Please enter Address")) {
                if (notEmpty(LatitudeEdit, "Please enter Latitude")) {
                    if (notEmpty(LongitudeEdit, "Please enter Longitude")) {

                        infoaction('edit');
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

function LatitudeValidator(elem, helperMsg) {
    var LatitudeExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (elem.value.match(LatitudeExp)) {
        return true;
    } else {
        alert(helperMsg);
        elem.value = '';
        elem.focus();
        return false;
    }

}

