<script type='text/javascript' src="{{ asset('/backend/js/plugins/jquery-validation/jquery.validate.js') }}"></script>     
<script type="text/javascript">
var jvalidate = $("#jvalidate").validate({
    ignore: [],
    rules: {                                            
            topic: {
                    required: true,
                    minlength: 5,
                    maxlength: 255
            },
            
               passage: {
                    required: true,
                    minlength: 5,
                    maxlength: 255
            },

            content: {
                    required: true,
                    minlength: 20,
                    maxlength: 4096
            },

            date: {
                    required: true,
            },
            
        }                                        
    });       

</script> 