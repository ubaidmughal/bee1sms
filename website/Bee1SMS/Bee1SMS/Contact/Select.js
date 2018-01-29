
$(document).ready(function () {
    $('#country').on('change', function () {
        var countryID = $(this).children(":selected").attr("id");
        if (countryID) {
            $.ajax({
                type: 'POST',
                url: 'select.php',
                data: 'country_id=' + countryID,
                success: function (html) {
                    $('#state').html(html);
                    $('#city').html('<option value="">Select state first</option>');
                }
            });
        } else {
            $('#state').html('<option value="">Select country first</option>');
            $('#city').html('<option value="">Select state first</option>');
        }
    });

    $('#state').on('change', function () {
        var stateID = $(this).children(":selected").attr("id");
        if (stateID) {
            $.ajax({
                type: 'POST',
                url: 'select.php',
                data: 'state_id=' + stateID,
                success: function (html) {
                    $('#city').html(html);
                }
            });
        } else {
            $('#city').html('<option value="">Select state first</option>');
        }
    });
});