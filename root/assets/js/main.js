const siteUrl = 'http://portfolio.local/';

//// download counter

$('.downloadCounter').click(function (e) {

    let counter = $('#d_id').text();



    $.ajax({
        url: siteUrl + 'ajax/downloadCounter.php',
        method: 'POST',
        data: {"counter": counter},
        dataType: "text",
        async: false,
        global: false,
        success: function (data) {

            // $('.loading').addClass('d-none');
        }
    })

});