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
                url     : $('.url-shrinker').attr('action'),
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
        } else {
            alert('URL');
        }
    });

    $('.edit_url').on('click', function(){
        makeEditable(1);
    });

    $('.cancel').on('click', function(){
        makeEditable(0);
    });

    function makeEditable(edit = 1){
        let link = $('.link');
        let count = $('.count');
        let date = $('.date');

        if (edit) {
            $('.link').html("<input type='url' value='" + link.html() + "'>");
            count.html("<input type='number' value='" + count.html() + "'>");
            date.html("<input type='datetime-local' value='" + date.html() + "'>");
        } else {
            link.html(link.find('input').val());
            count.html(count.find('input').val());
            date.html(date.find('input').val());
        }

        $('.edit_url').toggleClass('hidden');
        $('.change_url').toggleClass('hidden');
        $('.cancel').toggleClass('hidden');
    }

    $('.change_url').on('click', function(){
        if (confirm("Are you sure?")) {
            let urlAction = $(this).data('href');
            let link = $('.link').val();
            let lifetime = $('.lifetime').val();

            let data = {
                link: $('.link input').val(),
                time: $('.date input').val(),
                count: $('.count input').val(),
            }

            if ($('.link input').val() !== '') {
                $.ajax({
                    type: 'PATCH',
                    url     : urlAction,
                    dataType: "JSON",
                    data    : data,
                    success: function (d) {
                        makeEditable(0);
                    }
                });
            } else {
                alert('URL');
            }
        }
    });

    $('.del-link').on('click', function(){
        if (window.confirm("Are you sure?")) {
            let row = $(this).parent();
            let urlAction = $(this).data('href');

            $.ajax({
                type: 'DELETE',
                url     : urlAction,
                dataType: "JSON",
                success: function (d) {
                    row.remove();
                }
            });
        }
    });
});