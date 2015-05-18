<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css') ?>" />
<script type="text/javascript" src="<?php echo base_url('assets/js/vendor/jquery.js') ?>"></script>


<div class="container-fluid">
	<form method="post" action="<?php echo base_url();?>gamestalker/login" >
		<div class="col-md-6 col-md-offset-1">
			
			<h1>Administrative Page</h1>
			<p>Username <input type="text" class="form-control" name="user" id="USER" placeholder="Username" required></p>
			<p>Password <input type="password" class="form-control" name="pass" id="PASS" placeholder="Password" required></p>
			<p><button id="logbut" class="btn btn-primary" type="submit" >Login!</button></p>
			<script>
			alert("<?php echo $message; ?>");
			</script>
		</div>



	</form>

</div>



