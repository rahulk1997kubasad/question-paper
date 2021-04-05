<?php 
require_once('apis.php');
$teacher_email = $_POST['temail'];
$teacher_password = $_POST['tpassword'];
 $obj=new apis();
 $res=$obj->tlogin($teacher_email,$teacher_password);
 echo json_encode($res);	
?>