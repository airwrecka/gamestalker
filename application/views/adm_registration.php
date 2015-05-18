<?php include("header.php"); ?>	
<div class="container">
	
	<div class="well">
	<h1>Register User</h1>
	
		
		<div class="form-group">
			<form method="post" action="<?php echo base_url();?>gamestalker/adm_register_user" role="form" onsubmit="return showVal()">
				<div class="page-inner">
			
					<p>Desired Username     <input class="form-control-reg" type="text"  name="uname" id="USERNAME" placeholder="Username" required pattern="[a-zA-Z0-9]+"  required pattern=".{8,}" maxlength="24" title="Input should be 8 characters at minimum and should not contain white spaces."></p>
					<p>E-mail Address       <input class="form-control-reg" type="email" name="email" id="EMAIL" placeholder="E-mail" required   title="Input should be 8 characters at minimum."></p>
					<p>Desired Password     <input class="form-control-reg" type="password" name="password" id="PASSWORD1" placeholder="Password"  required pattern=".{8,}" maxlength="24" title="Input should be 8 characters at minimum."></p>
					<p>Confirm Password     <input class="form-control-reg" type="password" name="cpassword" id="CPASSWORD1" placeholder="Password" required pattern=".{8,}" maxlength="24" title="Input should be 8 characters at minimum."></p>
					<p>User Type</p>
					<select class="form-control-reg" id="UTYPE" name="utype" class="selectpicker" required>
           				
            			<option value="0">Administrator</option>
            			<option value="1">Contributor</option>
            			<option value="2">Normal User</option>
         			</select>

         			<input name="ustatus" type="text" value="1" hidden>
					
				</div>
				<div>
					<button class="btn btn-success" type="submit" onclick ="return showVal()">Submit</button>
				</div>

		</div>

	</form>
</div>	

</div>
<?php include("admfooter.php"); ?>

<script type="text/javascript">
function hasWhiteSpace(s) {
  return s.indexOf(' ') >= 0;
}

	function showVal()
    {

  		var a,b,ret,type,status;
     	a=$("#PASSWORD1").val();
     	b=$("#CPASSWORD1").val();
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
  		a=document.getElementById("USERSTATUS").value;
  		chkbox=document.getElementById("CHKBOX").value;
  		if(chkbox=="on"){
  			document.getElementById("USERSTATUS").value=2;
  			document.getElementById("USERTYPE").value=1;
 		}

 		return true;
  	}
  	 function notifyMe()
  {
    var n="<?php echo $message;?>";

    if(n!="")
    {
      alert(n);
    }
  }
  notifyMe();


</script>