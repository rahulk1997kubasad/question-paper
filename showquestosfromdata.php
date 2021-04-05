<?php 
require_once('apis.php');
$student_branch = $_POST['student_branch'];
$student_sem = $_POST['student_sem'];
 $obj=new apis();
 $res=$obj->showquestosfromdata($student_branch,$student_sem);
 echo json_encode($res);	
?>