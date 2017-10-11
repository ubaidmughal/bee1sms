$(document).ready(function () {
    $('#add_button_Section').click(function () {
        $('#Section_form')[0].reset();
        $('#modal-title').text("Add Section Info");
        $('#actionSection').val("Add");
        $('#SectionModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#operationSection').val("Add");
       
        $('#SectionModal').modal('show');
    });

    var dataTable = $('#Section_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "fetchSection.php",
            type: "POST"
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
                url: "insertSection.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#Section_form')[0].reset();
                    $('#SectionModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            alert("Both Fields requireds");
        }
    });

    $(document).on('click', '.updateSection', function () {
        var SectionId = $(this).attr("id");
        $.ajax({
            url: "fetch_singleSection.php",
            method: "POST",
            data: { SectionId: SectionId },
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
                            url: "deleteSection.php",
                            method: "POST",
                            data: { SectionId: SectionId }
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