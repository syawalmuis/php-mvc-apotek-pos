$(function() {
    const baseurl = 'http://localhost/mvcelearning/public';

    $('#btn-scan-pr').on('click', function() {

        let load = $('#scan-produk').html();

        if (load != '') {
            alert('Silahkan scan kamera siap');
        } else {
            $('#scan-produk').load(baseurl + '/getqrcode/productload');
        }


    })



    // ====== btn scan member ===== //

    $('#scan-member').on('click', function() {


        let load = $('#scan-produk').html();

        if (load != '') {
            alert('Silahkan scan kamera siap');
        } else {
            $('#scan-produk').load(baseurl + '/getqrcode/productload');
        }


    })

    $('.cat-member').load(baseurl + '/member/show')

    $('.category-member').on('change', function() {
        let data = $('#form-cat').serialize()
        $.ajax({
            type: 'post',
            data: data,
            url: baseurl + '/member/categorySet',
            success: function() {
                // alert('Guys Yes');
                $('.cat-member').load(baseurl + '/member/category');
            }
        })
    })

    $('#search-member').on('keyup', function() {

        var data = $('#form-src').serialize();

        $.ajax({
            type: 'post',
            url: baseurl + '/member/searchsesi',
            data: data,
            success: function() {
                $('.cat-member').load(baseurl + '/member/searchpost');
            }
        })


    })

    //

    // $('.like-a').on('click', function() {
    //     alert('success');
    // })


})