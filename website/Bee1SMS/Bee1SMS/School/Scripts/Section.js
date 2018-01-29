$(document).ready(function () {
    $('#add_button_Section').click(function () {
        $('#Section_form')[0].reset();
        $('#modal-title').text("Add Section Info");
        $('#actionSection').val("Add");
        $('#operationSection').val("Add");
        $('#SectionModal').modal('show');
    });

    var operationSection = "fetch";
    var dataTable = $('#Section_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actionsection.php",
            type: "POST",
            data: { operationSection: operationSection }
        },
        "columnDefs": [
			{
			    "targets": [0,1],
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

    $(document).on('submit', '#Section_form', function (event) {
        event.preventDefault();
        var SectionName = $('#SectionName').val();
        if (SectionName != '') {
            $.ajax({
                url: "Actions/actionsection.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 1500);
                    $('#Section_form')[0].reset();

                    $('#SectionModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
           
        }
    });
    
    $(document).on('click', '.updateSection', function () {
        var operationSection = "fetch_single_record";
        var SectionId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionsection.php",
            method: "POST",
            data: { SectionId: SectionId, operationSection: operationSection },
            dataType: "json",
            success: function (data) {
                $('#SectionModal').modal('show');
                $('#SectionName').val(data.SectionName);
                
                
                $('#modal-title').text("Edit Section Info");
                $('#SectionId').val(SectionId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionSection').val("Edit");
                $('#operationSection').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteSection', function () {
        var operationSection = "delete";
        var SectionId = $(this).attr("id");
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
                            url: "Actions/actionsection.php",
                            method: "POST",
                            data: { SectionId: SectionId, operationSection: operationSection }
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