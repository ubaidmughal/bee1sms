$(document).ready(function () {
    $('#add_button_Contact').click(function () {
        $('#contact_form')[0].reset();
        $('.modal-title').text("Add Contact Info");
        $('#actionContact').val("Add");
        $('#ContactModal').modal({
            backdrop: 'static',
            keyboard: false
        });
        $('#operationContact').val("Add");
      
        $('#ContactModal').modal('show');
    });

    var operationContact = "fetch";
    var dataTable = $('#Contact_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "Actions/actioncontact.php",
            type: "POST",
            data: { operationContact: operationContact }
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

    $(document).on('submit', '#contact_form', function (event) {
        event.preventDefault();
        var ContactType = $('#ContactType').val();
        var Name = $('#Name').val();
        var Address = $('#Address').val();
        var Phone = $('#Phone').val();

        if (ContactType != '' && Name != '' && Address != '' && Phone != '') {
            $.ajax({
                url: "Actions/actioncontact.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#contact_form')[0].reset();
                    $('#ContactModal').modal('hide');
                    $('.modal-backdrop').hide();
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            alert("Both Fields requireds");
        }
    });

    $(document).on('click', '.updateContact', function () {
        var operationContact = "fetch_single_record";
        var ContactId = $(this).attr("id");
        $.ajax({
            url: "Actions/actioncontact.php",
            method: "POST",
            data: { ContactId: ContactId, operationContact: operationContact },
            dataType: "json",
            success: function (data) {
                $('#ContactModal').modal('show');
                $('#ContactType').val(data.ContactType);
                $('#Name').val(data.Name);
                $('#Phone').val(data.Phone);
                $('#Email').val(data.Email);
                $('#Address').val(data.Address);
                $('#countryId').val(data.Country);
                $('#stateId').val(data.State);
                $('#cityId').val(data.City);
                $('#ZipCode').val(data.ZipCode);
                $('#SkypeId').val(data.SkypeId);
                $('#FacebookId').val(data.FacebookId);
                $('#WhatsappNo').val(data.WhatsappNo);
                $('#TwitterId').val(data.TwitterId);
                $('#DOB').val(data.DOB);
                $('#TimeOfContact').val(data.TimeOfContact);
                $('#WayOfContact').val(data.WayOfContact);
                $('#Profession').val(data.Profession);
                
                $('.modal-title').text("Edit Contact Info");
                $('#ContactId').val(ContactId);
                //$('#user_uploaded_image').html(data.user_image);
                $('#actionContact').val("Edit");
                $('#operationContact').val("Edit");
            }
        })
    });

    $(document).on('click', '.deleteContact', function () {
        var operationContact = "delete";
        var ContactId = $(this).attr("id");
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
                            url: "Actions/actioncontact.php",
                            method: "POST",
                            data: { ContactId: ContactId, operationContact: operationContact }
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