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
    public function get_data_in_table($query)  
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
                     <td>'.$row->UserName.'</td>  
                     <td>'.$row->Email.'</td>  
                     
                       <td>'.$row->DateReg.'</td>  
                     
                       
                     <td><a name="update" id="'.$row->AdminId.'" class="glyphicon glyphicon-edit update"><a>
<a name="delete" id="'.$row->AdminId.'" class="glyphicon glyphicon-trash delete"></a>                      
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