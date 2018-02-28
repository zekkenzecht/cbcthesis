
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
jQuery('#check_all2').on('click', function(e) {
if($(this).is(':checked',true))
{
$(".sub_chk2").prop('checked', true);
}
else
{
$(".sub_chk2").prop('checked',false);
}
});
jQuery('#check_all3').on('click', function(e) {
if($(this).is(':checked',true))
{
$(".sub_chk3").prop('checked', true);
}
else
{
$(".sub_chk3").prop('checked',false);
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
jQuery('.sub_chk3').on('click', function(e) {
if($(this).is(':checked',true))
{
$("#check_all3").prop('checked', false);
}
else
{
$("#check_all3").prop('checked',false);
}
});

jQuery('.sub_chk2').on('click', function(e) {
if($(this).is(':checked',true))
{
$("#check_all2").prop('checked', false);
}
else
{
$("#check_all2").prop('checked',false);
}
});

$(document).ready(function() {

    $('#decline').click(function() {
   
      checked = $("input[class=sub_chk]:checked").length;
      if(!checked) {
        swal({
        type: 'error',
        title: 'Oops...',
        text: 'Please Check atleast one class to delete!',
      });
        return false;
      } 
     });
});

$(document).ready(function() {

    $('#approve').click(function() {
   
      checked = $("input[class=sub_chk2]:checked").length;
      if(!checked) {
        swal({
        type: 'error',
        title: 'Oops...',
        text: 'Please Check atleast one class to approve!',
      });
        return false;
      } 
     });
});
$(document).ready(function() {

    $('#appr').click(function() {
   
      checked = $("input[class=sub_chk3]:checked").length;
      if(!checked) {
        swal({
        type: 'error',
        title: 'Oops...',
        text: 'Please Check atleast one class to approve!',
      });
        return false;
      } 
     });
});
$(document).ready(function() {

    $('#decl').click(function() {
   
      checked = $("input[class=sub_chk3]:checked").length;
      if(!checked) {
        swal({
        type: 'error',
        title: 'Oops...',
        text: 'Please Check atleast one class to decline!',
      });
        return false;
      } 
     });
});