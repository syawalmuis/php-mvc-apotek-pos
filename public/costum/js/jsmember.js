$(function(){
    
    //menampilka data member
    $('#dataMember').load('http://localhost/mvcelearning/public/user/viewMember')
//    tombol edit member

   $('#editm').on('click', function(){
        
    $('.modal-footer button[type=submit]').html('Delete');
        $('.modal-footer button[type=submit]').attr('id','btn-add');

        const id = $(this).data('id')
        console.log(id)

        $.ajax({
            url: 'http://localhost/mvcelearning/public/user/getEditMember',
            data: {id : id},
            type: 'post',
            dataType: 'json',
            success: function(data){

                $('#id').val(data.id)
                $('#username').val(data.username)
                $('#name').val(data.name)
                $('#email').val(data.email)
                $('#alamat').val(data.alamat)
                
            }
        })
   })

//    button add member
   $('#btn-add-member').on('click',function(){
        //    reset
       $('#id').val('');
       $('#username').val('');
       $('#name').val('');
       $('#no_tlp').val('');
       $('#alamat').val('');

       $('#modalTitle').html('Add Admin');
       $('.modal-footer button[type=submit]').html('Add');
       $('.modal-footer button[type=submit]').attr('id','btn-add');
       $('#')
       
       //insert data
       $('#btn-add').on('click',function(){
            var data = $('#form-member').serialize();

            $.jquery({
                type: 'POST',
                url: 'http://localhost/mvcelearning/public/user/addMember',
                data: data,
                success: function(){
                    swal.fire('Success','Data berhasil ditambahkan','success');
                    $('#dataMember').load('http://localhost/mvcelearning/public/user/viewMember');
                    $('form-member')[0].reset();
                }
            })
       })
   })
})