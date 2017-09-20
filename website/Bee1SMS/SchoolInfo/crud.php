<?php  
class crud  
{  
    public $connect;  
    private $host = 'localhost';  
    private $username = 'root';  
    private $password = '';  
    private     $database = 'bee1sms';   
    function __construct()  
    {  
        $this->database_connect();  
    }  
    public function database_connect()  
    {  
        $this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);  
    }  
    public function execute_query($query)  
    {  
        return mysqli_query($this->connect, $query);  
    }  
    public function get_data_in_table_school($query)  
    {  
        $output = '';  
        $result = $this->execute_query($query);  
        
        $output .= '  
           <table class="table table-bordered table-striped">  
              
           ';  
        while($row = mysqli_fetch_object($result))  
        {  
            $output .= '  
                <tr>  
                     
                     <td>'.$row->SchoolName.'</td>  
                     <td>'.$row->Reg.'</td>  
                     <td><img src="data:image/jpeg;base64,'.base64_encode($row->Logo ).'" height="60" width="75" class="img-thumbnail" /></td>  
                       <td>'.$row->Address.'</td>  
                     <td>'.$row->latitude.'</td> 
                       <td>'.$row->longitude.'</td>  
                     <td><a name="update" id="'.$row->SchoolId.'" class="glyphicon glyphicon-edit update"><a>
<a name="delete" id="'.$row->SchoolId.'" class="glyphicon glyphicon-trash delete"></a>                      
</td>


</td>  
                </tr>  
                ';  
        }  
        $output .= '</table>';  
        return $output;  
    }  
    public function get_data_in_table_activities($query)  
    {  
        $output = '';  
        $result = $this->execute_query($query);  
        $i = 1;
        $output .= '  
           <table class="table table-bordered table-striped">  
              
           ';  
        while($row = mysqli_fetch_object($result))  
        {  
            $output .= '  
                <tr>  
                     <td>'.$i.'</td>
                     <td>'.$row->ActivityName.'</td>  
                     <td>'.$row->ActivityDescription.'</td>   
                     <td><a name="update" id="'.$row->ActivityId.'" class="glyphicon glyphicon-edit updateactivity"><a>
<a name="delete" id="'.$row->ActivityId.'" class="glyphicon glyphicon-trash deleteactivity"></a>                      
</td>


</td>  
                </tr>  
                ';  
        }  
        $output .= '</table>';  
        return $output;  
    }
    public function get_data_in_table_subject($query)  
    {  
        $output = '';  
        $result = $this->execute_query($query);  
        $i = 1;
        $output .= '  
           <table class="table table-bordered table-striped">  
              
           ';  
        while($row = mysqli_fetch_object($result))  
        {  
            $output .= '  
                <tr>  
                     <td>'.$i.'</td>
                     <td>'.$row->SubjectName.'</td>    
                     <td><a name="update" id="'.$row->SubjectId.'" class="glyphicon glyphicon-edit updatesubject"><a>
<a name="delete" id="'.$row->SubjectId.'" class="glyphicon glyphicon-trash deletesubject"></a>                      
</td>


</td>  
                </tr>  
                ';  
        }  
        $output .= '</table>';  
        return $output;  
    }
    public function get_data_in_table_sections($query)  
    {  
        $output = '';  
        $result = $this->execute_query($query);  
        $i = 1;
        $output .= '  
           <table class="table table-bordered table-striped">  
              
           ';  
        while($row = mysqli_fetch_object($result))  
        {  
            $output .= '  
                <tr>  
                     
                     <td>'.$row->SectionName.'</td>    
                     <td><a name="update" id="'.$row->SectionId.'" class="glyphicon glyphicon-edit updatesection"><a>
<a name="delete" id="'.$row->SectionId.'" class="glyphicon glyphicon-trash deletesection"></a>                      
</td>


</td>  
                </tr>  
                ';  
        }  
        $output .= '</table>';  
        return $output;  
    }
    public function get_data_in_table_class($query)  
    {  
        $output = '';  
        $result = $this->execute_query($query);  
    
        $output .= '  
           <table class="table table-bordered table-striped">  
              
           ';  
        while($row = mysqli_fetch_object($result))  
        {  
            $output .= '  
                <tr>  
                     
                     <td>'.$row->ClassName.'</td>    
                     <td><a name="update" id="'.$row->ClassId.'" class="glyphicon glyphicon-edit updateclass"><a>
<a name="delete" id="'.$row->ClassId.'" class="glyphicon glyphicon-trash deleteclass"></a>                      
</td>


</td>  
                </tr>  
                ';  
        }  
        $output .= '</table>';  
        return $output;  
    }
    public function get_data_in_table_schedule($query)  
    {  
        $output = '';  
        $result = $this->execute_query($query);  
    
        $output .= '  
           <table class="table table-bordered table-striped">  
              
           ';  
        while($row = mysqli_fetch_object($result))  
        {  
            $output .= '  
                <tr>  
                     
                     <td>'.$row->FromTime.'</td> 
<td>'.$row->ToTime.'</td> 
<td>'.$row->Occurs.'</td> 
<td>'.$row->TeacherSubject.'</td>    
                     <td><a name="update" id="'.$row->ClassSectionId.'" class="glyphicon glyphicon-edit updateschedule"><a>
<a name="delete" id="'.$row->ClassSectionId.'" class="glyphicon glyphicon-trash deleteschedule"></a>                      
</td>


</td>  
                </tr>  
                ';  
        }  
        $output .= '</table>';  
        return $output;  
    }
}  
?>  