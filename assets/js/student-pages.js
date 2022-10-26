    $(document).ready(function() {
        $(".custom-icon-difficulty").addClass('fa-circle-minus');
        $(".custom-icon-time").addClass('fa-circle-minus');


        $(".btn-filter-difficulty").click(function(e) {

            if ($('.btn-filter-difficulty').attr('aria-expanded') === 'true') {
                $(".custom-icon-difficulty").addClass('fa-circle-minus');
                $(".custom-icon-difficulty").removeClass('fa-circle-plus');

            } else {
                ($('.btn-filter-diffficulty').attr('aria-expanded') === 'false')
                $(".custom-icon-difficulty").removeClass('fa-circle-minus');
                $(".custom-icon-difficulty").addClass('fa-circle-plus');
            }

        });

        $(".btn-filter-time").click(function(e) {

            if ($('.btn-filter-time').attr('aria-expanded') === 'true') {
                $(".custom-icon-time").addClass('fa-circle-minus');
                $(".custom-icon-time").removeClass('fa-circle-plus');

            } else {
                ($('.btn-filter-diffficulty').attr('aria-expanded') === 'false')
                $(".custom-icon-time").removeClass('fa-circle-minus');
                $(".custom-icon-time").addClass('fa-circle-plus');
            }

        });
    });
