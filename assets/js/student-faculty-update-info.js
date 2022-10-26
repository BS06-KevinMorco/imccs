$(document).ready(function() {

        var id = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: 'query/institution-getid-view.php',
            data: {
                user_id: id
            },
            dataType: 'json',
            success: function(res) {
                $('#view_modal').modal('show');
                $('#institution-view-name').val(res.name);
                $('#institution-view-street').val(res.street_name);
                $('#institution-view-barangay').val(res.barangay);
                $('#institution-view-municipality-city').val(res.municipality_city);
                $('#institution-view-province').val(res.province);
                $('#institution-view-status').val(res.status);
            }
        });

});