$(document).ready(function () {
  
    load_data();
    $('#SubjectNames').multiselect({
        nonSelectedText: 'Select SubjectNames',
        enableFiltering: true,
        enableCaseInsensitiveFiltering: true,
        buttonWidth: '500px'
    });
    $('#actionclass').val("Insert");
    $('#addLinkClass').click(function () {
        $('#addFormClass').slideDown();
        $('#ClassForm')[0].reset();

        $('#button_actionclass').val("Insert");
    });
    function load_data() {
       

        var dataTable = $('#user_data').DataTable({

            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "fetch.php",
                type: "POST"
            },
            "columnDefs": [
                {
                    "targets": [0, 3, 4],
                    "orderable": false,
                },
            ],
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
            ],
            rowReorder: {
                selector: 'td:nth-child(2)'
            },

            colReorder: true

        });

    }
    
    $('#ClassForm').on('submit', function (event) {
        event.preventDefault();
        var ClassName = $('#ClassName').val();
        
        if (ClassName != '') {

            $.ajax({
                url: "actionClass.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {

                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#ClassForm')[0].reset();
                    $('#SubjectNames option:selected').each(function () {
                        $(this).prop('selected', false);
                    });
                    $('#SubjectNames').multiselect('refresh');
                    load_data();
                   // $('#Class_table').html('refresh');
                    
                    $("#actionclass").val("Insert");
                    $('#button_actionclass').val("Insert");

                    $('#addFormClass').slideUp();
                }
            });
        }
        else {
            var ev = event;
            return (function () {
                var form = $(this);

                form.addClass("form--valid");

                var controller = new snapkitValidation(form);

                //Prevent form from being submitted
                if (!form.hasClass("form--valid")) {
                    ev.preventDefault();
                }
            });
        }
    });
    $(document).on('click', '.updateclass', function () {
        var Class_id = $(this).attr("id");
        var actionclass = "Fetch Single Data";
        $.ajax({
            url: "actionClass.php",
            method: "POST",
            data: { Class_id: Class_id, actionclass: actionclass },
            dataType: "json",
            success: function (data) {
                $('#addFormClass').slideDown();
                $('#ClassName').val(data.ClassName);
                $('#Sections').val(data.Section);
                $('#SubjectNames').val(data.SubjectNames);
                $('#button_actionclass').val("Edit");
                $('#actionclass').val("Edit");
                $('#Class_id').val(Class_id);

            }
        });
    });

    $(document).on('click', '.deleteclass', function (e) {
        e.preventDefault();
        var Class_id = $(this).attr("id");
        var actionclass = "delete";
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
                            url: "actionClass.php",
                            method: "POST",
                            data: { Class_id: Class_id, actionclass: actionclass }
                        })
                        .done(function (response) {
                            bootbox.alert(response);
                            bootbox.alert(response);
                            window.setTimeout(function () {
                                bootbox.hideAll();
                            }, 2000);
                            load_data();
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