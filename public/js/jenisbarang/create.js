

function save(){
    var name = $('#name').val();
    $.ajax({
        url: base_url+"/jenisbarang/createsave",
        type: "POST",
        dataType: 'json',
        data: {
            name:name,
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
                   
            }
            else if(response.sukses){
                location.replace(base_url+'/jenisbarang');
            }
        }
    }); 
    
}