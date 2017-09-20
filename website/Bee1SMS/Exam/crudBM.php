<?php  
class crudBM  
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
                       
                     <td>'.$row->BookNames.'</td>  
                     
                       <td>'.$row->Author.'</td>  
                     <td>'.$row->Publisher.'</td> 
                       <td>'.$row->ContactPerson.'</td>  
                     <td><a name="update" id="'.$row->BookId.'" class="glyphicon glyphicon-edit updateb"><a>
<a name="delete" id="'.$row->BookId.'" class="glyphicon glyphicon-trash deleteb"></a>                      
</td>

                </tr>  
                ';  
        }  
        $output .= '</table>';  
        return $output;  
    }  
    
    

}  
?>  