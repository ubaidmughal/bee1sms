$(document).ready(function () {
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
            if (jQuery.inArray(extension, ['jpg', 'jpeg', 'gif', 'png']) == -1) {
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
                $('#AdmissionFee').val(data.AddmissionFee);
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
    $(document).on('click', '.printStudent', function () {
        $('#uploaded_stdimage').attr('width', '0');
        var operationStudent = "fetch_single_record";
        var StudentId = $(this).attr("id");

        $.ajax({
            url: "Actions/actionstudent.php",
            method: "POST",
            data: { StudentId: StudentId, operationStudent: operationStudent },
            dataType: "json",
            success: function (data) {
                $('#PrintModal').modal('show');
                $('#PrintGRNO').html(data.GRNO);
                $('#PrintStudentName').html(data.StudentName);
                $('#PrintFathertName').html(data.FatherName);
                $('#PrintName').html(data.StudentName);
                $('#PrintFName').html(data.FatherName);
                $('#PrintFProfession').html(data.FatherProfession);
                $('#PrintFNIC').html(data.FatherNIC);
                $('#PrintAge').html("12");
                $('#Religion').html(data.Religion);
                $('#PrintAddress').html(data.Address);
                $('#PrintPhone').html("243234242");
                $('#PrintDOB').html(data.DateOfBirth);
                $('#PlaceOfBirth').html(data.PlaceOfBirth);
                $('#LastInstitution').html(data.LastInstitution);
                $('#PrintDOA').html(data.DateOfAdmission);
                $('#PrintClass').html(data.ClassAdmit);
                $('#PrintSection').html(data.Section);
                $('#PrintOClass').html(data.ClassAdmit);
                $('#PrintOSection').html(data.Section);
                $('#Gender').html(data.Gender);
                $('#PrintAddmissionFee').html(data.AddmissionFee);
                $('#PrintMonthlyFee').html(data.MonthlyFee);
                $('#PrintAnnualFee').html(data.AnnualFee);
                $('#PrintRollNumber').html(data.RollNumber);
                $('.modal-title').text("Addmission Form");
                $('#StudentId').val(StudentId);

                $('#PrintStudentImage').html(data.StudentImage);
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