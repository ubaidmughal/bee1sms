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
     <link href="/assets/img/baricon.png" rel="shortcut icon">
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
      <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
	<!-- Custom styles for this template -->
      <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />
      <link href="/assets/css/style-responsive.css" rel="stylesheet" type="text/css" />
    <?php include("../db.php");?>
  </head>

  <body>

	<br/>	  
	
<br/>	      <form class="form-login" method="post" style="background-color:alpha(0,0,0,.5)">
		        <h2 class="form-login-heading">Log In Now</h2>
                
                <br>
               
		        <div class="login-wrap">
                <div id="msg" class = "alert alert-danger">Invalid UserName or Password ? </div>
                <br/>
                <label class="control-label">UserType</label>
					<select name="UserType" id="UserType" class="form-control">
                    <option value="" selected="selected"> - Select - </option>
                    <?php 
                    
                    $query = "select * from tblutype";
                    $sql = mysqli_query($con,$query);
                    while($row = mysqli_fetch_assoc($sql))
                    {
                    ?>
                    <option value="<?php echo $row['UserType'];?>"><?php echo $row['UserType'];?></option>
                    <?php
                    }
                    ?>

                    </select>
                    <br/>
		            <input type="text" class="form-control" name="UID" placeholder="User ID" required autofocus>
		            <br>
		            <input type="password" name="Pwd" class="form-control" required placeholder="Password">
		           <br>
		            <button  class="btn btn-theme btn-block" name="btnSignIn"><i class="fa fa-lock"></i> Log IN</button>
		          
                    </div>
		
		         <br>
		<br><br>
		      </form>	  	
	  	
	  	</div>
	  </div>
            <!-- js placed at the end of the document so the pages load faster -->
      <script src="/assets/js/jquery.js" type="text/javascript"></script>
      <script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
      <script src="/assets/js/jquery.backstretch.min.js" type="text/javascript"></script>
    <script>
        $.backstretch("/assets/img/login-bg.jpg", {speed: 250});
    </script>
    <script>

$(document).ready(function(){

$('#msg').hide();


});

</script>


	  <div id="login-page">
	  	<div class="container">
	  	<?php 
		session_start();
	if(isset($_POST['btnSignIn']))
	{
      
    if(!empty($_POST['UID'])&& !empty($_POST['Pwd']))
    {
    $UType=$_POST['UserType'];
      $UName=$_POST['UID'];
     $UPassword=md5($_POST['Pwd']);
     $query="select * from tbluser where UserName='$UName' AND Password='$UPassword' and UserType='$UType'";

     $sql=mysqli_query($con,$query);
	
   if(mysqli_num_rows($sql)> 0)
   {
    $row=mysqli_fetch_assoc($sql);
    $_SESSION['UName']=$row['UserName'];
     $_SESSION['UType']=$row['UserType'];
    if($_SESSION['UType'] == 'Accountant')
    {
       header('location: /FeeDashboard.php');
    }
    else
    {
    header('location: /index.php');	
     }
	
	
	}
	else
	{
    
    ?>
     	
       <script>

$(document).ready(function(){

$('#msg').show();
$('#msg').delay(1000).hide(500); 



});

</script>  
   
<?php 
	

	}
    
	}
	
	}
		
		?>


  </body>
</html>
