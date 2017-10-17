$(document).ready(function () {
    $('#add_button_School').click(function () {
        $('#School_form')[0].reset();
        $('#modal-title').text("Add School Info");
        $('#actionschool').val("Add");
        $('#operationschool').val("Add");
        $('#SchoolModal').modal('show');

    });

    var dataTable = $('#School_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "fetchSchool.php",
            type: "POST"
        },
        "columnDefs": [
			{
			    "targets": [0,1,2,3,4,5],
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

    $(document).on('submit', '#School_form', function (event) {
        event.preventDefault();
        var SchoolName = $('#SchoolName').val();
        var Reg = $('#Reg').val();
        var Address = $('#Address').val();
        var Latitude = $('#Latitude').val();
        var Longitude = $('#Longitude').val();

        if (SchoolName != '' && Reg != '' && Address != '' && Latitude != '' && Longitude) {
            $.ajax({
                url: "insertSchool.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#School_form')[0].reset();
                    $('#SchoolModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            alert("Both Fields requireds");
        }
    });

    $(document).on('click', '.updateSchool', function () {
        var SchoolId = $(this).attr("id");
        $.ajax({
            url: "fetch_singleSchool.php",
            method: "POST",
            data: { SchoolId: SchoolId },
            dataType: "json",
            success: function (data) {
                $('#SchoolModal').modal('show');
                $('#SchoolName').val(data.SchoolName);
                $('#Reg').val(data.Reg);
                $('#Address').val(data.Address);
                $('#Latitude').val(data.Latitude);
                $('#Longitude').val(data.Longitude);
                $('.modal-title').text("Edit School Info");
                $('#SchoolId').val(SchoolId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionschool').val("Edit");
                $('#operationschool').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteSchool', function () {
        var SchoolId = $(this).attr("id");
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
                            url: "deleteSchool.php",
                            method: "POST",
                            data: { SchoolId: SchoolId }
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