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
    <!-- Bootstrap core CSS -->
     <link href="/img/baricon.png" rel="shortcut icon">
    <link href="/Css/bootstrap.css" rel="stylesheet">
    <!--external css-->
      <link href="/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<!-- Custom styles for this template -->
      <link href="/Css/style.css" rel="stylesheet" type="text/css" />
      <link href="/Css/style-responsive.css" rel="stylesheet" type="text/css" />
  </head>

  <body style="	background-image:url(/img/parallax-bggg.jpg);
background-repeat:no-repeat;
background-size:contain;
background-position:center;">

<?php include("../appconfig.php");?>

	  <div id="login-page">
	  	<div class="container">
	  	<?php 
		
	if(isset($_POST['btnSignIn']))
	{
      
    if(!empty($_POST['UID'])&& !empty($_POST['Pwd']))
    {
      $UName=$_POST['UID'];
     $UPassword=$_POST['Pwd'];
     $query="select * from tblConfig where SupUId='$UName' AND SupUPwd='$UPassword'";

     $sql=mysqli_query($con,$query);
	
   if(mysqli_num_rows($sql)> 0)
   {
    $row=mysqli_fetch_assoc($sql);
    $_SESSION['UName']=$row['SupUId'];
	
	if($row['SupUId'] == 'manager'){
		$_SESSION['SupUser'] = $row['SupUId'];
			header('location: /OrgSetup/ShellPage.php');
		}
	else{
			header('location: /dashboard.php');	
		}
    
	
	}
	else
	{
     	$errmsg= "Invalid User Name or Password";	
	}
	}
	
	}
		
		?>
		      <form class="form-login" method="post">
		        <h2 class="form-login-heading">sign in now</h2>
                
                
               
		        <div class="login-wrap">
                <label class="text-danger" style="border:1px solid #F00; padding:7px 15px; border-radius:5px;"><?php if(isset($errmsg)){echo $errmsg;} ?></label>
		            <input type="text" class="form-control" name="UID" placeholder="User ID" required autofocus>
		            <br>
		            <input type="password" name="Pwd" class="form-control" required placeholder="Password">
		           <br>
		            <input type="submit" class="btn btn-theme btn-block" value="SIGN IN" name="btnSignIn">
		            <hr>
                    </div>
		
		         
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
      <script src="/javascript/jquery.js" type="text/javascript"></script>
      <script src="/javascript/bootstrap.min.js" type="text/javascript"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
      <script src="/javascript/jquery.backstretch.min.js" type="text/javascript"></script>
    <script>
        $.backstretch("/img/admin%20background.jpg", {speed: 250});
    </script>


  </body>
</html>
