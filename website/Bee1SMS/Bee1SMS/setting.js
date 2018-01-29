$(document).ready(function () {
    $('#add_button_School').click(function () {
        $('#School_form')[0].reset();
        $('.modal-title').text("Add School Info");
        $('#actionSchool').val("Add");
        $('#operationSchool').val("Add");
        $('#SchoolModal').modal('show');
        
        $('#uploadedLogo').html('');
        $('#logo').attr('src', '');
        $('#SchoolModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    });
    $('#closemodal').click(function () {

        $('#School_form')[0].reset();

    });
    var operationSchool = "fetch";
    var dataTable = $('#School_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "actionsetting.php",
            type: "POST",
            data: { operationSchool: operationSchool }
        },
        "columnDefs": [
			{
			    "targets": [0, 1, 2, 3, 4,5,6],
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
      
        var extension = $('#SchoolLogo').val().split('.').pop().toLowerCase();
        if (extension != '') {
            if (jQuery.inArray(extension, ['jpg','png','jpeg']) == -1) {
                alert("Invalid Image File");
                $('#SchoolLogo').val('');
                return false;
            }
        }
        if (SchoolName != '') {
            $.ajax({
                url: "actionsetting.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 1500);
                    $('#School_form')[0].reset();

                    $('#SchoolModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {


        }
    });

    $(document).on('click', '.updateschool', function () {
        var operationSchool = "fetch_single_record";
        var SchoolId = $(this).attr("id");
        
        $.ajax({
            url: "actionsetting.php",
            method: "POST",
            data: { SchoolId: SchoolId, operationSchool: operationSchool },
            dataType: "json",
            success: function (data) {
                $('#SchoolModal').modal('show');
                $('#SchoolName').val(data.SchoolName);
                $('#Reg').val(data.Reg);
                $('#Address').val(data.Address);
                $('#Phone').val(data.Phone);
                $('#FromTime').val(data.FromTime);
                $('#ToTime').val(data.ToTime);
                $('.modal-title').text("Edit School Info");
                $('#SchoolId').val(SchoolId);
                $('#uploadedLogo').html(data.SchoolLogo);
                
                $('#actionSchool').val("Edit");
                $('#operationSchool').val("Edit");
                $('#logo').attr('src', '');
            }
        })
    });

    $(document).on('click', '.deleteschool', function () {
        var operationSchool = "delete";
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
                            url: "actionsetting.php",
                            method: "POST",
                            data: { SchoolId: SchoolId, operationSchool: operationSchool }
                        })
                        .done(function (response) {
                            bootbox.alert(response);
                            bootbox.alert(response);
                            window.setTimeout(function () {
                                bootbox.hideAll();
                            }, 1500);
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