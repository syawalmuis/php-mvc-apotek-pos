$(function() {
    const baseurl = 'http://localhost/mvcelearning/public';

    $('.select-code').on('click', function() {
        let code = $(this).data('id');


        let exp = code.split("-", 2);


        // console.log(code);
        // console.log(exp);
        $('#code').val(exp[0]);
        $('#qty-check').val(exp[1]);
        var inv = $('#inv-4').html();

        $('#inv-1').val(inv);


    })



})