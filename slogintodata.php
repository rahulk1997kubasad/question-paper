<?php 
require_once('apis.php');
$student_email = $_POST['semail'];
$student_password = $_POST['spassword'];
 $obj=new apis();
 $res=$obj->slogin($student_email,$student_password);
 echo json_encode($res);	
?>