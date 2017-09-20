
$('#upload_csv').on("submit", function (e) {
       
    
 
    e.preventDefault(); //form will not submitted  
    $.ajax({  
        url:"actionImport.php",  
        method:"POST",  
        data:new FormData(this),  
        contentType:false,          // The content type used when sending data to the server.  
        cache:false,                // To unable request pages to be cached  
        processData:false,          // To send DOMDocument or non processed data file it is set to false  

        success: function (data) {
                        
            $('#class_file').val('');
            $('#result').html('Data Uploaded Successfully');
           
        } 
    })
});