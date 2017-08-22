
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">


    <title>Bee1SMS</title>

    <!-- Bootstrap core CSS -->
    
    <link href="/img/baricon.png" rel="shortcut icon">
    <link href="/Css/bootstrap.css" rel="stylesheet">
    <!--external css-->
      <link href="/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
      <link href="/Css/bootstrap.css" rel="stylesheet">
	<!-- Custom styles for this template -->
      <link href="/Css/style.css" rel="stylesheet" type="text/css" />
      <link href="/Css/table-responsive.css" rel="stylesheet" type="text/css" />
     <link href="/Css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
     <link href="/Css/buttons.dataTables.min.css" rel="stylesheet"/>
     <link href="/Css/datatable/jquery.dataTables.min.css" rel="stylesheet"/>
          <link href="/Css/bootstrap.min.css" rel="stylesheet"/>
<link href="/Css/datatable/buttons.dataTables.min.css" rel="stylesheet"/>

 
  </head>

  <body>

  <section id="container" >
     
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="../dashboard.php" class="logo"><b><img src="/img/logo.png" class="img-responsive" width="100" height="50"/></b></a>
            <!--logo end-->       
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="/Admin/logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
	
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">             
              	  <p class="centered"><a href="/OrgSetup/ShellPage.php"><img src="/img/Orange-bee.png" class="img-responsive" width="150"></a></p>
				<li class="mt">
                      <a class="active" href="/OrgSetup/ShellPage.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Organization</span>
                      </a>
                     </li> 
                     
                     <li><a href="Menu.php">Menu</a></li>
                        <li><a href="Group.php">Menu Group</a></li>
                        <li><a href="Organization.php">Organization Setup</a></li>
                      
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