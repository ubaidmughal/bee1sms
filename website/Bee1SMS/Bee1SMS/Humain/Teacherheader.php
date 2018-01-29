<?php
include($_SERVER['DOCUMENT_ROOT'].'/db.php');
session_start();

if(!isset($_SESSION['UName']))
{
	header("Location:/Admin/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="">

    <title>Bee1SMS</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="/assets/lineicons/style.css">

    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="/datatable/buttons.dataTables.min.css" />
        <link rel="stylesheet" href="/datatable/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="/datatable/rowReorder.dataTables.min.css" />
<link rel="stylesheet" href="/datatable/responsive.dataTables.min.css" />
<link rel="stylesheet" href="/datatable/colReorder.dataTables.min.css" />
    <script src="/assets/js/chart-master/Chart.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script> 
</head>

<body>

    <section id="container">
        <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
        <!--header start-->
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b><img src="/assets/img/logo.png" width="100" height="50"/></b></a>
            <!--logo end-->
            
            <div class="top-menu">
              
                         <ul style="margin-top:2%; float:right; padding:0 2%;">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			  <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $_SESSION['UName']; ?>&nbsp;<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;View Profile</a></li>
                <li><a href="/Admin/logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
               
            </div>
        </header>
        <!--header end-->
        <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">

                    <p class="centered"><a href="/index.php"><img src="/assets/img/Orange-bee.png" width="150"></a></p>
                   

                    <li class="mt">
                      <a class="active" href="/index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                      </li>
                     <li class="mt">
                      <a href="#" id="HR">
                          <i class="fa fa-user"></i>
                          <span>Humain Resources</span>
                      </a>
                      
                  </li>  
                
				   <li class="mt">
                      <a class="active" href="/Admin/logout.php">
                          <i class="fa fa-sign-out"></i>
                          <span>Logout</span>
                      </a>
                     </li> 
                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->