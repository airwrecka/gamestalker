<?php include("header.php"); ?>	
	<form method="post" action="<?php echo base_url();?>gamestalker/register_user" role="form" >
		<div>
			<p>Registration Page</p>
			<p>Desired Username <input type="text" name="uname" id="USERNAME" placeholder="Username"></p>
			<p>E-mail Address <input type="text" name="email" id="EMAIL" placeholder="E-mail"></p>
			<p>Desired Password <input type="password" name="password" id="PASSWORD" placeholder="Password"></p>
			<p>Confirm Password <input type="password" name="cpassword" id="CPASSWORD" placeholder="Password"></p>

			<p hidden>Status<input type="text" name="userstatus" id="USERTYPE" placeholder="Usertype" hidden></p>
			<div>
				<label>Applying as :            
					<select name="usertype" required>
						<option value="" disabled default selected class="display-none"></option>
						<option value="1">Contributor</option>
						<option value="2">Normal User</option>			
					</select>
				</label>
			</div>
			<div>
				<button type="submit">Submit</button>
			</div>
			
			
		</div>
	</form>
