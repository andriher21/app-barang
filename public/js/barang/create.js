function save(){
    var name = $('#name').val();
    var kategori = $('#kategori').val();
    var harga = $('#harga').val();
    var stok = $('#stok').val();
   
    $.ajax({
        url: base_url+"/barang/createsave",
        type: "POST",
        dataType: 'json',
        data: {
            name:name,
            kategori:kategori,
            harga:harga,
            stok:stok,
        },
        async:false,
        success: function(response) {
            // console.log(data);
            if(response.error){
                    let data = response.error;
                    if(data.errorname ){
                        $('#name').addClass('is-invalid');
                        $('.errorname').html(data.errorname);
                    }
                    else{
                        $('#name').removeClass('is-invalid');
                        $('#name').addClass('is-valid');
                    }
                    if(data.errorkategori ){
                        $('#kategori').addClass('is-invalid');
                        $('.errorkategori').html(data.errorkategori);
                    }
                    else{
                        $('#kategori').removeClass('is-invalid');
                        $('#kategori').addClass('is-valid');
                    }
                    if(data.errorharga ){
                        $('#harga').addClass('is-invalid');
                        $('.errorharga').html(data.errorhargabeli);
                    }
                    else{
                        $('#harga').removeClass('is-invalid');
                        $('#harga').addClass('is-valid');
                    }
                    if(data.errorstok ){
                        $('#stok').addClass('is-invalid');
                        $('.errorstok').html(data.errorstok);
                    }
                    else{
                        $('#stok').removeClass('is-invalid');
                        $('#stok').addClass('is-valid');
                    }
            }
            else if(response.sukses){
                location.replace(base_url+'/barang');
            }
        }
    }); 
    
}