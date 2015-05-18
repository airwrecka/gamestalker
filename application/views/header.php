<?php

  $this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
  $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');  
  $this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
  $this->output->set_header('Pragma: no-cache');
?>

<head>
	

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet" />
  <!-- FontAwesome Styles-->
  <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/dataTables.bootstrap.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/custom.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/jquery.dataTables.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/alertify.bootstrap.css') ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/thecss.css') ?>" rel="stylesheet" />


 
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/dataTables/jquery.dataTables.js')?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.metisMenu.js') ?>"></script>

  <script type="text/javascript" src="<?php echo base_url('assets/js/wysiwyg.js') ?>"></script>
  <script type="text/html" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/alertify.min.js') ?>"></script>
<!-- 
 <style>
 body {
    background-color: black;
    color: white;
}
div{

   background-color: black;
   font-family: "Times New Roman";
   color:white;
}
 </style>

 

  -->


</head>
<body>
  <nav class="navbar navbar-default" 
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url('gamestalker/index');?>">Gamestalker</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!-- <li class="dropdown"><a href="<?php echo base_url();?>gamestalker/view_news">News<span class="sr-only">(current)</span></a></li> -->
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">News<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url();?>gamestalker/view_news">View All News</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Reviews<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url('gamestalker/view_reviews')?>">View All Reviews</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Walkthrough<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url('gamestalker/view_walkthroughs')?>">View All Walkthroughs</a></li>
            
          </ul>
        </li>
        <?php  if($this->session->userdata("usertype")==1 || $this->session->userdata("usertype")==0  && $this->session->userdata("email")!='') { ?>
        <li id="ARTICLEMGMT" class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Article<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li id="VU"><a href="<?php echo base_url()?>gamestalker/create_article_page">Add Article</a></li>
            <li><a href="<?php echo base_url();?>gamestalker/adm_view_content">View All Articles</a></li>
          </ul>
        </li>
        <?php } ?>

        <?php  if($this->session->userdata("usertype")==0 && $this->session->userdata("email")!='') { ?>
        <li id="USERMGMT" class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Management<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li id="AU"><a href="<?php echo base_url('gamestalker/adm_user_registration')?>">Add a User</a></li>
            <li id="VU"><a href="<?php echo base_url()?>gamestalker/view_users">View All Users</a></li>
          </ul>
        </li>
        <?php } ?>
        <!-- <li><a href="<?php echo base_url('gamestalker/view_reviews')?>">Reviews</a></li> -->
        <!-- <li><a href="<?php echo base_url('gamestalker/view_walkthroughs')?>">Walkthroughs</a></li> -->
      </ul>
      <?php if(!empty($this->session->userdata) && $this->session->userdata("email")==''){ ?>
      <div id="login-group">
      
        <form class="navbar-form navbar-right" method="post" action="<?php echo base_url('gamestalker/login');?>" >
        <div class="form-group">
          <input id="EMAIL" name="email" type="text" class="form-control" placeholder="E-mail Address" required>
        </div>
        <div class="form-group">
          <input id="PASS" name="pass" type="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-success">Log In</button>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Register</button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#forgetMe">Forgot password?</button>
        </form>  

      </div>
      <?php }?>

      <div id="DROPDIV">
        
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" id="DROPDOWN" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Guest<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo base_url()?>gamestalker/edit_user_dash/<?php echo $this->session->userdata('username');?>">Edit Account Info</a></li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url('gamestalker/logout')?>">Logout</a></li>
          </ul>
        </li>
      </ul>

      </div>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Register</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url();?>gamestalker/register_user" role="form" onsubmit="return showVal()">
          <div class="page-inner">
            <div class="form-group">
              <p>Desired Username     <input class="form-control-reg" type="text"  name="uname" id="USERNAME" placeholder="Username" required pattern="[a-zA-Z0-9]+"  required pattern=".{8,}" maxlength="24" title="Input should be 8 characters at minimum and should not contain white spaces."></p>
              <p>E-mail Address       <input class="form-control-reg" type="email" name="email" id="EMAIL" placeholder="E-mail" required></p>
              <p>Desired Password     <input class="form-control-reg" pattern=".{8,}" maxlength="24" required title="Input should be 8 characters at minimum." type="password" name="password" id="PASSWORDH" placeholder="Password" ></p>
              <p>Confirm Password     <input class="form-control-reg" pattern=".{8,}" maxlength="24" required title="Input should be 8 characters at minimum." type="password" name="cpassword" id="CPASSWORDH" placeholder="Password" required></p>

              <p hidden>Status<input type="text" value="1" name="userstatus" id="USERSTATUS" placeholder="Userstatus" hidden></p>
              <p hidden>Type<input type="text" value="2" name="usertype" id="USERTYPE" placeholder="Usertype" hidden></p>
              <div>
                <p>Apply as Contributor? <input id="CHKBOX" name="chkbox" type="checkbox" onclick="return changeVal()"></p> 
              </div>
            </div>
          <div>
        <button class="btn btn-success" onclick="return showVal()"type="submit">Register!</button>
      </div>
      
      
    </div>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="forgetMe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Forgot password?</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url('gamestalker/send_mail/');?>" role="form" >
          <div class="page-inner">
            <div class="form-group">
              <p>E-mail Address       <input class="form-control-reg" type="email" name="email" id="EMAIL" placeholder="E-mail" required ></p>
            </div>
          <div>
        <button class="btn btn-success" type="submit">Submit Email</button>
      </div>
      
      
    </div>
  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



</body>

<script type="text/javascript">
  
  function showVal()
{

  var a,b,mess,submess;
     a=$("#PASSWORDH").val();
     b=$("#CPASSWORDH").val();
  if(a!=b){
    
   
    mess="Passwords do not match! Please Try Again.";
    submess="Yeah";
    alert(mess);
    return false;

  }else{
    return true;
  }

}


 function hideDiv()
 {
    a="<?php echo $this->session->userdata("email");?>";
    usertype="<?php echo $this->session->userdata("usertype");?>";
    userstatus="<?php echo $this->session->userdata("userstatus");?>";
    if(a!="")
    {
      $("#login-group").hide();
      $("#DROPDOWN").text("<?php print_r($this->session->userdata("email"));?>");
    }else{
      $("#login-group").show();
      $("#DROPDIV").hide();
    
    }
   
}

  

    

 hideDiv();

 function changeVal()
    {
      var a,b,chkbox;
      a=document.getElementById("USERSTATUS").value;
      chkbox=document.getElementById("CHKBOX").value;
      if(chkbox=="on"){
        document.getElementById("USERSTATUS").value=2;
        document.getElementById("USERTYPE").value=2;
    }

    return true;
    }

</script>


