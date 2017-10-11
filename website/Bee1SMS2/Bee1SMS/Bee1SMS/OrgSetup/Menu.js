$(document).ready(function () {
    $('#add_button_Menu').click(function () {
        $('#Menu_form')[0].reset();
        $('.modal-title').text("Add Menu Info");
        $('#actionMenu').val("Add");
        $('#MenuModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#operationMenu').val("Add");
        
        $('#MenuModal').modal('show');
       
    });
  

    var dataTable = $('#Menu_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "fetchMenu.php",
            type: "POST"
        },
        "columnDefs": [
			{
			    "targets": [0,1,2,3,4,5,6],
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

    $(document).on('submit', '#Menu_form', function (event) {
        event.preventDefault();
        var MenuName = $('#MenuName').val();
        var MenuType = $('#MenuType').val();
        var GroupCode = $('#GroupCode').val();
        var Position = $('#Position').val();

        if (MenuName != '' && MenuType != '' && GroupCode != '' && Position != '') {
            $.ajax({
                url: "insertMenu.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#Menu_form')[0].reset();
                    $('#MenuModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            alert("Both Fields requireds");
        }
    });

    $(document).on('click', '.updateMenu', function () {
        var MenuId = $(this).attr("id");
        $.ajax({
            url: "fetch_singleMenu.php",
            method: "POST",
            data: { MenuId: MenuId },
            dataType: "json",
            success: function (data) {
                $('#MenuModal').modal('show');
                $('#MenuCode').val(data.MenuCode);
                $('#MenuName').val(data.MenuName);
                $('#MenuType').val(data.MenuType);
                $('#GroupCode').val(data.GroupCode);
                $('#Position').val(data.Position);
                $('#Title').val(data.Title);
                $('#Detail').val(data.Detail);
                $('.modal-title').text("Edit Menu Info");
                $('#MenuId').val(MenuId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionMenu').val("Edit");
                $('#operationMenu').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteMenu', function () {
        var MenuId = $(this).attr("id");
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
                            url: "deleteMenu.php",
                            method: "POST",
                            data: { MenuId: MenuId }
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