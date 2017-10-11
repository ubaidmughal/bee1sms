<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Bee1SMS</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="/assets/lineicons/style.css">
    <link rel="stylesheet" type="text/css" href="/Validator/bootstrapValidator.min.css">
        <link rel="stylesheet" href="/datatable/buttons.dataTables.min.css" />
        <link rel="stylesheet" href="/datatable/dataTables.bootstrap.min.css" />
        <link rel="stylesheet" href="/datatable/rowReorder.dataTables.min.css" />
<link rel="stylesheet" href="/datatable/responsive.dataTables.min.css" />
<link rel="stylesheet" href="/datatable/colReorder.dataTables.min.css" />
    <!-- Custom styles for this template -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/assets/css/style-responsive.css" rel="stylesheet">

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
            <a href="dashboard.php" class="logo"><b><img src="/assets/img/logo.png" width="100" height="50"/></b></a>
            <!--logo end-->
            
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="/Admin/logout.php"><i class="fa fa-sign-out">Logout</i></a></li>
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

                    <p class="centered"><a href="/dashboard.php"><img src="/assets/img/Orange-bee.png" width="150"></a></p>
                   

                    <li class="mt">
                      <a class="active" href="/dashboard.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                      </li>
                     <li class="mt">
                      <a href="#" id="BM">
                          <i class="fa fa-book"></i>
                          <span>Book Master</span>
                      </a>
                      
                  </li>  
                <li class="mt">
                      <a href="#" id="QM" >
                          <i class="fa fa-question"></i>
                          <span>Question Master</span>
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