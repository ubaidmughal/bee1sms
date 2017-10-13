$(document).ready(function () {
    $('#add_button_School').click(function () {
        $('#School_form')[0].reset();
        $('#modal-title').text("Add School Info");
        $('#actionschool').val("Add");
        $('#operationschool').val("Add");
        $('#SchoolModal').modal('show');

    });
    var operationschool = "fetch";
    var dataTable = $('#School_data').DataTable({
        
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actionschool.php",
            type: "POST",
            data: { operationschool: operationschool }
        },
        "columnDefs": [
			{
			    "targets": [0,1,2,3,4,5],
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
        var Reg = $('#Reg').val();
        var Address = $('#Address').val();
        var Latitude = $('#Latitude').val();
        var Longitude = $('#Longitude').val();

        if (SchoolName != '' && Reg != '' && Address != '') {
            $.ajax({
                url: "Actions/actionschool.php",
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
                    resetBorder();
                    $('#SchoolModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            HideBorder();
        }
    });
    function resetBorder() {
        $('#SchoolName').css('border', '');
        $('#scherror').hide();
        $('#Reg').css('border', '');
        $('#regerror').hide();
        $('#Address').css('border', '');
        $('#addrerror').hide();
        //$('#Latitude').css('border', '');
        //$('#laterror').hide();
        //$('#Longitude').css('border', '');
        //$('#lonerror').hide();
    }
    $("input").blur(function () {
        HideBorder();
    });
    function HideBorder() {
        var SchoolName = $('#SchoolName').val();
        var Reg = $('#Reg').val();
        var Address = $('#Address').val();
        var Latitude = $('#Latitude').val();
        var Longitude = $('#Longitude').val();

        if (SchoolName == '') {

            $("#SchoolName").css('border', '1px solid red');
            $('#scherror').show();
            $('#SchoolName').focus();
            return false;
        }
        else {
                $('#SchoolName').css('border', '1px solid green');
                $('#scherror').hide();
        }

        if (Reg == '') {
            $("#Reg").css('border', '1px solid red');
            $('#regerror').show();
            $('#Reg').focus();
            return false;
        }
        else {
            $('#Reg').css('border', '1px solid green');
            $('#regerror').hide();
        }
        if (Address == '') {
            $("#Address").css('border', '1px solid red');
            $('#addrerror').show();
            $('#Address').focus();
            return false;
        }
        else {
            $('#Address').css('border', '1px solid green');
            $('#addrerror').hide();
        }
        //if (Latitude == '') {
        //    $("#Latitude").css('border', '1px solid orange');
        //    $('#laterror').show();
        //    $('#Latitude').focus();
        //    return false;
        //}
        //else {
        //    $('#Latitude').css('border', '1px solid green');
        //    $('#laterror').hide();
        //}
        //if (Longitude == '') {
        //    $("#Longitude").css('border', '1px solid orange');
        //    $('#lonerror').show();
        //    $('#Longitude').focus();
        //    return false;
        //}
        //else {
        //    $('#Longitude').css('border', '1px solid green');
        //    $('#lonerror').hide();
        //}
        return true;
    }
    $(document).on('click', '.updateSchool', function () {
        resetBorder();
        var operationschool = "fetch_single_record";
        var SchoolId = $(this).attr("id");

        $.ajax({
            url: "Actions/actionschool.php",
            method: "POST",
            data: { SchoolId: SchoolId, operationschool: operationschool },
            dataType: "json",
            success: function (data) {
                $('#SchoolModal').modal('show');
                $('#SchoolName').val(data.SchoolName);
                $('#Reg').val(data.Reg);
                $('#Address').val(data.Address);
                $('#Latitude').val(data.Latitude);
                $('#Longitude').val(data.Longitude);
                $('.modal-title').text("Edit School Info");
                $('#SchoolId').val(SchoolId);
                var $submit = $('input[type="submit"]');
                $submit.prop('disabled', true);
                $('input[type="text"]').on('input change', function () { //'input change keyup paste'
                    $submit.prop('disabled', !$(this).val().length);
                });
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionschool').val("Edit");
                $('#operationschool').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteSchool', function () {
        var operationschool = "delete";
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
                            url: "Actions/actionschool.php",
                            method: "POST",
                            data: { SchoolId: SchoolId, operationschool: operationschool }
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