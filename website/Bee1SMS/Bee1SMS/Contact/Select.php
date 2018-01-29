<?php
include($_SERVER['DOCUMENT_ROOT'].'/appconfig.php');
if(isset($_POST["country_id"]) && !empty($_POST["country_id"])){
    //Get all state data
    $query = "SELECT * FROM states WHERE country_id = ".$_POST['country_id']." ";
    
   $sql = mysqli_query($con,$query);
    
    //Display states list
    
        echo '<option value="">Select state</option>';
        while($row = mysqli_fetch_assoc($sql)){ 
            echo '<option id="'.$row['state_id'].'" value="'.$row['name'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">State not available</option>';
    }


if(isset($_POST["state_id"]) && !empty($_POST["state_id"])){
    //Get all city data
    $query = "SELECT * FROM cities WHERE state_id = ".$_POST['state_id']."";
    
    //Count total number of rows
    $sql = mysqli_query($con,$query);
    
    //Display cities list
   
        echo '<option value="">Select city</option>';
        while($row = mysqli_fetch_assoc($sql)){ 
            echo '<option value="'.$row['name'].'">'.$row['name'].'</option>';
        }
    }else{
        echo '<option value="">City not available</option>';
    }

?>