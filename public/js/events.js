$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('[data-toggle="tooltip"]').tooltip();

    $('.get_url').on('click', function(){
        let link = $('.link').val();
        let lifetime = $('.lifetime').val();

        if (link != '') {
            $.ajax({
                type: 'POST',
                context : this,
                url     : "/url_shrink",
                dataType: "JSON",
                data    : {
                    link: link,
                    lifetime: lifetime,
                },
                success: function (d) {
                    let alertBox = $('.result');
                    if (d && d.success) {
                        let link = window.location.protocol +'//' + window.location.host + '/short/' + d.url;
                        alertBox.append('<div class="alert alert-success">Ссылка сгенерирована <b>' + link + '</b></div>')
                    } else {
                        alertBox.append('<div class="alert alert-danger">Что-то пошло не так</div>')
                    }
                }
            });
        }
    });
});