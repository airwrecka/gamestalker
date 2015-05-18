<?php include("header.php");?>

<div class="col-md-8 col-md-offset-2">
	
	<div class="well">
		<div class="panel panel-default">
			<div class="panel panel-default">
				
				<div class="panel-heading">	
					<h1>News</h1>
				</div>
				<table id="LIST" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
		
					<thead>
						<tr>
							<td>Article Title</td>
							<td>Posted By:</td>
							<td>Date Posted</td>
							
						</tr>
					</thead>

					<tbody>
						<?php foreach ($info as $info): ?>
							<?php if($info->C_type==1){?>
							<tr>
								<td><a href="<?php echo base_url();?>gamestalker/view_content_data/<?php echo $info->C_id;?>"><?php echo $info->C_title; ?></a></td>
								<td><?php echo $info->U_username; ?></td>
								<td><?php echo $info->C_date; ?></td>
							</tr>	
					    <?php }?>		
						<?php endforeach;?>	
					</tbody>
				</table>
			</div>
		</div>

	</div>
</div>

<script>
	$("#LIST").dataTable({
	"order": [[ 2, "desc" ]]
});
</script>
<?php include("admfooter.php"); ?>