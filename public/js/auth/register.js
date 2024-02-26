function save(){
    var username = $('#username').val();
    var password = $('#password').val();
    var fullname = $('#fullname').val();
   
    $.ajax({
        url: base_url+"/user/createsave",
        type: "POST",
        dataType: 'json',
        data: {
            username:username,
            password:password,
            fullname:fullname
            
        },
        async:false,
        success: function(response) {
            // console.log(data);
            if(response.error){
                    let data = response.error;
                    if(data.errorusername ){
                        $('#username').addClass('is-invalid');
                        $('.errorusername').html(data.errorusername);
                    }
                    else{
                        $('#username').removeClass('is-invalid');
                        $('#username').addClass('is-valid');
                    }
                    if(data.errorpassword ){
                        $('#password').addClass('is-invalid');
                        $('.errorpassword').html(data.errorpassword);
                    }
                    else{
                        $('#password').removeClass('is-invalid');
                        $('#password').addClass('is-valid');
                    }
                    if(data.errorfullname ){
                        $('#fullname').addClass('is-invalid');
                        $('.errorfullname').html(data.errorfullname);
                    }
                    else{
                        $('#fullname').removeClass('is-invalid');
                        $('#fullname').addClass('is-valid');
                    }
            }
            else if(response.sukses){
                location.replace(base_url+'/');
            }
        }
    }); 
    
}