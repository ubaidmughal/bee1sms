<!doctype html>
<style>
	body{
		margin:40px;
		font-size:0.8em;
	}
	a{
		color:#F00;
	}
	img, iframe, embed, video{
		max-width:100% !important;
		}
	#dhtmlgoodies_tabView1 span{
		margin:0 !important;
		padding:0 !important;
		position: none !important;
		}
	</style>
	<link rel="stylesheet" href="../Css/tab-view.css">
    <link rel="stylesheet" href="../Css/bootstrap.css" />
    <link rel="stylesheet" href="../Css/bootstrap.min.css"/>
	

 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/OrgSetup/Orgheader.php' );

include( $_SERVER['DOCUMENT_ROOT'] . '/appconfig.php' );

if(!isset($_SESSION['SupUser']))
{
	header('location:/Admin/login.php');
}


  ?>
 
 
 
 
 <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper site-min-height">
            <h3> Organization Setup Page.</h3>
            
<div class="col-xs-12" style="width:100% !important;" id="dhtmlgoodies_tabView1">
	<div class="dhtmlgoodies_aTab">
		 This is the content of the first tab. This is just a plain &lt;DIV>. The tabs
		are created by a javascript function.  This is the content of the first tab. This is just a plain &lt;DIV>. The tabs
		are created by a javascript function.  This is the content of the first tab. This is just a plain &lt;DIV>. The tabs
		are created by a javascript function. 	<br><br>
		<a href="#" onclick="createNewTab('dhtmlgoodies_tabView1','new Tab','','http://bee1sms.com/Admin/login.php',true);return false">Create new tab dynamically</a><br>
		<a href="#" onclick="deleteTab('Menu scripts')">Remove this tab</a><br>	
	</div>
	<div class="dhtmlgoodies_aTab">
		This is the content of the second tab.	<br>
		<a href="#" onclick="deleteTab('Calendar')">Remove this tab</a><br>

	</div>
	<div class="dhtmlgoodies_aTab">
		This script is tested in 
		<a href="#" onclick="deleteTab('Menus')">Remove this tab</a><br>
		<ul>
			<li>IE 5.5</li>
			<li>IE 6</li>
			<li>Opera 8.5</li>
			<li>Firefox</li>
		</ul>	
	</div>
	<div class="dhtmlgoodies_aTab">
		Content of tab 4<br>
	</div>
</div>
<script type="text/javascript" src="../javascript/tabjs/ajax.js"></script>
	<script type="text/javascript" src="../javascript/tabjs/tab-view.js"></script>
    <script src="../javascript/bootstrap.min.js"></script>
<script type="text/javascript">
initTabs('dhtmlgoodies_tabView1',Array('Menu'),0,500,400,Array(false,true,true,true));
</script>
            
        </section><! --/wrapper -->
   

      <!--main content end-->
 
 <?php include( $_SERVER['DOCUMENT_ROOT'] . '/footer.php' ); ?>