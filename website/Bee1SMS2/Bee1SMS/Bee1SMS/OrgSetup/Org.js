$(document).ready(function () {
    $('#add_button_Org').click(function () {
        $('#Org_form')[0].reset();
        $('.modal-title').text("Add Org Info");
        $('#actionOrg').val("Add");
        $('#OrgModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#operationOrg').val("Add");
        
        $('#OrgModal').modal('show');
       
       
    });

    var dataTable = $('#Org_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "fetchOrg.php",
            type: "POST"
        },
        "columnDefs": [
			{
			    "targets": [0,1,2,3,4,5,6,7,8,9],
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

    $(document).on('submit', '#Org_form', function (event) {
        event.preventDefault();
        var OrgCode = $('#OrgCode').val();
        var OrgName = $('#OrgName').val();
        var OrgType = $('#OrgType').val();
        var Description = $('#Description').val();

        if (OrgCode != '' && OrgName != '' && OrgType != '' && Description != '') {
            $.ajax({
                url: "insertOrg.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#Org_form')[0].reset();
                    $('#OrgModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            alert("Both Fields requireds");
        }
    });

    $(document).on('click', '.updateOrg', function () {
        var OrgId = $(this).attr("id");
        $.ajax({
            url: "fetch_singleOrg.php",
            method: "POST",
            data: { OrgId: OrgId },
            dataType: "json",
            success: function (data) {
                $('#OrgModal').modal('show');
                $('#OrgCode').val(data.OrgCode);
                $('#OrgName').val(data.OrgName);
                $('#OrgType').val(data.OrgType);
                $('#Description').val(data.Description);
                $('#Address').val(data.Address);
                $('#City').val(data.City);
                $('#State').val(data.State);
                $('#ZipCode').val(data.ZipCode);
                $('#Phone').val(data.Phone);
                $('#AdminId').val(data.AdminId);
                $('#AdminPwd').val(data.AdminPwd);
                $('.modal-title').text("Edit Org Info");
                $('#OrgId').val(OrgId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionOrg').val("Edit");
                $('#operationOrg').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteOrg', function () {
        var OrgId = $(this).attr("id");
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
                            url: "deleteOrg.php",
                            method: "POST",
                            data: { OrgId: OrgId }
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