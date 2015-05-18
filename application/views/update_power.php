<?php include("header.php"); ?>	
<div class="container">
	<?php echo $message?>
	<div class="well">
	<h1>Edit User Information</h1>
	
		<?php foreach ($info as $info):?>
		<div class="form-group">
			<form class ="form-horizontal"method="post" action="<?php echo base_url();?>gamestalker/update_user/<?php echo $info->U_username;?>" role="form" onsubmit="return showVal()">
				<div class="page-inner">
				
          <p>Desired Username     <input class="form-control-reg" pattern=".{8,}" maxlength="24" required title="Input should be 8 characters at minimum." type="text" name="uname" id="USERNAME" placeholder="Username" value="<?php echo $info->U_username;?>"></p>
              <p>E-mail Address       <input class="form-control-reg" type="email" name="email" id="EMAIL" placeholder="E-mail" value="<?php echo $info->U_email;?>" required></p>
              <p>Desired Password     <input class="form-control-reg" pattern=".{8,}" maxlength="24" required title="Input should be 8 characters at minimum." type="password" name="password" id="PASSWORD" placeholder="Password"></p>
              <p>Confirm Password     <input class="form-control-reg" pattern=".{8,}" maxlength="24" required title="Input should be 8 characters at minimum." type="password" name="cpassword" id="CPASSWORD" placeholder="Password" required></p>

              <p hidden>Status<input type="text" value="<?php echo $info->U_status;?>" name="ustatus" id="USERSTATUS2" placeholder="Userstatus" hidden></p>
              <p hidden>Type<input type="text" value="<?php echo $info->U_type;?>" name="utype" id="USERTYPE2" placeholder="Usertype" hidden></p>
              
            </div>
        <?php endforeach;?>	
				
          <div>
						<button class="btn btn-success" type="submit">Submit</button>
					</div>
					
				</div>

		</div>

	</form>
</div>	

</div>
<?php include("admfooter.php"); ?>
<script type="text/javascript">
	
	function showVal()
    {

  		var a,b,ret,type,status;
     	a=$("#PASSWORD").val();
     	b=$("#CPASSWORD").val();
  		if(a!=b){
    		alert("Passwords do not match! Please Try Again");
    		ret=false;

  		}else{

  			ret=true;

  		}
    	return ret;
  	}

  	function changeVal()
  	{
  		var a,b,chkbox;
  		a=document.getElementById("USERSTATUS2").value;
  		chkbox=document.getElementById("CHKBOX2").value;
  		if(chkbox=="on"){
  			document.getElementById("USERSTATUS2").value=2;
  			document.getElementById("USERTYPE2").value=2;
 		}

 		return true;
  	}
  	


</script>