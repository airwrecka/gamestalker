<?php include("header.php");?>
<div class="col-md-8 col-md-offset-2">
	
	<div class="well">
		<div class="panel panel-default">
			<div class="panel panel-default">
				
			<div class="panel-heading">	
				<h1>Content List</h1>
			</div>
		<table id="LIST" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		
		<thead>
			<tr>
				
				<td>Article Title</td>
				<td>Type</td>
				<td>Posted By:</td>
				<td>Date Posted</td>
				<td>Operations</td>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($info as $info): ?>
				<tr>
					<input type="hidden" name="atitle" value="<?php echo $info->C_id; ?>">
				
					<td><a href="<?php echo base_url();?>gamestalker/adm_view_content_data/<?php echo $info->C_id;?>"><?php echo $info->C_title; ?></a></td>
					<td><?php if($info->C_type==1){?><?php echo "News"; ?><?php }?><?php if($info->C_type==2){?><?php echo "Review"; ?><?php }?><?php if($info->C_type==3){?><?php echo "Walkthrough"; ?><?php }?></td>
					<td><?php echo $info->U_username; ?></td>
					<td><?php echo $info->C_date; ?></td>
					<?php if($this->session->userdata('usertype')!=0){?>
						<?php if($this->session->userdata('username')==$info->U_username){?>
							<td><a href="<?php echo base_url();?>gamestalker/edit_content/<?php echo $info->C_id;?>"><img src="<?php echo base_url();?>assets/images/mimiglyphs/39.png">EDIT</a>|
					    		<a onclick="return confirm('Confirm article deletion?');" href="<?php echo base_url();?>gamestalker/delete_content/<?php echo $info->C_id;?>"><img src="<?php echo base_url();?>assets/images/mimiglyphs/51.png">DELETE</a></td>
							<?php }else{?>
							<td> </td>
							<?php }?>	
					<?php }else{?>
						<td><a href="<?php echo base_url();?>gamestalker/edit_content/<?php echo $info->C_id;?>"><img src="<?php echo base_url();?>assets/images/mimiglyphs/39.png">EDIT</a>|
					    		<a onclick="return confirm('Confirm article deletion?');" href="<?php echo base_url();?>gamestalker/delete_content/<?php echo $info->C_id;?>"><img src="<?php echo base_url();?>assets/images/mimiglyphs/51.png">DELETE</a></td>
				    <?php }?>
				</tr>
			<?php endforeach;?>	
		</tbody>
	</table>
<!-- <img src=<?php echo base_url();?>assets/images/mimiglyphs/39.png>EDIT -->	
<!--<a onclick="return confirm("Confirm article deletion?");" href="<?php echo base_url();?>gamestalker/delete_content/<?php echo $info->C_id;?>"><img src="<?php echo base_url();?>assets/images/mimiglyphs/51.png">DELETE</a>-->

		</div>
	</div>

</div>


<script>
	

$("#LIST").dataTable({
	"order": [[ 4, "desc" ]]
});
</script>
<?php include("admfooter.php"); ?>