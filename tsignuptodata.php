<?php 
require_once('apis.php');
$teacher_name = $_POST['tname'];
$teacher_email = $_POST['temail'];
$teacher_mobile = $_POST['tmobile'];
$teacher_branch = $_POST['tbranch'];
$teacher_password = $_POST['tpassword'];
 $obj=new apis();
 $res=$obj->tsignup($teacher_name,$teacher_email,$teacher_mobile,$teacher_branch,$teacher_password);
 echo json_encode($res);	
?>
