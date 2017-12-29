
    $(document).ready(function () {
        $.ajax({
            url: "../script/fill_support_dropdown",
            dataType: "html",
            crossDomain: true,
            success: function (msg) {
                $('#support_links').html(msg);
            }
        });
    });
