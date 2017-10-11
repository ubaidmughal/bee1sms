$(document).ready(function () {
    $('#add_button_Group').click(function () {
        $('#Group_form')[0].reset();
        formclear();
        $('.modal-title').text("Add Group Info");
        $('#actionGroup').val("Add");
        $('#GroupModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#operationGroup').val("Add");
       
        $('#GroupModal').modal('show');
      

    });
   
    var dataTable = $('#Group_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "fetchGroup.php",
            type: "POST"
        },
        "columnDefs": [
			{
			    "targets": [0,1,2,3],
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

    $(document).on('submit', '#Group_form', function (event) {
        event.preventDefault();
        var GroupCode = $('#GroupCode').val();
        var GroupName = $('#GroupName').val();
        var GroupPosition = $('#GroupPosition').val();
    

        if(GroupCode != '' && GroupName != '' && GroupPosition != '')
        {
            $.ajax({
                url: "insertGroup.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#Group_form')[0].reset();
                    $('#GroupModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            
            alert('fields required');
        }
    });

    $(document).on('click', '.updateGroup', function () {
        var GroupId = $(this).attr("id");
        $.ajax({
            url: "fetch_singleGroup.php",
            method: "POST",
            data: { GroupId: GroupId },
            dataType: "json",
            success: function (data) {
                $('#GroupModal').modal('show');
                $('#GroupCodes').val(data.GroupCode);
                $('#GroupName').val(data.GroupName);
                $('#GroupPosition').val(data.GroupPosition);
            
                $('.modal-title').text("Edit Group Info");
                $('#GroupId').val(GroupId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionGroup').val("Edit");
                $('#operationGroup').val("Edit");
            }
        })
    });
    $(document).on('click', '#closemodal', function () {

        $('#GroupModal').remove();
        $('.modal-backdrop').remove();

    });
    $(document).on('click', '.deleteGroup', function () {
        var GroupId = $(this).attr("id");
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
                            url: "deleteGroup.php",
                            method: "POST",
                            data: { GroupId: GroupId }
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


    function formclear()
    {
        $("#GroupCode").css('border', '');
        $('#chaperror').hide();

        $('#GroupPosition').css('border', '');
        $('#Queerror').hide();

        $('#QuestionString').css('border', '');
        $('#Stringerror').hide();

        $('#McqsOption').css('border','');
        $('#Mcqserror').hide();
    }

});