$(document).ready(function () {
    $('#add_button_Contact').click(function () {
        $('#Contact_form')[0].reset();
        $('.modal-title').text("Add Contact Info");
        $('#actionContact').val("Add");
        $('#operationContact').val("Add");

    });

    var dataTable = $('#Contact_data').DataTable({

        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {
            url: "fetchContact.php",
            type: "POST"
        },
        "columnDefs": [
			{
			    "targets": [0,1,2,3,4,5,6,7,8,9],
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

    $(document).on('submit', '#Contact_form', function (event) {
        event.preventDefault();
        var ContactType = $('#ContactType').val();
        var Name = $('#Name').val();
        var Address = $('#Address').val();
        var Phone = $('#Phone').val();
        var Email = $('#Email').val();
        var DOB = $('#DOB').val();
        var TimeOfContact = $('#TimeOfContact').val();
        var WayOfContact = $('#WayOfContact').val();
        var Profession = $('#Profession').val();

        if (ContactType != '' && Name != '' && Address != '' && Phone != '') {
            $.ajax({
                url: "insertContact.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    alert(data);
                    $('#Contact_form')[0].reset();
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

    $(document).on('click', '.update', function () {
        var ContactId = $(this).attr("id");
        $.ajax({
            url: "fetch_singleContact.php",
            method: "POST",
            data: { ContactId: ContactId },
            dataType: "json",
            success: function (data) {
                $('#ContactModal').modal('show');
                $('#ContactType').val(data.ContactType);
                $('#Name').val(data.Name);
                $('#Address').val(data.Address);
                $('#Phone').val(data.Phone);
                $('#Email').val(data.Email);
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

    $(document).on('click', '.delete', function () {
        var ContactId = $(this).attr("id");
        if (confirm("Are you sure you want to delete this?")) {
            $.ajax({
                url: "deleteContact.php",
                method: "POST",
                data: { ContactId: ContactId },
                success: function (data) {
                    alert(data);
                    dataTable.ajax.reload();
                }
            });
        }
        else {
            return false;
        }
    });


   

});