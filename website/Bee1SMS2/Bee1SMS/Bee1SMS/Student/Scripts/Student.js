﻿$(document).ready(function () {
    $('#add_button_Student').click(function () {
        $('#Student_form')[0].reset();
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
                $('#StudentCode').val(data.StudentCode);
            }
        })

    });

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
			    "targets": [0,1,2,3,4,5,6,7,8],
			    "orderable": false,
			},
        ],
        dom: 'Bfrtip',
        buttons: [
        {
            extend: 'collection',
            text: 'Tools',
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']
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
        var Studentname = $('#StudentName').val();
        var StudentCode = $('#StudentCode').val();
        var FamilyGroup = $('#FamilyGroup').val();
        var contactperson = $('#ContactPerson').val();

        if (Studentname != '' && StudentCode != '' && FamilyGroup != '' && contactperson != '') {
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
        var operationStudent = "fetch_single_record";
        var StudentId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionstudent.php",
            method: "POST",
            data: { StudentId: StudentId, operationStudent: operationStudent },
            dataType: "json",
            success: function (data) {
                $('#StudentModal').modal('show');
                $('#StudentCode').val(data.StudentCode);
                $('#StudentName').val(data.StudentName);
                $('#FamilyGroup').val(data.FamilyGroup);
                $('#Class').val(data.Class);
                $('#FatherName').val(data.FatherName);
                $('#Age').val(data.Age);
                $('#DOB').val(data.DOB);
                $('#Gender').val(data.Gender);
                $('#Address').val(data.Address);
                $('#ContactPerson').val(data.ContactPerson);
                $('.modal-title').text("Edit Student Info");
                $('#StudentId').val(StudentId);
                //$('#user_uploaded_image').html(data.user_image);
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