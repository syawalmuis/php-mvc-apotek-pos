$(function() {
    const baseurl = 'http://localhost/mvcelearning/public';



    $('.like-a').on('click', function() {
        let string = $(this).data('id');
        let data = string.split('-');
        let val = data[1];
        let code = data[0];
        let url = $('#url-member').html();
        // console.log(val, code, url, data);


        if (parseInt(val) == 0) {
            // alert('0');
            $.ajax({
                type: 'POST',
                data: { code: code },
                url: baseurl + '/Like/Tambah',
                success: function() {
                    $('.cat-member').load(baseurl + '/member/' + url);
                    //  alert("BRO");
                }
            })


        } else {
            $.ajax({
                type: 'post',
                data: { code: code },
                url: baseurl + '/Like/kurang',
                success: function() {
                    $('.cat-member').load(baseurl + '/member/' + url);
                }
            })
        }
        // $('#like-icon-' + data[0]).css('color', 'red');
        // $('#like-icon-' + data[0]).removeClass('far fa-heart');
        // $('#like-icon-' + data[0]).addClass('fas fa-heart');

        // $('#like-icon-' + data[0]).css('color', 'black');
        // $('#like-icon-' + data[0]).removeClass('fas fa-heart');
        // $('#like-icon-' + data[0]).addClass('far fa-heart');

    })




})