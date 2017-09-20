$(document).ready(function () {
    load_data();
    $('#actionB').val("Insert");
    $('#addLinkInfoBM').click(function () {
        $('#addFormBM').slideDown();
        $('#BMForm')[0].reset();
        
        $('#button_actionB').val("Insert");
    });
    function load_data() {
        var actionB = "Load";
        $.ajax({
            url: "actionBM.php",
            method: "POST",
            data: { actionB: actionB },
            success: function (data) {
                $('#BM_table').html(data);
            }
        });
    }
    $('#BMForm').on('submit', function (event) {
        event.preventDefault();
        var BookNames = $('#BookNames').val();
        var Author = $('#Author').val();
        var Publisher = $('#Publisher').val();
        var ContactPerson = $('#ContactPerson').val();
        
        if (BookNames != '' && Author != '' && Publisher != '' && ContactPerson != '') {

            $.ajax({
                url: "actionBM.php",
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function (data) {
                    bootbox.alert(data);
                    window.setTimeout(function () {
                        bootbox.hideAll();
                    }, 2000);
                    $('#BMForm')[0].reset();
                    load_data();
                    $("#actionB").val("Insert");
                    $('#button_actionB').val("Insert");
                   
                    $('#addFormBM').slideUp();
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
    $(document).on('click', '.updateb', function () {
        var book_id = $(this).attr("id");
        var actionB = "Fetch Single Data";
        $.ajax({
            url: "actionBM.php",
            method: "POST",
            data: { book_id: book_id, actionB: actionB },
            dataType: "json",
            success: function (data) {
                $('#addFormBM').slideDown();
                $('#BookNames').val(data.BookNames);
                $('#Author').val(data.Author);
                $('#Publisher').val(data.Publisher);
                $('#ContactPerson').val(data.ContactPerson);
                
                $('#button_actionB').val("Edit");
                $('#actionB').val("Edit");
                $('#book_id').val(book_id);

            }
        });
    });

    $(document).on('click', '.deleteb', function (e) {
        e.preventDefault();
        var book_id = $(this).attr("id");
        var actionB = "delete";
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
                            url: "actionBM.php",
                            method: "POST",
                            data: { book_id: book_id, actionB: actionB }
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