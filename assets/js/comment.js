$(document).ready(function(){
console.log('went in dpcument ready');
var baseurl= $('#baseurl').val();

$('myForm').submit({
console.log('went in submit action');
return false;
	$.ajax({

		url: baseurl + 'index.php/gamestalker/storeComment',
		data: $('form').serialize(),
		type:"post",
		success: function(){


		}
	
	})

});
});