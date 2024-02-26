

function save(ids){
    var name = $('#name').val();
   
    $.ajax({
        url: base_url+"/jenisbarang/editsave",
        type: "POST",
        dataType: 'json',
        data: {
            id:ids,
            name:name,
        },
        success: function(response) {
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
        }
        else if(response.sukses){
            location.replace(base_url+'/jenisbarang');
        }
        }
    });
}