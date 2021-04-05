<?php
require_once('apis.php');
$student_name = $_POST['sname'];
$student_email = $_POST['semail'];
$student_mobile = $_POST['smobile'];
$student_branch = $_POST['sbranch'];
$student_sem = $_POST['ssem'];
$student_password = $_POST['spassword'];
 $obj=new apis();
 $res=$obj->ssignup($student_name,$student_email,$student_mobile,$student_branch,$student_sem,$student_password);
 echo json_encode($res);	
?>