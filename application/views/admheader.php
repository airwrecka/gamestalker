<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css"href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="<?php echo base_url('assets/js/morris/morris-0.4.3.min.css')?>" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="<?php echo base_url('assets/css/custom-styles.css')?>" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- <link href="<?php echo base_url('assets/js/dataTables/dataTables.bootstrap.css')?>" rel="stylesheet" />-->
    <link href="<?php echo base_url('assets/css/dropzone.min.css')?>" rel="stylesheet" />
    
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js') ?>"></script>
    <!--<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-1.10.2.js') ?>"></script>-->
    <script src="<?php echo base_url('assets/js/dataTables.min.js')?>"></script>
    <!--<script src="<?php echo base_url('assets/js/dataTables.min.js')?>"></script>-->
    <!--<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>-->
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.metisMenu.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/morris/raphael-2.1.0.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/morris/morris.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/easypiechart.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/easypiechart-data.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/custom-scripts.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/wysiwyg.js') ?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/wysiwyg-editor.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/dataTables.bootstrap.css')?>" />
</head>
<body>

    <body>
    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('gamestalker/index')?>"><b>Osu! </b><?php echo $this->session->userdata("username");?></a>
            </div>

            <ul class="nav navbar-top-links navbar-right">  
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">

                        <img src="<?php echo base_url('assets/images/mimiglyphs/19.png')?>">
                        <!-- <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i> -->
                        <!-- <i class="fa"><strong>Account Settings</strong></i> -->
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li><a href="<?php echo base_url()?>gamestalker/logout"><i class="fa"></i> Logout</a>
                        
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class="" href="<?php echo base_url('gamestalker/adm_home')?>"><i class="fa"><img src="<?php echo base_url('assets/images/mimiglyphs/6.png')?>"><!-- fa-dashboard --></i>Home</a>
                    </li>
                    
                    <li>
                        <a class="" href="<?php echo base_url('gamestalker/create_article_page');?>"><i class="fa"><img src="<?php echo base_url('assets/images/mimiglyphs/36.png')?>"><!-- fa-dashboard --></i>Add Article</a>
                    </li>

                    <li>
                        <a class="" href="<?php echo base_url('gamestalker/adm_view_content');?>"><i class="fa"><img src="<?php echo base_url('assets/images/mimiglyphs/4.png')?>"><!-- fa-dashboard --></i>View Articles</a>
                    </li>

                    
                    <li>
                        <a id="USERMGMT" href="ui-elements.html"><i class="fa"><img src="<?php echo base_url('assets/images/mimiglyphs/13.png')?>"></i>User Management</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url('gamestalker/adm_user_registration')?>">Add User</a>
                                    <a href="<?php echo base_url()?>gamestalker/view_users">View Users</a>
                                </li>
                            </ul>
                    </li>
            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">



<script>
    
    function hideMenu()
    {

        var a="<?php print_r($this->session->userdata("usertype"));?>";
        if(a!=0)
        {
            $("#USERMGMT").hide();
        }else{
            $("#USERMGMT").show();
        }

    }

    hideMenu();
</script>
