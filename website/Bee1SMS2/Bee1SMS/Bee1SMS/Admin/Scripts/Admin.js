$(document).ready(function () {
    $('#add_button_Admin').click(function () {
        $('#Admin_form')[0].reset();
        $('.modal-title').text("Add Admin Info");
        $('#actionAdmin').val("Add");
        $('#AdminModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#operationAdmin').val("Add");
        
        $('#AdminModal').modal('show');
    });

    var operationAdmin = "fetch";
    var dataTable = $('#Admin_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actionadmin.php",
            type: "POST",
            data: { operationAdmin: operationAdmin }
        },
        "columnDefs": [
			{
			    "targets": [0,1,2,3],
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

    $(document).on('submit', '#Admin_form', function (event) {
        event.preventDefault();
        var UserName = $('#UserName').val();
        var Email = $('#Email').val();
        var DateReg = $('#DateReg').val();
        var Password = $('#Password').val();

        if (UserName != '' && Email != '' && DateReg != '' && Password != '') {
            $.ajax({
                url: "Actions/actionadmin.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#Admin_form')[0].reset();
                    $('#AdminModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            alert("Both Fields requireds");
        }
    });

    $(document).on('click', '.updateAdmin', function () {
        var operationAdmin = "fetch_single_record";
        var AdminId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionadmin.php",
            method: "POST",
            data: { AdminId: AdminId, operationAdmin: operationAdmin },
            dataType: "json",
            success: function (data) {
                $('#AdminModal').modal('show');
                
                $('#UserName').val(data.UserName);
                $('#Email').val(data.Email);
                $('#DateReg').val(data.DateReg);
                $('#Password').val(data.Password);
                $('.modal-title').text("Edit Admin Info");
                $('#AdminId').val(AdminId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionAdmin').val("Edit");
                $('#operationAdmin').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteAdmin', function () {
        var operationAdmin = "delete";
        var AdminId = $(this).attr("id");
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
                            url: "Actions/actionadmin.php",
                            method: "POST",
                            data: { AdminId: AdminId, operationAdmin: operationAdmin }
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