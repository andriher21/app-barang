
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
    $('#searchbox').keyup(function() {
        table.fnFilter($(this).val());
        });
    $('.kategori-filter').change(function(){
         table.fnFilter($(this).val(), -1);
        id = $('#kategori_filter').val();
         if (id == ''){
             id = 'undefined';
         }
      // console.log(id);
     });
   

     var all = table.fnGetNodes();

    });

function deleted(ids,nama){

    var nameToDelete = '<b>Are you sure to delete this data?</b><ol class="m-t-8 p-l-20">';
    nameToDelete += '<li>'+nama+'</li>';
    nameToDelete += '</ol>';
    confirmation(nameToDelete, 'doDelete("'+ids+'")');

}

function doDelete(id){
  
    $.ajax({
        url: base_url+"/jenisbarang/delete",
        type: 'post',
        dataType: 'json',
        data: {id: id},
        async:false,
        success: function(data){
            // console.log(data);
            location.reload(true);
        }
    });
    
}



