<?php 
include('Studentheader.php');
include($_SERVER['DOCUMENT_ROOT'].'/appconfig.php');
 if(!isset($_SESSION['UName']))
 {
	 header('location: /Admin/login.php');
 }
  

?>


<!--main content start-->
        <section id="main-content">
            <section class="wrapper">

                <div class="row">
                  <div class="col-lg-12 main-chart">

                      <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                      
                    </div><!-- /row -->
                    
                    				
					
					
                      <!--custom chart end-->
					</div><!-- /row -->	
					
                  </div><!-- /col-lg-12 END SECTION MIDDLE -->
            </section>
        </section>

        <!--main content end-->


<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php')?>

