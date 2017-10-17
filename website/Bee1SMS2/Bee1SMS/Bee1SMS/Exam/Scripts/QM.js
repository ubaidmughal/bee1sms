$(document).ready(function () {
    
    var operationQM = "fetch";
    var dataTable = $('#QM_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actionQM.php",
            type: "POST",
            data: { operationQM: operationQM }
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

    $('#add_button_QM').click(function () {
        $('#QM_form')[0].reset();
        $('#modal-title').text("Add Question Master Info");
        $('#actionQM').val("Add");
        $('#operationQM').val("Add");
        $('#QMModal').modal('show');

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
                url: "Actions/actionQM.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 1500);
                    $('#QM_form')[0].reset();
                    resetBorder();
                    $('#QMModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            
            HideBorder();
            
        }
    });

    $(document).on('click', '.update', function () {
        var operationQM = "fetch_single_record";
        var QuestionId = $(this).attr("id");
        $.ajax({
            url: "Actions/actionQM.php",
            method: "POST",
            data: { QuestionId: QuestionId, operationQM: operationQM },
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
        var operationQM = "delete";
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
                            url: "Actions/actionQM.php",
                            method: "POST",
                            data: { QuestionId: QuestionId, operationQM: operationQM }
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

    $("input").blur(function () {
        HideBorder();
    });

    function HideBorder() {
        if ($("#Chapter").val() == '') {
            $("#Chapter").css('border', '1px solid red');
            $('#chaperror').show();
            $('#Chapter').focus();
            return false;
        }
        else {
            $('#Chapter').css('border', '1px solid green');
            $('#chaperror').hide();
        }
        if ($("#QuestionType").val() == '') {
            $("#QuestionType").css('border', '1px solid red');
            $('#Queerror').show();
            $('#QuestionType').focus();
            return false;
        }
        else {
            $('#QuestionType').css('border', '1px solid green');
            $('#Queerror').hide();
        }
        if ($("#QuestionString").val() == '') {
            $("#QuestionString").css('border', '1px solid red');
            $('#Stringerror').show();
            $('#QuestionString').focus();
            return false;
        }
        else {
            $('#QuestionString').css('border', '1px solid green');
            $('#Stringerror').hide();
        }
        if ($("#McqsOption").val() == '') {
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

    function resetBorder() {
        $("#Chapter").css('border', '');
        $("#QuestionType").css('border', '');
        $("#QuestionString").css('border', '');
        $("#McqsOption").css('border', '');
        $('#chaperror').hide();
        $('#Queerror').hide();
        $('#Stringerror').hide();
        $('#Mcqserror').hide();
    }

});