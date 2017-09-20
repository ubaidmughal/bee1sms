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
    public function get_data_in_table_students($query)  
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
                     
                     <td>'.$row->StudentCode.'</td>
                     <td>'.$row->StudentName.'</td>
                    <td>'.$row->FamilyGroup.'</td>
                    <td>'.$row->NameOfGroup.'</td>
                    <td>'.$row->FatherName.'</td>
                    <td>'.$row->Class.'</td>
                    <td>'.$row->Section.'</td>
                    <td>'.$row->Age.'</td>
                    <td>'.$row->DOB.'</td>
                    <td>'.$row->Gender.'</td>
                    <td>'.$row->Address.'</td>
                    <td>'.$row->ContactPerson.'</td>
                     <td><a name="update" id="'.$row->StudentId.'" class="glyphicon glyphicon-edit updatestudent"><a>
<a name="delete" id="'.$row->StudentId.'" class="glyphicon glyphicon-trash deletestudent"></a>                      
</td>


</td>  
                </tr>  
                ';  
        }  
        $output .= '</table>';  
        return $output;  
    }
    function upload_file($file)  
    {  
        if(isset($file))  
        {  
            $extension = explode('.', $file['name']);  
            $new_name = rand() . '.' . $extension[1];  
            $destination = './upload/' . $new_name;  
            move_uploaded_file($file['tmp_name'], $destination);  
            return $new_name;  
        }  
    }  

}  
?>  