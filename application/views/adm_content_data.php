<?php include("header.php");?>

<?php
  
  $slides='';
  $Indicators='';
  $counter=0;
  
  foreach ($picture as $picture) {
   
    $title=$picture->CP_filename;
    $desc=$picture->C_id;
    $base=base_url();
    if($counter == 0){
      $Indicators .='<li data-target="#carousel-example-generic" data-slide-to="'.$counter.'" class="active"></li>';
      $slides .= '<div class="item active">
      <img src="'.$base.$picture->CP_dir.'" alt="'.$title.'" />
      <div class="carousel-caption">
      <h3>'.$title.'</h3>
      <p>'.$desc.'.</p>         
      </div>
      </div>';
    }else{
      $Indicators .='<li data-target="#carousel-example-generic" data-slide-to="'.$counter.'"></li>';
      $slides .= '<div class="item">
      <img src="'.$base.$picture->CP_dir.'" alt="'.$title.'" />
      <div class="carousel-caption">
      <p>'.$desc.'.</p>         
      </div>
      </div>';
    }
    $counter++;
  }



?>
 <style>
 textarea {
    resize: none;
}
 </style>


<div class="col-md-10 col-md-offset-1">
	
	<div align="center" style="word-wrap:break-word;" >
	 
	<?php foreach ($info as $info): ?>

		<h1 style="color:white;"><?php echo $info->C_title?></h1>
		<h3 style="color:white;">A <?php if($info->C_type==1){?><?php echo "News"; ?><?php }?><?php if($info->C_type==2){?><?php echo "Review"; ?><?php }?><?php if($info->C_type==3){?><?php echo "Walkthrough"; ?><?php }?> article by <?php echo $info->U_username;?></h3>
		<h6 style="color:white;">Posted:<?php echo $info->C_date;?></h6>
		

  		<?php #foreach($picture as $picture):?>
  		<?php #endforeach;?>	
  				

  </div>

</div>

<!--  <div class="container" style="width: 730px;">
      
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        
        <ol class="carousel-indicators">
         <?php echo $Indicators; ?>
        </ol>
 
        
        <div class="carousel-inner">
        <?php echo $slides; ?>  
        </div>
 
        
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>
    </div> -->

<div class="col-md-10 col-md-offset-1">
	<div class="well" align="center" style="background:grey;">
		<?php echo $info->C_description;?>
	</div>

 <?php $id=$this->uri->segment(3); 
$comments=$this->gs_model->getComments($id);
 ?>

 <br>

<!-- ANHI ANG COMMENTS NGA PART-->
<div  class="container" align="left" style="word-wrap:break-word;">


 <div id="comment"  class="container" style="width: 730px;">
 <form id="addComment" method="post" action="<?php echo base_url();?>gamestalker/storeComment/<?=$id ?>">
    <div>
          <?php echo "Post Comment as ".$this->session->userdata('username');?>
            <textarea class="form-control " name="body" placeholder="Insert Comment" id="commenter" cols="20" rows="5"></textarea>
            
            <input type="submit" class="btn btn-primary" id="submit" value="Post Comment" />
    </div>


 </form>

 </div>

<p>ALL COMMENTS</p>
<?php 
foreach ($comments as $c) { ?>
<div class="well" style="border-radius: 89px 98px 140px 0px;
-moz-border-radius: 89px 98px 140px 0px;
-webkit-border-radius: 89px 98px 140px 0px;
border: 0px solid #612c61;">

<div>
 <p><?=$c->Co_content; ?></p>  

 <i><?=$c->U_username?> - Posted at <?=$c->Co_date?> :  </i>  <?php
 if(0==$this->session->userdata("usertype") && $this->session->userdata("usertype")!=''){
 ?><button class="btn btn-danger"> <a id="deleteComment" href="<?php echo base_url();?>gamestalker/deleteComment/<?php echo $c->Co_id; ?>">Delete</a></button> <button id="editComment" class="btn btn-primary" value="<?php echo $c->Co_id; ?>">Edit</button> 
<?php } 
else if($c->U_username===$this->session->userdata("username")){
?> 
<button class="btn btn-danger"><a id="deleteComment" href="<?php echo base_url();?>gamestalker/deleteComment/<?php echo $c->Co_id; ?>">Delete</a></button> <button id="editComment" class="btn btn-primary" value="<?php echo $c->Co_id; ?>">Edit</button>  

<?php }?>
 </div>   
 </div>



       <?php
     
        }
?>

</div>
<?php
$this->session->set_userdata('referred_from', current_url());
?>

<script type="text/javascript">
 hideMe(); 
function hideMe(){

  var cbox="<?php echo $this->session->userdata('usertype')?>";
  if(cbox==''){
    $("#comment").hide();
  }
}

</script>

 
   <script>
  $(document).on("click","#editComment", function(){ 
                                        id = this.value;
                                        
                                         
                          
                             $.ajax({
                                            type: "POST",
                                            url: "<?php echo base_url();?>gamestalker/editComment/"+id,

                                    }).done(function(data){
                                              document.getElementById("commenter").value =data;
                                              

                                });
                                
                                
                                               $(this).parent().parent().fadeOut("fast", function() {
                                                $(this).remove();


                  });
                  

                });
</script>

  <?php endforeach; ?>  
<?php include("admfooter.php"); ?>

