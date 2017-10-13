$(document).ready(function () {
    
    $('#add_button_Family').click(function () {
        $('#Family_form')[0].reset();
        $('.modal-title').text("Add Family Info");
        $('#actionFamily').val("Add");
        $('#FamilyModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#operationFamily').val("Add");
        $('#mytable').hide();
        $('#FamilyModal').modal('show');
    });

    function getStudentNames() {
        var operationFamily = "getnames";
        var FamilyName = $('#FamilyName').val();
        var dataTablestudent = $('#Family_students').DataTable({
            
            //"processing": true,
            //"serverSide": true,
            //"order": [],
            "paging": false,
            "ordering": false,
            "bDestroy": true,
            "bFilter": false,
            "ajax": {
                url: "insertFamily.php",
                type: "POST",
                data: { FamilyName:FamilyName, operationFamily: operationFamily }
            },
            "columnDefs": [
                {
                    "targets": [0],
                    //"orderable": false,
                },
            ],

        });
        //var studentdnames = [];
        //var operationFamily = "getnames";
        //var FamilyName = $('#FamilyName').val();
        //$.ajax({
        //    url: "insertFamily.php",
        //    method: "POST",
        //    data: { FamilyName: FamilyName, operationFamily: operationFamily },
        //    dataType: "json",
        //    success: function (data) {
        //        alert(data.StudentName);
        //        //studentdnames = data.StudentName;
        //        //$('#FStudentName').val(studentdnames);
        //    }
        //})
    }

    var dataTable = $('#Family_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "fetchFamily.php",
            type: "POST"
        },
        "columnDefs": [
			{
			    "targets": [0, 1],
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

    $(document).on('submit', '#Family_form', function (event) {
        event.preventDefault();
        var FamilyCode = $('#FamilyCode').val();
        var FamilyName = $('#FamilyName').val();
       
 

        if (FamilyCode != '' && FamilyName != '') {
            $.ajax({
                url: "insertFamily.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#Family_form')[0].reset();
                    $('#FamilyModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            alert("Both Fields requireds");
        }
    });

    $(document).on('click', '.updateFamily', function () {
        var FamilyId = $(this).attr("id");
        $.ajax({
            url: "fetch_singleFamily.php",
            method: "POST",
            data: { FamilyId: FamilyId },
            dataType: "json",
            success: function (data) {
                $('#FamilyModal').modal('show');
                $('#mytable').show();
                $('#FamilyCode').val(data.FamilyCode);
                $('#FamilyName').val(data.FamilyName);
                //$('#FStudentName').val(data.FStudentName);
                getStudentNames();
                $('.modal-title').text("Edit Family Info");
                $('#FamilyId').val(FamilyId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionFamily').val("Edit");
                $('#operationFamily').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteFamily', function () {
        var FamilyId = $(this).attr("id");
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
                            url: "deleteFamily.php",
                            method: "POST",
                            data: { FamilyId: FamilyId }
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