<?php include($_SERVER['DOCUMENT_ROOT'].'/appconfig.php');

unset($_SESSION['UName']);
unset($_SESSION['SupUser']);

session_destroy();

 ?>
<script>window.location='/Admin/login.php';</script>