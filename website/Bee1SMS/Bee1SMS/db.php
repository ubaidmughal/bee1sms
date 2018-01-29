<?php

session_start();
$con = mysqli_connect("localhost","root","","bee1sms");


$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=bee1sms', $username, $password );

?>