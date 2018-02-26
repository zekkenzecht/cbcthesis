jQuery('#check_all').on('click', function(e) {
if($(this).is(':checked',true))  
{
$(".sub_chk").prop('checked', true);  
}  
else  
{  
$(".sub_chk").prop('checked',false);  
}  
});

jQuery('.sub_chk').on('click', function(e) {
if($(this).is(':checked',true))  
{
$("#check_all").prop('checked', false);  
}  
else  
{  
$("#check_all").prop('checked',false);  
}  
});


$(document).ready(function() {

    $('#blkdelete').click(function() {
   
      checked = $("input[class=sub_chk]:checked").length;
      if(!checked) {
        swal({
        type: 'error',
        title: 'Oops...',
        text: 'Please Check atleast one devotion to delete!',
      });
        return false;
      } 
     });
});