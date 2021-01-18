$(function() {

    $('.tombolTambahData').on('click', function(){
        $('#staticBackdropLabel').html('Tambah Data Santri');
        $('.modal-footer button[type=submit]').html('Tambahkan');

    });

    $('.modalEdit').on('click', function(){
        
        $('#staticBackdropLabel').html('Edit Data Santri');
        $('.modal-footer button[type=submit]').html('Edit');
        $('.modal-body form').attr('action', 'http://localhost/MVC/public/Santri/edit')

        const id = $(this).data('id');
       
        $.ajax({

            url: 'http://localhost/MVC/public/Santri/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
                $('#nama').val(data.nama);
                $('#divisi').val(data.divisi);
                $('#status').val(data.status);
                $('#id').val(data.id);
            }
        });
    });

});