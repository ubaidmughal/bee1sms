$(document).ready(function () {
    load_data();
    $('#actionsection').val("Insert");
    $('#addLinkSec').click(function () {
        $('#addFormSec').slideDown();
        $('#SecForm')[0].reset();

        $('#button_actionsection').val("Insert");
    });
    function load_data() {
        var actionsection = "Load";
        $.ajax({
            url: "secaction.php",
            method: "POST",
            data: { actionsection: actionsection },
            success: function (data) {
                $('#section_table').html(data);
            }
        });
    }
    $('#SecForm').on('submit', function (event) {
        event.preventDefault();
        var SectionName = $('#SectionName').val();

        if (SectionName != '') {

            $.ajax({
                url: "secaction.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#SecForm')[0].reset();
                    load_data();
                    $("#actionsection").val("Insert");
                    $('#button_actionsection').val("Insert");

                    $('#addFormSec').slideUp();
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
    $(document).on('click', '.updatesection', function () {
        var Section_id = $(this).attr("id");
        var actionsection = "Fetch Single Data";
        $.ajax({
            url: "secaction.php",
            method: "POST",
            data: { Section_id: Section_id, actionsection: actionsection },
            dataType: "json",
            success: function (data) {
                $('#addFormSec').slideDown();
                $('#SectionName').val(data.SectionName);

                $('#button_actionsection').val("Edit");
                $('#actionsection').val("Edit");
                $('#Section_id').val(Section_id);

            }
        });
    });

    $(document).on('click', '.deletesection', function (e) {
        e.preventDefault();
        var Section_id = $(this).attr("id");
        var actionsection = "delete";
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
                            url: "secaction.php",
                            method: "POST",
                            data: { Section_id: Section_id, actionsection: actionsection }
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