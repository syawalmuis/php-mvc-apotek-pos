/*===Fungsi validasi===*/
function validasi() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    if (username != "" && password != "") {
        return true;
    } else {
        alert('Username dan Password harus di isi!');
        return false;
    }
}
$(function() {
    let cek = 'Umum';
    $('#csm-fix').val(cek)


    const baseurl = 'http://localhost/mvcelearning/public';

    $('.modalAdd').on('click', function() {

        $('#titleModal').html('Add Data Product');
        $('.modal-footer button[type=submit]').html('Add');

        //mengrahkan ke controler home_a method tambah
        $('.modal-body form').attr('action', 'http://localhost/mvcelearning/public/home_a/tambah')

        //mengambil value code dari hide input
        var code = $('#hide').val();

        //membuat kode
        // $('#category').on('change',function(){
        //     var nilai = $('#category').val();
        //     var ct;
        //     if(nilai=="Flu & Batuk"){
        //         ct="fb"
        //     }else if(nilai=="Saluran Pencernaan"){
        //         ct="sp"
        //     }else if(nilai=="Vitamin & Suplemen"){
        //         ct="vs"
        //     }else if(nilai=="Demam"){
        //         ct="dm"
        //     }else if(nilai=="Herbal"){
        //         ct="hb"
        //     }else if(nilai=="Mata"){
        //         ct="mt"
        //     }else{
        //         ct="terlewat"
        //     };

        //     $('#code').val(ct+code)
        // })

        //informasi
        $('#type').on('change', function() {

                var a = $('#type').val();
                var b;

                switch (a) {
                    case 'Biru':
                        b = 'Obat bebas terbatas'
                        break
                    case 'Merah':
                        b = 'Obat keras'
                        break
                    case 'Hijau':
                        b = 'Obat bebas'
                        break
                    default:
                        b = 'ok'
                }
                var c = b;

                $('#info').val(c);

            })
            //reset
        $('#code').val(code);
        $('#unit').val('Botol');
        $('#name').val('');
        $('#info').val('Bebas terbatas');
        $('#category').val('Flu & Batuk');
        $('#type').val('Biru');
        $('#price').val('');
        $('#stock').val('');


    });


    //Tombol edit product
    $('.modalEdit').on('click', function() {
        $('#titleModal').html('Edit Data Product');
        $('.modal-footer button[type=submit]').html('Save');
        $('.modal-body form').attr('action', 'http://localhost/mvcelearning/public/home_a/edit');


        //informasi
        $('#type').on('change', function() {

            var a = $('#type').val();
            var b;

            switch (a) {
                case 'Biru':
                    b = 'Obat bebas terbatas'
                    break
                case 'Merah':
                    b = 'Obat keras'
                    break
                case 'Hijau':
                    b = 'Obat bebas'
                    break
                default:
                    b = 'ok'
            }
            var c = b;

            $('#info').val(c);

        })
        const code = $(this).data('id');



        $.ajax({
            url: 'http://localhost/mvcelearning/public/home_a/getedit',
            data: { code: code },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                $('#code').val(data.code);
                $('#name').val(data.name);
                $('#category').val(data.category);
                $('#type').val(data.type);
                $('#unit').val(data.unit);
                $('#price').val(data.price);
                $('#stock').val(data.stock);
                $('#info').val(data.info);
                $('#img-hide').val(data.image)

                //   $('#category').on('change',function(){
                //     var nilai = $('#category').val();
                //     var ct;
                //     if(nilai=="Flu & Batuk"){
                //         ct="fb"
                //     }else if(nilai=="Saluran Pencernaan"){
                //         ct="sp"
                //     }else if(nilai=="Vitamin & Suplemen"){
                //         ct="vs"
                //     }else if(nilai=="Demam"){
                //         ct="dm"
                //     }else if(nilai=="Herbal"){
                //         ct="hb"
                //     }else if(nilai=="Mata"){
                //         ct="mt"
                //     }else{
                //         ct="terlewat"
                //     };

                //     $('#code').val(ct+code)
                // })

            }
        })
    })





    //menampilkan data admin
    //$('#dataAd').load('http://localhost/mvcelearning/public/user/viewAdmin')
    //menambah data Admin
    $('.modalAddAdmin').on('click', function() {

        var idOto = $('#idhide').val();

        //    reset
        $('#id').val(idOto);
        $('#username').val('');
        $('#name').val('');
        $('#no_tlp').val('');
        $('#alamat').val('');
        $('#email').val('');
        $('#pass').val('');
        $('#img-hide').val('');

        $('#modalTitleAdmin').html('Add Data Admin');
        $('.modal-footer button[type=submit]').html('Add')

        $('.modal-body form').attr('action', 'http://localhost/mvcelearning/public/user/addAdmin')

        // insert data ajax
        /*    $('#btn-add').click(function(){
                var data = $('#form-admin').serialize();
    
               
                $('#btn-add').attr('data-dismiss','modal');
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/mvcelearning/public/user/addAdmin',
                    data: data,
                    success: function(){
                        $('#dataAd').load('http://localhost/mvcelearning/public/user/viewAdmin')
                        
                        $('#form-admin')[0].reset();
                       
                        swal.fire(
                            'Success',
                            'Data berhasil ditambahkan',
                            'success'
                        )
                    }
                })
            })*/
    })

    $('.modalEditAdmin').on('click', function() {

        $('#modalTitleAdmin').html('Edit Data Admin');
        $('.modal-footer button[type=submit]').html('Save');
        $('.modal-body form').attr('action', 'http://localhost/mvcelearning/public/user/saveAdmin');

        const id = $(this).data('id');

        $.ajax({
            url: baseurl + '/user/getEditAdmin',
            type: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id)
                $('#username').val(data.username)
                $('#email').val(data.email)
                $('#name').val(data.name)
                $('#alamat').val(data.alamat)
                $('#pass').val(data.password)
                $('#img-hide').val(data.image)
            }
        })
    })


    //form member
    //button add
    $('.add-member').on('click', function() {

        $('#modalTitle').html('Add Data Member');
        $('#form-member').attr('action', baseurl + '/user/addMember')

        $('.modal-footer button[type=submit]').html('Add')
            // id
        var idOto = $('#hide-id').val();

        // reset
        $('#id').val(idOto);
        $('#username').val('');
        $('#name').val('');
        $('#no_tlp').val('');
        $('#alamat').val('');
        $('#email').val('');
        $('#pass').val('');
        $('#img-hide').val('');

    })

    $('.edit-member').on('click', function() {
        $('#modalTitle').html('Edit Data Member');
        $('#form-member').attr('action', baseurl + '/user/saveMember');


        $('.modal-footer button[type=submit]').html('Save');

        const id = $(this).data('id');

        $.ajax({
            url: baseurl + '/user/getEditMember',
            type: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function(data) {
                $('#id').val(data.id)
                $('#username').val(data.username)
                $('#email').val(data.email)
                $('#name').val(data.name)
                $('#alamat').val(data.alamat)
                $('#pass').val(data.password)
                $('#img-hide').val(data.image)
                $('#usr-hide').val(data.username)
            }
        })
    })


    //    page suplai

    // code product change
    $('.code-product').on('change', function() {

            var nilai = $('#code-product').val();

            $.ajax({
                type: 'POST',
                url: baseurl + '/suplai/getName',
                data: { code: nilai },
                dataType: 'json',
                success: function(data) {
                    $('#name-product').val(data.name)
                    $('#stock-awal').val(data.stock)
                }
            })

        })
        //end code product change

    // code product change modal
    $('.modal-product-code').on('change', function() {

            var nilai = $('#modal-product-code').val();

            $.ajax({
                type: 'POST',
                url: baseurl + '/suplai/getName',
                data: { code: nilai },
                dataType: 'json',
                success: function(data) {
                    $('#modal-product-name').val(data.name)
                    $('#modal-product-stock').val(data.stock)
                }
            })

        })
        //end code product change modal

    //name supplier change
    $('.supp-name').on('change', function() {

            var char = $('#supp-name').val()

            $.ajax({
                type: 'POST',
                url: baseurl + '/suplai/getAddr',
                data: { supp_name: char },
                dataType: 'json',
                success: function(data) {
                    $('#addr-supp').val(data.supp_addr)
                }
            })
        })
        //end name supplier chane

    // detail supplier

    $('.detail-supp').on('click', function() {

            // readonly attribut
            $('#modal-supp-name').attr('readonly', true)
            $('#modal-supp-addr').attr('readonly', true)
            $('#modal-supp-note').attr('readonly', true)
            $('#modal-supp-date').attr('readonly', true)
            $('#modal-stock-in').attr('readonly', true)
            $('#modal-supp-code').attr('readonly', true)
            $('#modal-product-code').attr('readonly', true)
            $('#modal-product-name').attr('readonly', true)
            $('#stock-first').attr('readonly', true)
                //end readonly attribut

            //btn-save hidden
            $('.btn-save-supp').attr('hidden', true);
            //end btn-save hidden

            var id = $(this).data('id');

            $.ajax({
                type: 'post',
                url: baseurl + '/suplai/detail',
                data: { id_supp: id },
                dataType: 'json',
                success: function(data) {

                    $('#modal-supp-name').val(data.supp_name)
                    $('#modal-product-code').val(data.code)
                    $('#modal-product-name').val(data.name)
                    $('#modal-stock-in').val(data.stock_supp)
                    $('#modal-supp-date').val(data.supp_date)
                    $('#modal-supp-addr').val(data.supp_addr)
                    $('#modal-supp-note').val(data.supp_note)
                    $('#stock-first').val(data.stock_first)
                }
            })
        })
        //end detail


    // edit page stock in
    $('.edit-supp').on('click', function() {

        // readonly attribut
        $('#modal-supp-name').attr('readonly', false)
        $('#modal-supp-addr').attr('readonly', false)
        $('#modal-supp-note').attr('readonly', false)
        $('#modal-supp-date').attr('readonly', false)
        $('#modal-stock-in').attr('readonly', false)
        $('#modal-supp-code').attr('readonly', false)
        $('#modal-product-code').attr('readonly', false)
        $('#modal-product-name').attr('readonly', true)
        $('#stock-first').attr('readonly', false)
            //end readonly attribut

        $('#modal-stock-first').val(0);

        //btn-save show
        $('.btn-save-supp').attr('hidden', false);
        //end btn-save show

        var id_supp = $(this).data('id');
        console.log(id_supp)


        $.ajax({

            type: 'post',
            url: baseurl + '/suplai/detail',
            data: { id_supp: id_supp },
            dataType: 'json',
            success: function(data) {
                $('#modal-id-supp').val(data.id_supp)
                $('#modal-supp-name').val(data.supp_name)
                $('#modal-product-code').val(data.code)
                $('#modal-product-name').val(data.name)
                $('#modal-stock-in').val(data.stock_supp)
                $('#modal-supp-date').val(data.supp_date)
                $('#modal-supp-addr').val(data.supp_addr)
                $('#modal-supp-note').val(data.supp_note)
                $('#stock-first').val(data.stock_supp)
                $('#stock-end').val(data.stock_supp)
                $('#code_1').val(data.code)
                $('#stock-first-supp').val(data.stock_first)

            }

        })

        var code = $('.edit-supp').attr('id');

        $.ajax({
            type: 'post',
            url: baseurl + '/suplai/ajaxpr',
            data: { code: code },
            dataType: 'json',
            success: function(pr) {

                $('#modal-product-stock').val(pr.stock)

            }
        })
    })


    // $('.btn-save-supp').on('click', function () {

    //     var data = $('#modal-supp').serialize();
    //     console.log(data);

    //     $.ajax({
    //         type: 'POST',
    //         url: baseurl + '/suplai/editSupp',
    //         data: data,
    //         success: function () {
    //             alert('Data berhasil')
    //             window.location = baseurl + '/suplai';


    //         }

    //     })

    //})
    // edit page stock in

    // reset form insert supp
    $('.reset-supp').on('click', function() {;
            $('#supp-name').val('');
            $('#code-product').val('---- Choose ----');
            $('#name-product').val('');
            $('#stock').val(0);
            $('#addr-supp').val('');
            $('#date-supp').val('');
            $('#note-supp').val('');

        })
        //end form insert supp

    //stock tdk boleh <0

    function openErr() {
        document.getElementById("err-stock").innerHTML = "Nilai tidak boleh lebih kecil dari 0";
        setTimeout(function() {
            document.getElementById("err-stock").innerHTML = "Nilai aja";
        }, 3000)
    }
    $('#stock').on('change', function() {

        var stock = $('#stock').val();

        if (stock < 0) {

            document.getElementById("err-stock").innerHTML = 'value cannot be less than zero';
            setTimeout(function() {
                document.getElementById("err-stock").innerHTML = "";
            }, 5000)
            $('#stock').val(0);

        } else {
            document.getElementById("err-stock").innerHTML = "";
        }


    })
    $('#stock').on('keyup', function() {

        var stock = $('#stock').val();

        if (stock < 0) {

            document.getElementById("err-stock").innerHTML = 'nilai tidak boleh lebih kecil dari nol';
            setTimeout(function() {
                document.getElementById("err-stock").innerHTML = "";
            }, 5000)
            $('#stock').val(0);

        } else {
            document.getElementById("err-stock").innerHTML = "";
        }


    })

    //end stock < 0

    //supp data

    //edit
    $('.edit-supp-data').on('click', function() {

            var id = $(this).data('id');
            $.ajax({
                type: 'post',
                url: baseurl + '/supp_data/editdetail',
                data: { id: id },
                dataType: 'json',
                success: function(data) {
                    console.log(data.supp_addr);
                    $('#modal-supp-data-name').val(data.supp_name)
                    $('#modal-supp-data-addr').val(data.supp_addr)
                    $('#modal-supp-data-email').val(data.supp_contact)
                    $('#modal-supp-data-id').val(data.id)
                }
            })
        })
        //end edit

    /* ===STOCK OUT=== */

    //code on change
    $('.code-stock-out').on('change', function() {

            var code = $('#code').val()

            $.ajax({
                type: 'post',
                url: baseurl + '/suplai/ajaxpr',
                data: { code: code },
                dataType: 'json',
                success: function(data) {
                    $('#name').val(data.name);
                    $('#stock').val(data.stock);
                }
            })
        })
        //end code on change

    //btn add show
    $('.btn-add-show').on('click', function() {
            var x = document.getElementById("add-content");
            x.style.display = "block";
            x.style.animation = "mymove 3s";
            x.style.opacity = "1";
            $('#btn-add-show').css('display', 'none')
        })
        //end btn add show

    //btn add show
    $('.close-content').on('click', function() {
            var x = document.getElementById("add-content");
            var y = document.getElementById("btn-add-show")
            y.style.opacity = "0";
            y.style.display = "block";
            y.style.animation = "mymove 3s";
            y.style.opacity = "1";
            x.style.display = "none";
        })
        //end btn add show

    //edit show
    $('.btn-edit-so').on('click', function() {
            var id = $(this).data('id');


            $.ajax({
                type: 'post',
                url: baseurl + '/stock_out/editshow',
                data: { id: id },
                dataType: 'json',
                success: function(data) {

                    $('#modal-code').val(data.code)
                    $('#modal-name').val(data.name)
                    $('#modal-out').val(data.stock_out)
                    $('#modal-out-first').val(data.stock_out)
                    $('#modal-info').val(data.info)
                    $('#modal-date').val(data.date)
                    $('#modal-stock').val(data.stock)
                    $('#modal-stock-first').val(data.stock_first)
                    $('#modal-code-product').val(data.code)
                    $('#modal-id').val(data.id)


                }
            })

            var code = $('.btn-edit-so').attr('id');

            $.ajax({
                type: 'post',
                url: baseurl + '/suplai/ajaxpr',
                data: { code: code },
                dataType: 'json',
                success: function(pr) {

                    $('#modal-stock-product').val(pr.stock)

                }
            })
        })
        //end edit show

    //modal code on change
    $('.modal-code').on('change', function() {

            var code = $('#modal-code').val()

            $.ajax({
                type: 'post',
                url: baseurl + '/suplai/ajaxpr',
                data: { code: code },
                dataType: 'json',
                success: function(data) {
                    $('#modal-name').val(data.name);
                    $('#modal-stock-product').val(data.stock);
                }
            })
        })
        //end code on change


    /* ===END STOCK OUT */

    /* ===== SALE ===== */

    //jam
    setInterval(timestamp, 1000);

    function timestamp() {
        $.ajax({
            url: baseurl + ('/sale/date'),
            success: function(data) {
                $('#date').val(data);
            }
        })
    }
    //end jam

    //invoice
    $('#customer').on('click', function() {

        let cek = 'umum';
        let char = $('#date').val();
        let sbtll = $('#sub-ttl1').val();
        let inv = $('#inv-4').html();

        $('#dsc-ttl').html('0%');
        let art = 0;
        let art1 = sbtll - (sbtll * art)
        $('#grand-ttl').html(art1)
        $('#total-2').html(art1)
        $('#dsc-fix').val(0)
        $('#ttl-fix').val(art1)
        $('#cek').val(cek);
        $('#invoice').val(inv);
        $('#csm-fix').val(cek);




        // if (inv_cek !== '') {
        //     alert('Silahkan Print Invoice')
        // } else {

        /*if (cek == "" || cek == "umum") {
            $('#dsc-ttl').html('0%');
            var art = 0;
            var art1 = sbtll - (sbtll * art)
            $('#grand-ttl').html(art1)
            $('#total-2').html(art1)
            $('#dsc-fix').val(0)
            $('#ttl-fix').val(art1)

        } else {
            $('#dsc-ttl').html('15%');
            var art = 0.15;
            var art1 = sbtll - (sbtll * art)
            $('#grand-ttl').html(art1)
            $('#total-2').html(art1)
            $('#dsc-fix').val(0.15)
            $('#ttl-fix').val(art1)

        }*/
        // }
        //end invoice

    })

    //select code
    // $('.select-code').on('click', function () {
    //     var code = $(this).data('id');

    //     console.log('code');

    //     var stock = $('#stock-pr').val();

    //     if (stock <= 0) {
    //         alert('Stock lebih kecil dari 0')
    //     } else {

    //         $('#code').val(code);
    //         $('#qty-check').val(stock)
    //         var inv = $('#inv-4').html();

    //         $('#inv-1').val(inv);



    //     }
    // })
    // end  select code

    //stock tdk boleh <0


    $('#qty').on('change', function() {

        var stock = $('#qty').val();
        var stockcheck = $('#qty-check').val();

        if (parseInt(stock) > parseInt(stockcheck)) {

            document.getElementById("qty-error").innerHTML = 'sisa stock ' + stockcheck;
            setTimeout(function() {
                document.getElementById("qty-error").innerHTML = "";
            }, 5000)
            $('#qty').val(0);

        } else {
            document.getElementById("qty-error").innerHTML = "";
        }


    })

    $('#qty').on('keyup', function() {

        let stock = $('#qty').val();
        let stockcheck = $('#qty-check').val();

        if (parseInt(stock) > parseInt(stockcheck)) {

            document.getElementById("qty-error").innerHTML = 'sisa stock ' + stockcheck;
            setTimeout(function() {
                document.getElementById("qty-error").innerHTML = "";
            }, 5000)
            $('#qty').val(0);

        } else {
            document.getElementById("qty-error").innerHTML = "";
        }


    })

    //end stock < 0


    /* ====== Transaction ======*/
    $('.load-table').load(baseurl + '/sale/viewTr')
    $('#ttl1').load(baseurl + '/sale/ttl1')
    $('.ttl2').load(baseurl + '/sale/ttl2')
    $('.modal-load').load(baseurl + '/sale/modal')
        /* ====== End Transaction ======*/

    $('.btn-add-tr').click(function() {


        var data = $('#form-add-tr').serialize();


        let inv = $('#inv-4').html();
        let code = $('#code').val();
        let qty = $('#qty').val();



        $.ajax({
            type: 'post',
            data: { inv_1: inv, code: code, qty: qty },
            url: baseurl + '/sale/add',
            success: function() {
                $('.load-table').load(baseurl + '/sale/viewTr')
                $('#ttl1').load(baseurl + '/sale/ttl1')
                $('.ttl2').load(baseurl + '/sale/ttl2')
                $('.modal-load').load(baseurl + '/sale/modal')
                alert('Produk ditambahkan');
                $('#code').val('');
                $('#qty-check').val(0)
                $('#qty').val(0)


            }
        })
    })


    //kembalian
    $('.cash').on('keyup', function() {

            let cash = $(this).val();
            let gt = $('#grand-ttl').html();
            let cash_fix = $('#cash-fix').val();

            let ttl = cash - gt;
            let cust = $('#csm-fix').val()
            if (ttl < 0) {
                $('#change').html('');

            } else {

                if (cust == 'Umum') {
                    $('#change').html(ttl);
                    $('#cash-fix').val(cash);
                    // let cek = 'umum';
                    let char = $('#date').val();
                    let sbtll = $('#sub-ttl1').val();
                    let inv = $('#inv-4').html();
                    $('#dsc-ttl').html('0%');
                    let art = 0;
                    let art1 = sbtll - (sbtll * art)
                    $('#grand-ttl').html(art1)
                    $('#dsc-fix').val(0)
                    $('#total-2').html(art1)
                    $('#ttl-fix').val(art1)
                        // $('#cek').val(cek);
                    $('#invoice').val(inv);
                    // $('#csm-fix').val(cek);
                } else {
                    $('#change').html(ttl);
                    $('#cash-fix').val(cash);
                }


            }

            $('#change-i').val(ttl);
        })
        //kembalian

    // $('.re-load').on('doubleclick', function () {

    //     window.location = baseurl + '/sale';
    // })

    //proses
    $('.btn-proses').on('click', function() {

            var inv = $('#csm-fix').val();
            var cash = $('#cash').val();
            if (inv == '') {
                alert('Silahkan pilih customer');
                return false;
            } else {
                if (cash == '') {
                    alert('Silahkan input cash');
                    return false;
                } else {
                    var data = $('#form-proses').serialize();

                    $.ajax({
                        type: 'post',
                        data: data,
                        url: baseurl + '/sale/proses',
                        success: function() {
                            $('.load-table').load(baseurl + '/sale/viewTr')
                            $('#ttl1').load(baseurl + '/sale/ttl1')
                            $('.ttl2').load(baseurl + '/sale/ttl2')
                            $('.modal-load').load(baseurl + '/sale/modal')
                            $('#cash').val('');
                            $('#change').html('');
                            if (confirm('Print Struk')) {

                                $.ajax({
                                    type: 'post',
                                    data: data,
                                    url: baseurl + '/sale/print',
                                    success: function() {
                                        window.open(baseurl + '/Pdf/tcpdf');
                                        //window.open(baseurl + '/Pdf/invoice');
                                        $('#invoice').val('')
                                        $('#dsc-fix').val('')
                                        $('#cash-fix').val('')
                                        $('#csm-fix').val('Umum')
                                        $('#ttl-fix').val('')
                                    }
                                })
                            } else {
                                $('#invoice').val('')
                                $('#dsc-fix').val('')
                                $('#cash-fix').val('')
                                $('#csm-fix').val('Umum')
                                $('#ttl-fix').val('')
                            }

                        }

                    })
                }
            }
        })
        //end proses

    //print
    // $('.print-inv').on('click', function () {
    //     //     var inv = $('#invoice').val();
    //     //     var inv = $('#cash-fix').val();

    //     //     if (inv == '') {
    //     //         alert('Silahkan pilih customer');
    //     //         return false;
    //     //     } else {
    //     //         if (cash == '') {
    //     //             alert('Silahkan input cash');
    //     //             return false;
    //     //         }
    //     //     }
    //     $('#invoice').val('')
    //     $('#cash-fix').val('')
    //     $('#dsc-fix').val('')
    //     $('#ttl-fix').val('')
    //     $('#csm-fix').val('')
    // })
    //print





    /* ===== End SALE ===== */

    $('.cat-show').load(baseurl + '/Home/product')

    $('.category').on('change', function() {
        var data = $('#form-cat').serialize()

        $.ajax({
            type: 'post',
            data: data,
            url: baseurl + '/home/categorySet',
            success: function() {
                $('.cat-show').load(baseurl + '/home/category')
            }
        })
    })

    $('#tes56').on('click', function() {
        var data = $('#form-src').serialize();
        console.log(data);

        $.ajax({
            type: 'post',
            data: data,
            url: baseurl + '/home/searchpost',
            dataType: 'json',
            success: function(response) {
                $('cat-show').load(baseurl + '/home/category/' + response);
            }
        })
    })

    /* var keyword = document.getElementById('category');


    keyword.addEventListener('change', function () {


        console.log(keyword.value);

        var xhr = new XMLHttpRequest();
        // if (keyword.value == '') {
        //     return false;
        // } else {
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                $('.cat-show').html(xhr.responseText);
                //$('.cat-show').load(baseurl + '/home/show');

            }
        }

        xhr.open('POST', baseurl + '/home/category/' + keyword.value)
        xhr.send()
        // }
    }) */

    // $('#category').on('change', function () {

    //     $('.cat-show').load(baseurl + '/home/category/' + $('#change').val());

    // })

    $('#search-usr').on('keyup', function() {

        var data = $('#form-src').serialize();

        $.ajax({
            type: 'post',
            url: baseurl + '/home/searchsesi',
            data: data,
            success: function() {
                $('.cat-show').load(baseurl + '/home/searchpost');
            }
        })


    })

    $('.print-member').on('click', function() {

        let data = $(this).data('id');
        console.log(data)


        $.ajax({
            type: 'post',
            data: { id: data },
            url: baseurl + '/pdf/cardget',
            dataType: 'json',
            success: function(response) {
                console.log(response);
                window.open(baseurl + '/pdf/card')
            }

        })
    })

})