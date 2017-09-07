<?php 

include ($_SERVER['DOCUMENT_ROOT'].'../appconfig.php');
if(!isset($_SESSION['UName']))
{
    header('location: /Admin/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Bee1SMS</title>

    <link href="../img/baricon.png" rel="shortcut icon">
    <link href="../Css/bootstrap.css" rel="stylesheet">
    <link href="../Css/group.css" rel="stylesheet"/>
    <!--external css-->
      <link href="../font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<!-- Custom styles for this template -->
      <link href="../Css/style.css" rel="stylesheet" type="text/css" />
      <link href="../Css/table-responsive.css" rel="stylesheet" type="text/css" />
     <link href="../Css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
     <link href="../Css/buttons.dataTables.min.css" rel="stylesheet"/>
     <link href="../Css/datatable/jquery.dataTables.min.css" rel="stylesheet"/>
      <link href="responsive.bootstrap.min.css" rel="stylesheet"/>
<link href="../Css/datatable/buttons.dataTables.min.css" rel="stylesheet"/>
      <link rel="stylesheet" href="portlet.css" type="text/css" />
<link href="https://cdn.datatables.net/responsive/2.1.1/css/dataTables.responsive.css" rel="stylesheet"/>
        
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../Css/css/datatable/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="../Css/group.css" />  
  </head>

  <body>

  <section id="container" >
     
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="/dashboard.php" class="logo"><b><img src="/img/logo.png" class="img-responsive" width="100" height="50"/></b></a>
            <!--logo end-->       
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../Admin/login.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
	
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">             
              	  <p class="centered"><a href="#"><img src="../img/Orange-bee.png" class="img-responsive" width="150"></a></p>
				<li class="mt">
                      <a class="active" href="../dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                      
                      
                 <li class="sub-menu">
                      <a href="studentinfo.php" >
                          <i class="fa fa-desktop"></i>
                          <span>Student Info</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="classinfo.php" >
                          <i class="fa fa-cogs"></i>
                          <span>Class</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="sectionsinfo.php" >
                          <i class="fa fa-cogs"></i>
                          <span>Section</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="Subjectinfo.php" >
                          <i class="fa fa-cogs"></i>
                          <span>Subject</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="activityinfo.php" >
                          <i class="fa fa-cogs"></i>
                          <span>Activity</span>
                      </a>
                  </li>
                  <li class="mt">
                      <a class="active" href="/Admin/logout.php">
                          <i class="fa fa-lock"></i>
                          <span>Logout</span>
                      </a>
                     </li>
				  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->