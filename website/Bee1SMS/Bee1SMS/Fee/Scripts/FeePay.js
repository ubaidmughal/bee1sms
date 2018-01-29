$(document).ready(function () {
    
    var operationFeePay = "fetch";
    var dataTable = $('#FeePay_Data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actionFeePay.php",
            type: "POST",
            data: { operationFeePay: operationFeePay }
        },
        "columnDefs": [
			{
			    "targets": [0,1,2,3,4,5,6,7,8],
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

    $('#add_button_FeePay').click(function () {
        $('#FeePay_form')[0].reset();
        $('#modal-title').text("Add Question Master Info");
        $('#actionFeePay').val("Add");
        $('#operationFeePay').val("Add");
        $('#FeePayModal').modal('show');
        var operationFeePay = "max_code";

        var DocEntry = $(this).attr("id");
        $.ajax({
            url: "Actions/actionFeePay.php",
            method: "POST",
            data: { DocEntry: DocEntry, operationFeePay: operationFeePay },
            dataType: "json",
            success: function (data) {
                $('#DocNumber').val(data.DocNumber);
            }
        });

    });

    $("#Class").on('change', function () {
        getSection();
    });


    $("#Section").on('change', function () {
        getStudentName();
    });


    function getStudentName() {
        var operationFeePay = "getnames";
        var Section = $('#Section').val();

        $.ajax({
            url: "Actions/actionFeePay.php",
            method: "POST",
            data: { Section: Section, operationFeePay: operationFeePay },
            dataType: "json",
            success: function (data) {
                $('#StudentName').empty();
                $('#StudentName').append("<option value='0'>--Select--</option>")
               $.each(data, function (i) {

                   $('#StudentName').append("<option>" + data[i] + "</option>");

               });
                    

            }
        });

        

    }

    function getSection() {
        var operationFeePay = "getsection";
        var Class = $('#Class').val();

        $.ajax({
            url: "Actions/actionFeePay.php",
            method: "POST",
            data: { Class: Class, operationFeePay: operationFeePay },
            dataType: "json",
            success: function (data) {
                $('#Section').empty();
                $('#Section').append("<option value='0'>--Select--</option>")
                $.each(data, function (i) {

                    $('#Section').append("<option>" + data[i] + "</option>");

                });


            }
        });



    }

    $(document).on('submit', '#FeePay_form', function (event) {
        event.preventDefault();
        var DocNumber = $('#DocNumber').val();
      
       

        if(DocNumber != '')
        {
            $.ajax({
                url: "Actions/actionFeePay.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 1500);
                    $('#FeePay_form')[0].reset();
                 
                    $('#FeePayModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            
         
            
        }
    });

    $(document).on('click', '.update', function () {
        var operationFeePay = "fetch_single_record";
        var DocEntry = $(this).attr("id");
        $.ajax({
            url: "Actions/actionFeePay.php",
            method: "POST",
            data: { DocEntry: DocEntry, operationFeePay: operationFeePay },
            dataType: "json",
            success: function (data) {
                $('#FeePayModal').modal('show');
                $('#DocNumber').val(data.DocNumber);
                $('#Class').val(data.Class);
                $('#Section').val(data.Section);
                $('#StudentName').val(data.StudentName);
                $('#DueType').val(data.DueType);

                $('#PayableAmount').val(data.PayableAmount);
                $('#PaidAmount').val(data.PaidAmount);
                $('#DueDate').val(data.DueDate);
                $('#DocDate').val(data.DocDate);
                $('#modal-title').text("Edit Fee Payable");
                $('#DocEntry').val(DocEntry);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionFeePay').val("Edit");
                $('#operationFeePay').val("Edit");
            }
        })
    });

    $(document).on('click', '#closemodal', function () {

        $('#FeePayModal').remove();
        $('.modal-backdrop').remove();

    });

    $(document).on('click', '.delete', function () {
        var operationFeePay = "delete";
        var DocEntry = $(this).attr("id");
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
                            url: "Actions/actionFeePay.php",
                            method: "POST",
                            data: { DocEntry: DocEntry, operationFeePay: operationFeePay }
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