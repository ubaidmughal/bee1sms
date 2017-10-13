$(document).ready(function () {


    $('#add_button').click(function () {
        $('#user_form')[0].reset();
        $('.modal-title').text("Add Teacher Info");
        $('#button_action').val("Add");
        $('#action').val("Add");
        $('#userModal').modal('show');
    });

    var action = "fetch";
    var dataTable = $('#user_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "action.php",
            type: "POST",
            data: { action: action }
        },
        "columnDefs": [
			{
			    "targets": [0, 1, 2],
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
    $("input").blur(function () {
        HideBorder();
    });
    $(document).on('submit', '#user_form', function (event) {
        event.preventDefault();
        var teachercontact = $('#teacher_contact').val();
        var teacherqualification = $('#teacher_qualification').val();


        if (teachercontact != '' && teacherqualification != '') {
            $.ajax({
                url: "action.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 1500);
                    $('#user_form')[0].reset();
                    resetBorder();
                    $('#userModal').modal('hide');
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
        var TId = $(this).attr("id");
        var action = "fetch_single_record";
        $.ajax({
            url: "action.php",
            method: "POST",
            data: { TId: TId, action: action },
            dataType: "json",
            success: function (data) {
                $('#userModal').modal('show');
                $('#teacher_contact').val(data.teachercontact);
                $('#teacher_qualification').val(data.teacherqualification);
                $('.modal-title').text("Edit User");
                $('#TId').val(TId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#button_action').val("Edit");
                $('#action').val("Edit");
            }
        })
    });

   

    $(document).on('click', '.delete', function () {
        var TId = $(this).attr("id");
        var action = "delete";
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
                            url: "action.php",
                            method: "POST",
                            data: { TId: TId, action: action }
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

    function HideBorder() {
        var tcontact = $('#teacher_contact').val();
        var tqualify = $('#teacher_qualification').val();
        var contactInput = document.getElementById("teacher_contact").style;
        var qInput = document.getElementById("teacher_qualification").style;
        var contacterror = document.getElementById("tcontacterror").style;
        var qerror = document.getElementById("tqualifyerror").style;
        if (tcontact == '') {
            contactInput.border = "1px solid red";
            $('#tcontacterror').show();
            $('#teacher_contact').focus();
            return false;
        }
        else {
            contactInput.border = "1px solid green";
            $('#tcontacterror').hide();
        }
        if (tqualify == '') {
            qInput.border = "1px solid red";
            $('#tqualifyerror').show();
            $('#teacher_qualification').focus();
            return false;
        }
        else {
            qInput.border = "1px solid green";
            $('#tqualifyerror').hide();
            return false;
        }
        return true;
    }

    function resetBorder() {
        $('#teacher_contact').css('border', '');
        $('#teacher_qualification').css('border', '');
        $('#tcontacterror').hide();
        $('#tqualifyerror').hide();
    }

});