<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>G Share</title>
    <meta name="description" content="SPA Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
    <link rel="apple-touch-icon" href="<?php echo base_url();?>public/img/logo.png">
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>public/img/logo.png">
    <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/vendors/jqvmap/dist/jqvmap.min.css">
<link href="<?php echo base_url();?>public/js/sweetalert/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection">
<script src="<?php echo base_url();?>public/vendors/jquery/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>public/assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="<?php echo base_url();?>public/img/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="<?php echo base_url();?>public/img/logo.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?php echo base_url();?>Admin/index"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                      <li>  <a href="<?php echo base_url();?>Admin/changePassword"> <i class="menu-icon fa fa-laptop"></i>Change Password </a></li>
                      <li> <a href="<?php echo base_url();?>Management/category"> <i class="menu-icon fa fa-glass"></i>Add Category </a></li>
                      <!--  -->
                      <li> <a href="<?php echo base_url();?>Management/product"> <i class="menu-icon fa ti-video-clapper"></i>Add Product </a></li>
                      <li> <a href="<?php echo base_url();?>Order"> <i class="menu-icon fa ti-comment"></i>View Orders </a></li>
                      <!-- <li> <a href="<?php //echo base_url();?>Order1"> <i class="menu-icon fa ti-comment"></i>Add Memes </a></li> -->
                      <!-- <li> <a href="<?php //echo base_url();?>Share/file"> <i class="menu-icon fa ti-pencil"></i>Update </a></li> -->
                      <li> <a href="<?php echo base_url();?>Management/feedback"> <i class="menu-icon fa ti-comments"></i>Feedback </a></li>
                      
                    <!--   <li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Create</a>-->
                    <!--    <ul class="sub-menu children dropdown-menu">-->
                    <!--        <li><i class="fa fa-id-badge"></i><a href="Generate/gen">Entry Code</a></li>-->
                    <!--        <li><i class="fa fa-puzzle-piece"></i><a href="Report/lot">Lot Name</a></li>-->
                    <!--        <li><i class="fa fa-bars"></i><a href="Certificate/Create">Certificate</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <!-- <li class="menu-item-has-children dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-email"></i>Post</a>-->
                    <!--    <ul class="sub-menu children dropdown-menu">-->
                    <!--        <li><i class="ti-comments" ></i><a href="Share/msg">Message</a></li>-->
                    <!--        <li><i class="ti-comment"></i><a href="Order">Image</a></li>-->
                    <!--        <li><i class="ti-comment"></i><a href="are/file">File</a></li>-->
                    <!--        <li><i class="ti-video-clapper"></i><a href="are/vdo">Video</a></li>-->
                    <!--    </ul>-->
                    <!--</li>-->
                    <!--<li class="menu-item-has-children dropdown">-->
                    <!--    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Reports</a>-->
                    <!--    <ul class="sub-menu children dropdown-menu">-->
                    <!--        <li><i class="menu-icon fa fa-street-view"></i><a href="Report/enlist">Registeration</a></li>-->
                    <!--        <li><i class="menu-icon fa fa-map-o" ></i><a href="Report/techlist">Participants(Technical)</a></li>-->
                    <!--        <li><i class="menu-icon fa fa-map-o" ></i><a href="Report/ntechlist">Participants(Non Technical)</a></li>-->
                    <!--           <li><i class="menu-icon fa ti-star" ></i><a href="Report/finallist">Final Particiants</a></li>-->
                    <!--           <li><i class="menu-icon fa ti-bookmark" ></i><a href="Report/confirmlist">Confirmed Particiants</a></li>-->
                    <!--           <li><i class="menu-icon fa ti-bookmark-alt" ></i><a href="Report/expectlist">Expected Particiants</a></li>-->

                    <!--    </ul>-->
                    <!--</li>-->
                      <li>  <a href="<?php echo base_url();?>/Admin/logout"> <i class="menu-icon fa fa-sign-in"></i>Logout </a></li>
                       
                   
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        

                        
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo base_url();?>public/img/logo.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="<?php echo base_url();?>/Admin/logout"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>


                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
