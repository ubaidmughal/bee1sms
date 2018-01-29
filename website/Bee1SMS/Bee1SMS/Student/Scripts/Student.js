$(document).ready(function () {
    getGroups();

    $("#GFamilyCode").hide();
    $("#GFamilyName").hide();
    $("#GStudentName").hide();
    $("#FC").hide();
    $("#FamN").hide();
    $("#SN").hide();
    $('#addGroup').hide();
    var stdname = $('#StudentName').val();
    $('#btnFGroup').click(function () {
        $("#FC").show();
        $("#FamN").show();
        $("#SN").show();
        $("#GFamilyCode").show();
        $("#GFamilyName").show();
        $("#GStudentName").show();
        $("#FatherName").hide();
        $("#FamilyGroup").hide();
        $("#FatherProfession").hide();
        $("#FatherNIC").hide();
        $("#FN").hide();
        $("#FG").hide();
        $("#FP").hide();
        $("#FNic").hide();
        $('#addGroup').show();
        $('.back2').hide();
        $('.open2').hide();
        $('#btnFGroup').hide();
        
        var operationStudent = "getfamilycode";
        $.ajax({
            url: "Actions/actionstudent.php",
            method: "POST",
            data: { operationStudent: operationStudent },
            dataType: "json",
            success: function (data) {
                $('#GFamilyCode').val(data.GFamilyCode);
            }
        });

    });

    $('#addGroup').click(function (e) {
        var operationStudent = "addGroup";
        var GFamilyCode = $('#GFamilyCode').val();
        var GFamilyName = $('#GFamilyName').val();
        var GStudentName = $('#GStudentName').val();
        $.ajax({
            url: "Actions/actionstudent.php",
            method: "post",
            data: { GFamilyCode: GFamilyCode, GFamilyName:GFamilyName, GStudentName:GStudentName, operationStudent: operationStudent },
            success: function (data) {
                $("#FC").hide();
                $("#FamN").hide();
                $("#SN").hide();
                $("#GFamilyCode").hide();
                $("#GFamilyName").hide();
                $("#GStudentName").hide();
                $("#FatherName").show();
                $("#FamilyGroup").show();
                $("#FatherProfession").show();
                $("#FatherNIC").show();
                $("#FN").show();
                $("#FG").show();
                $("#FP").show();
                $("#FNic").show();
                $('#addGroup').hide();
                $('.back2').show();
                $('.open2').show();
                $('#btnFGroup').show();
                $("#GFamilyName").val('');
                $("#GStudentName").val('');
                getGroups();
                getLastInsertedGroup();
            }
        });
    });

    $('#add_button_Student').click(function () {
        
        $('#Student_form')[0].reset();
        $("#sf1").show("slow");
        $("#sf2").hide();
        $("#sf3").hide();
        $("#sf4").hide();
        
      
        $('#uploadedImage').html('');
        $('.modal-title').text("Add Student Info");
        $('#actionStudent').val("Add");
        $('#StudentModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#operationStudent').val("Add");

        $('#StudentModal').modal('show');

        var operationStudent = "max_code";

        var StudentId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionstudent.php",
            method: "POST",
            data: { StudentId: StudentId, operationStudent: operationStudent },
            dataType: "json",
            success: function (data) {
                $('#GRNO').val(data.GRNO);
            }
        });

        

    });

    $('#ClassAdmit').blur(function () {
        getRollNumber();
    })

    function getRollNumber() {
        var operationStudent = "getRollNumber";
        var ClassAdmit = $('#ClassAdmit').val();
        var StudentId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionstudent.php",
            method: "POST",
            data: { ClassAdmit: ClassAdmit, operationStudent: operationStudent },
            dataType: "json",
            success: function (data) {             
                $('#RollNumber').val(data.RollNumber);
            }
        });
    }

    var operationStudent = "fetch";
    var dataTable = $('#Student_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actionstudent.php",
            type: "POST",
            data: { operationStudent: operationStudent }
        },
        "columnDefs": [
			{
			    "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
			    "orderable": false,


			},
        ],
        dom: 'Bfrtip',
        lengthMenu: [
            [10, 25, 50, -1],
            ['10 rows', '25 rows', '50 rows', 'Show all']
        ],
        buttons: [
        {
            extend: 'collection',
            text: 'Tools',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis', 'pageLength'],

        }
        ],
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,
        colReorder: true

    });

    $(document).on('submit', '#Student_form', function (event) {
        event.preventDefault();
        var StudentName = $('#StudentName').val();
        var extension = $('#Attachments').val().split('.').pop().toLowerCase();
        if (extension != '') {
            if (jQuery.inArray(extension, ['pdf']) == -1) {
                alert("Invalid Document");
                $('#Attachments').val('');
                return false;
            }
        }

        var extension = $('#StudentImage').val().split('.').pop().toLowerCase();
        if (extension != '') {
            if (jQuery.inArray(extension, ['png', 'jpeg', 'jpg']) == -1) {
                alert("Invalid Image");
                $('#StudentImage').val('');
                return false;
            }
        }

        if (StudentName != '') {
            $.ajax({
                url: "Actions/actionstudent.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#Student_form')[0].reset();
                    $('#uploaded_stdimage').attr('src', '/assets/img/avatar.png');
                    $('#StudentModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            alert("Both Fields requireds");
        }
    });

    $(document).on('click', '.updateStudent', function () {
        $('#uploaded_stdimage').attr('width','0');
        var operationStudent = "fetch_single_record";
        var StudentId = $(this).attr("id");
        $("#sf1").show();
        $("#sf2").hide();
        $("#sf3").hide();
        $("#sf4").hide();
        $.ajax({
            url: "Actions/actionstudent.php",
            method: "POST",
            data: { StudentId: StudentId, operationStudent: operationStudent },
            dataType: "json",
            success: function (data) {
                $('#StudentModal').modal('show');
                $('#GRNO').val(data.GRNO);
                $('#StudentName').val(data.StudentName);
                $('#FatherName').val(data.FatherName);
                $('#FatherProfession').val(data.FatherProfession);
                $('#FatherNIC').val(data.FatherNIC);
                $('#FamilyGroup').val(data.FamilyGroup);
                $('#Religion').val(data.Religion);
                $('#Address').val(data.Address);
                $('#Address2').val(data.Address2);
                $('#DateOfBirth').val(data.DateOfBirth);
                $('#PlaceOfBirth').val(data.PlaceOfBirth);
                $('#LastInstitution').val(data.LastInstitution);
                $('#DateOfAdmission').val(data.DateOfAdmission);
                $('#ClassAdmit').val(data.ClassAdmit);
                $('#Section').val(data.Section);
                
                $('#Gender').val(data.Gender);
                $('#AdmissionFee').val(data.AdmissionFee);
                $('#MonthlyFee').val(data.MonthlyFee);
                $('#AnnualFee').val(data.AnnualFee);
                $('#RollNumber').val(data.RollNumber);
                $('.modal-title').text("Edit Student Info");
                $('#StudentId').val(StudentId);
                
                $('#uploadedImage').html(data.StudentImage);
                $('#uploaded_Attachments').val(data.Attachments);
                $('#actionStudent').val("Edit");
                $('#operationStudent').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteStudent', function () {
        var operationStudent = "delete";
        var StudentId = $(this).attr("id");
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
                            url: "Actions/actionstudent.php",
                            method: "POST",
                            data: { StudentId: StudentId, operationStudent: operationStudent }
                        })
                        .done(function (response) {
                            bootbox.alert(response);
                            bootbox.alert(response);
                            window.setTimeout(function () {
                                bootbox.hideAll();
                            }, 2000);
                            dataTable.ajax.reload();
                        })
                        .fail(function () {
                            bootbox.alert('Error....');

                        })
                    }
                }
            }
        });
    });

});

