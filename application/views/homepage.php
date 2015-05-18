

<?php include("header.php");?>


<div class="container">
	
  <div class="col-lg-12">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  	<!-- Indicators -->
  	<ol class="carousel-indicators">
    	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    	<li data-target="#carousel-example-generic" data-slide-to="1"></li>
    	<li data-target="#carousel-example-generic" data-slide-to="2"></li>
  	</ol>

  	<!-- Wrapper for slides -->
  	<div class="carousel-inner" role="listbox">
    	<div class="item active">
      		<?php foreach ($newspic as $newspic):?>
            <?php foreach ($news as $news):?>
          <a href="<?php echo base_url()?>gamestalker/view_content_data/<?php echo $news->C_id?>"><img  class="reduc" src="<?php echo base_url().$newspic->CP_dir;?>" alt="Assassin's Creed: Unity"></a>          
      		 

            <div class="carousel-caption">
        			<h1><?php echo $news->C_title?></h1>
      			</div>
          
    	</div>
      
      <div class="item">
          <?php foreach ($revpic as $revpic):?>
            <?php foreach ($review as $review):?>
          <a href="<?php echo base_url()?>gamestalker/view_content_data/<?php echo $review->C_id?>"><img  class="reduc" src="<?php echo base_url().$revpic->CP_dir;?>" alt="Assassin's Creed: Unity"></a>          
           

            <div class="carousel-caption">
            <h1><?php echo $review->C_title?></h1>
            </div>
          
      </div>

      <div class="item">
          <?php foreach ($walkpic as $walkpic):?>
            <?php foreach ($walk as $walk):?>
          <a href="<?php echo base_url()?>gamestalker/view_content_data/<?php echo $walk->C_id?>"><img  class="reduc" src="<?php echo base_url().$walkpic->CP_dir;?>" alt="Assassin's Creed: Unity"></a>          
           

            <div class="carousel-caption">
            <h1>  <?php echo $walk->C_title?> </h1>
            </div>
           
      </div>
  	</div>

  	<!-- Controls -->
  	<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
   	 <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
   	 <span class="sr-only">Previous</span>
  	</a>
  	<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    	<span class="sr-only">Next</span>
  	</a>
  </div>
</div>
  <div class="col-md-12 gap-top">
    <div class="col-md-3 tiles gap-side">
      
      <h3>Latest News:   <?php echo $news->C_title;?></h3>
      <p>Posted By: <?php echo $news->U_username;?></p>
      <p><?php echo $news->C_date?></p>
      <div>
        <a href="<?php echo base_url()?>gamestalker/view_content_data/<?php echo $news->C_id?>"><button class="btn btn-success">Read More</button></a>
      </div>
    </div>

    <div class="col-md-3 tiles gap-side">
      
      <h3>Latest Review:   <?php echo $review->C_title;?></h3>
      <p>Posted By: <?php echo $review->U_username;?></p>
      <p><?php echo $review->C_date?></p>
      <div>
        <a href="<?php echo base_url()?>gamestalker/view_content_data/<?php echo $review->C_id?>"><button class="btn btn-success">Read More</button></a>
      </div>
    </div>

    <div class="col-md-3 tiles end-right">
      
      <h3>Latest Walkthrough: <?php echo $walk->C_title;?></h3>
      <p>Posted By: <?php echo $walk->U_username;?></p>
      <p><?php echo $walk->C_date?></p>
      <div>
        <a href="<?php echo base_url()?>gamestalker/view_content_data/<?php echo $walk->C_id?>"><button class="btn btn-success">Read More</button></a>
      </div>     
    </div>
</div>
</div>


<?php endforeach;?> 
<?php endforeach;?> 
<?php endforeach;?> 
<?php endforeach;?>
<?php endforeach;?> 
<?php endforeach;?> 
<script type="text/javascript">
   function notifyMe()
  {
    var n="<?php echo $this->session->flashdata('msg');?>";

    if(n!="")
    {
      alert(n);
    }
   
  }
  notifyMe();
</script>

