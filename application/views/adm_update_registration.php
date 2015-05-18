<?php include("header.php"); ?>	
<div class="container">
	<?php echo $message?>
	<div class="well">
	<h1>Edit User Info</h1>
	
		<?php foreach ($info as $info):?>
		<div class="form-group">
			<form class ="form-horizontal"method="post" action="<?php echo base_url();?>gamestalker/update_user/<?php echo $info->U_username;?>" role="form" onsubmit="return showVal()">
				<div class="page-inner">
				
					<p>Desired Username     <input class="form-control-reg" type="text" name="uname" id="USERNAME" required pattern="[a-zA-Z0-9]+"  required pattern=".{8,}" maxlength="24" title="Input should be 8 characters at minimum and should not contain white spaces." placeholder="Username" value="<?php echo $info->U_username;?>" required ></p>
					<p>E-mail Address       <input class="form-control-reg" type="email" name="email" id="EMAIL" placeholder="E-mail" value="<?php echo $info->U_email;?>"  title="Input should be 8 characters at minimum." required></input></p>
					
         
            <p>User Type</p>
              <select class="form-control-reg" id="USERTYPE" name="utype" class="selectpicker" required>
                  <option value="0">Administrator</option>
                  <option value="1">Contributor</option>
                  <option value="2">Normal User</option>

              </select>
              <input name="ustatus" id="USERSTATUS" type="text" value="1" hidden>
         			
				
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
	
	
  	function changeVal()
  	{
  		var a,b,chkbox;
  		a=document.getElementById("USERSTATUS").value;
  		chkbox=document.getElementById("CHKBOX").value;
  		if(chkbox=="on"){
  			document.getElementById("USERSTATUS").value=2;
  			document.getElementById("USERTYPE").value=1;
 		}

 		return true;
  	}
  	
    var atype="<?php echo $info->U_type;?>";
    if(atype==1){
        $("select option[value=1]").attr("selected","selected");
    }else if(atype==2){
        $("select option[value='2']").attr("selected","selected");
    }else{
        $("select option[value='3']").attr("selected","selected");
    }

</script>