<script type='text/javascript' src="../../js/jquery-3.4.1.min.js"></script>
<script>
$(document).ready(function(){
    $('#auto').load('chat-load.php');
    referesh();
});

    function referesh(){
        setTimeout( function() {
            $('#auto').fadeOut('slow').load('chat-load.php').fadeIn('slow');
            referesh();
        }, 200);
    }
</script>