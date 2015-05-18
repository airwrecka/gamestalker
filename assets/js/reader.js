$(document).ready(function(){
	function post()
    {
    	$.post("<?php echo base_url();?>evok/reader", function(data, status){
        alert("Data: " + data + "\nStatus: " + status);
        });
    }

});