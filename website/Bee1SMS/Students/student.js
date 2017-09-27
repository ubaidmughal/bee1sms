$(document).ready(function () {

    //Students Section
    //Starts From Here
    load_data_students();
    $('#actionstudent').val("Insert");
    $('#addLinkStd').click(function () {
        $('#addFormStd').slideDown();
        $('#StdForm')[0].reset();
        $('#button_actionstudent').val("Insert");
    });
    function load_data_students() {
        var actionstudent = "Load";
        $.ajax({
            url: "Studentaction.php",
            method: "POST",
            data: { actionstudent: actionstudent },
            success: function (data) {
                $('#student_table').html(data);
            }
        });
    }
    $('#StdForm').on('submit', function (event) {
        event.preventDefault();
        var StudentCode = $('#StudentCode').val();
        var StudentName = $('#StudentName').val();
        var FamilyGroup = $('#FamilyGroup').val();
        var NameOfGroup = $('#NameOfGroup').val();
        var FatherName = $('#FatherName').val();
        var Class = $('#Class').val();
        
        
        var Age = $('#Age').val();
        var DOB = $('#DOB').val();
        var Gender = $('#Gender').val();
        var Address = $('#Address').val();
        var ContactPerson = $('#ContactPerson').val();
        if (StudentCode != '' && StudentName != '' && FamilyGroup != '' && NameOfGroup != '' && Class != '' && FatherName != '' && Age != '' && DOB != '' && Gender != '' && Address != '' && ContactPerson != '') {

            $.ajax({
                url: "Studentaction.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#StdForm')[0].reset();
                    load_data_students();
                    $("#actionstudent").val("Insert");
                    $('#button_actionstudent').val("Insert");
                    $('#addFormStd').slideUp();
                }
            });
        }
        else {
            var ev = event;
            return (function () {
                var form = $(this);

                form.addClass("form--valid");

                var controller = new snapkitValidation(form);

                //Prevent form from being submitted
                if (!form.hasClass("form--valid")) {
                    ev.preventDefault();
                }
            });
        }
    });
    $(document).on('click', '.updatestudent', function () {
        var Student_id = $(this).attr("id");
        var actionstudent = "Fetch Single Data";
        $.ajax({
            url: "Studentaction.php",
            method: "POST",
            data: { Student_id: Student_id, actionstudent: actionstudent },
            dataType: "json",
            success: function (data) {
                $('#addFormStd').slideDown();
                $('#StudentCode').val(data.StudentCode);
                $('#StudentName').val(data.StudentName);
                $('#FamilyGroup').val(data.FamilyGroup);
                $('#NameOfGroup').val(data.NameOfGroup);
                $('#Class').val(data.Class);
               
                $('#FatherName').val(data.FatherName);
                $('#Age').val(data.Age);
                $('#DOB').val(data.DOB);
                $('#Gender').val(data.Gender);
                $('#Address').val(data.Address);
                $('#ContactPerson').val(data.ContactPerson);
                $('#button_actionstudent').val("Edit");
                $('#actionstudent').val("Edit");
                $('#Student_id').val(Student_id);

            }
        });
    });

    $(document).on('click', '.deletestudent', function (e) {
        e.preventDefault();
        var Student_id = $(this).attr("id");
        var actionstudent = "delete";
        bootbox.dialog({
            message: "Are you sure you want to Delete ?",
            title: "<i class='glyphicon glyphicon-trash'></i> Delete !",
            buttons: {
                success: {
                    label: "No",
                    className: "btn-success",
                },
                danger: {
                    label: "Delete!",
                    className: "btn-danger",
                    callback: function () {
                        $.ajax({
                            url: "Studentaction.php",
                            method: "POST",
                            data: { Student_id: Student_id, actionstudent: actionstudent }
                        })
                        .done(function (response) {
                            bootbox.alert(response);
                            //bootbox.alert(response);
                            window.setTimeout(function () {
                                bootbox.hideAll();
                            }, 2000);
                            load_data_students();
                        })
                        .fail(function () {
                            bootbox.alert('Error....');

                        })
                    }
                }
            }
        });
    });
    //Students Section
    //Students Section End Here

});