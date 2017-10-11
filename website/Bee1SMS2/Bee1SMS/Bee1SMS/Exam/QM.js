$(document).ready(function () {
    $('#add_button_QM').click(function () {
        $('#QM_form')[0].reset();
        formclear();
        $('#modal-title').text("Add Question Master Info");
        $('#actionQM').val("Add");
        $('#QMModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#operationQM').val("Add");
        
        $('#QMModal').modal('show');

    });

    var dataTable = $('#QM_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "fetchQM.php",
            type: "POST"
        },
        "columnDefs": [
			{
			    "targets": [0,1,2,3,4],
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

    $(document).on('submit', '#QM_form', function (event) {
        event.preventDefault();
        var chapter = $('#Chapter').val();
        var bookname = $('#BookName').val();
        var QuestionType = $('#QuestionType').val();
        var QuestionString = $('#QuestionString').val();
        var McqsOption = $('#McqsOption').val();

        if(chapter != '' && bookname != '' && QuestionType != '' && QuestionString != '' && McqsOption != '')
        {
            $.ajax({
                url: "insertQM.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#QM_form')[0].reset();
                    $('#QMModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            
            if (chapter == '') {
                $("#Chapter").css('border', '1px solid red');
                $('#chaperror').show();
                $('#Chapter').focus();
                return false;
            }
            else {
                $('#Chapter').css('border', '1px solid green');
                $('#chaperror').hide();
            }
            if (QuestionType == '') {
                $("#QuestionType").css('border', '1px solid red');
                $('#Queerror').show();
                $('#QuestionType').focus();
                return false;
            }
            else {
                $('#QuestionType').css('border', '1px solid green');
                $('#Queerror').hide();
            }
            if (QuestionString == '') {
                $("#QuestionString").css('border', '1px solid red');
                $('#Stringerror').show();
                $('#QuestionString').focus();
                return false;
            }
            else {
                $('#QuestionString').css('border', '1px solid green');
                $('#Stringerror').hide();
            }
            if (McqsOption == '') {
                $("#McqsOption").css('border', '1px solid red');
                $('#Mcqserror').show();
                $('#McqsOption').focus();
                return false;
            }
            else {
                $('#McqsOption').css('border', '1px solid green');
                $('#Mcqserror').hide();
            }
            
            return true;
            
        }
    });

    $(document).on('click', '.update', function () {
        var QuestionId = $(this).attr("id");
        $.ajax({
            url: "fetch_singleQM.php",
            method: "POST",
            data: { QuestionId: QuestionId },
            dataType: "json",
            success: function (data) {
                $('#QMModal').modal('show');
                $('#Chapter').val(data.chapter);
                $('#BookName').val(data.bookname);
                $('#QuestionType').val(data.QuestionType);
                $('#QuestionString').val(data.QuestionString);
                $('#McqsOption').val(data.McqsOption);
                $('#modal-title').text("Edit Question Master Info");
                $('#QuestionId').val(QuestionId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionQM').val("Edit");
                $('#operationQM').val("Edit");
            }
        })
    });
    $(document).on('click', '#closemodal', function () {

        $('#QMModal').remove();
        $('.modal-backdrop').remove();

    });
    $(document).on('click', '.delete', function () {
        var QuestionId = $(this).attr("id");
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
                            url: "deleteQM.php",
                            method: "POST",
                            data: { QuestionId: QuestionId }
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
        $("#Chapter").css('border', '');
        $('#chaperror').hide();

        $('#QuestionType').css('border', '');
        $('#Queerror').hide();

        $('#QuestionString').css('border', '');
        $('#Stringerror').hide();

        $('#McqsOption').css('border','');
        $('#Mcqserror').hide();
    }

});