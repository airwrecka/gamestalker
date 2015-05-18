<?php include("header.php"); ?>  
<!--
<style>
  div{

    background-color: black;
    color: white;
     font-family: "Times New Roman";
  }

  table{

     background-color: black;
    color: white;
     font-family: "Times New Roman";
  }

</style>-->
<div class="col-md-8 col-md-offset-2">
  
<div class="well">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1>User List</h1>  
    </div>  
    <div class="panel-body">
      <div class="panel">
        <table id="LIST" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Username</th>
              <th>Email</th>
              <th>User Type</th>  
              <th>Status</th>   
              <th>Date Joined</th>
              <th>Operations</th>
            </tr>
          </thead>
        <tbody>
          <?php foreach ($info as $info): ?>
            <tr>
              <td><?php echo $info->U_username;?></td>
              <td><?php echo $info->U_email;?></td>
              <td><?php if($info->U_type == 1){?> <?php echo "Contributor";?> <?php }?> <?php if($info->U_type == 2){?> <?php echo "Normal User";?> <?php }?> <?php if($info->U_type == 0){?> <?php echo "Administrator";?> <?php }?> </td>
              <td><?php if($info->U_status == 1){?> <?php echo "Active";?> <?php }?> <?php if($info->U_status == 0){?> <?php echo "Blocked";?> <?php }?> <?php if($info->U_status == 2){?> <?php echo "Pending Contributor";?> <?php }?> </td>
              <td><?php echo $info->U_dateRegistered; ?></td>
              <td><a href="<?php echo base_url();?>gamestalker/edit_user/<?php echo $info->U_username;?>"><img src="<?php echo base_url();?>assets/images/mimiglyphs/39.png">EDIT</a><a href="<?php echo base_url();?>gamestalker/edit_user_status/<?php echo $info->U_username;?>/<?php echo $info->U_status;?>"><img src="<?php echo base_url();?>assets/images/mimiglyphs/66.png"><?php if($info->U_status==0){echo 'UNBLOCK';}else{ echo 'BLOCK';}?></a><?php if($info->U_status==2){?><a href="<?php echo base_url();?>gamestalker/edit_user_conreq/<?php echo $info->U_username;?>/<?php echo 'approve';?>"><img src="<?php echo base_url();?>assets/images/mimiglyphs/54.png">APPROVE <?php }?></a></td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>

      </div>
    </div>
  </div>
</div>
<!--<a onclick="return confirm('Are sure to delete student?');" href="<?php echo base_url();?>gamestalker/delete_user/<?php echo $info->U_username;?>"><img src="<?php echo base_url();?>assets/images/mimiglyphs/51.png">DELETE</a>-->
</div>
</div>

</div>
<script>
function notifyMe()
  {
    a="<?php echo $this->session->flashdata('msg');?>";
    if(a!=''){
      alert(a);
    }
  }
  notifyMe();
  $("#LIST").dataTable({
  "order": [[ 3, "desc" ]]
});
</script>
<?php include("admfooter.php"); ?>