//function getGroups() {
//    $('#FamilyGroup').empty();
//    $('#FamilyGroup').append("<option>Loading........</option>");
//    $.ajax({
//        type: "POST",
//        url: "Actions/actionstudent.php",
//        //contentType: "appliction/json; charset=utf-8",
//        dataType: "json",
//        success: function (data) {
//            alert(data);
//            $('#FamilyGroup').empty();
//            $('#FamilyGroup').append("<option value='0'>--Select Family Group--</option>");
//            $.each(data, function () {
//                $('#FamilyGroup').append("<option value='"+ data[i].FamilyName +"'>'"+ data[i].FamilyName +"'</option>");
//            });
//        }
//    });
//}
function getLastInsertedGroup() {
    var operationStudent = "getLastInsertedGroup";
    $.ajax({
        url: "Actions/actionstudent.php",
        method: "POST",
        data: { operationStudent: operationStudent },
        dataType: "json",
        success: function (data) {
            $('#FamilyGroup').val(data.FamilyName);
        }
    });
}

function getGroups() {
    var operationStudent = "get_Families";
    $.ajax({
        url: "Actions/actionstudent.php",
        method: "POST",
        data: { operationStudent: operationStudent },
        dataType: "json",
        success: function (data) {
            $('#FamilyGroup').empty();
            $('#FamilyGroup').append("<option value='0'>--Select Family Group--</option>");
                        $.each(data, function (i) {
                            $('#FamilyGroup').append("<option>" + data[i] + "</option>");
                            
});
        },
        complete: function () {
            
        }
    });
}
