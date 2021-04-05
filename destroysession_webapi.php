<?php 
require_once('apis.php');
$key = $_GET['Shop'];
// $data = $_POST['data'];
 $obj=new apis();
 $res=$obj->destroysession($key);
 echo json_encode($res);	
?>