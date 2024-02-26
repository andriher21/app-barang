$('.produk').ready(function() {

    var table = $('#dataTable').dataTable({
        "bLengthChange" : false,
        "pageLength": 10,
         "columnDefs": [
        { 
            "targets": [ -1 ],
            "orderable": false,
            "ordering": false
        }
        ],
        
        "order": [[2, 'asc']],
      
    });
    
   

     var all = table.fnGetNodes();

    });


$('.toggle-status').on('change',function(){
    var toggle = $(this);
    setTimeout(function(){
        $.ajax({
            url: base_url+"/user/setstatus",
            type: 'post',
            dataType: 'json',
            data: {
                id: toggle.attr('data-id'),
                check: toggle.is(':checked') ? 1 : 0,
            },
            async:false
        }).done(function(check) {
            toggle.prop('checked', true);
            if(check){
                toggle.prop('checked',true);
            
            }else{
                toggle.prop('checked',false);
            }
        });
    }, 50)
})