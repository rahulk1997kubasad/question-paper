<?php
require_once('apis.php');
$teacher_id = $_POST['teacher_id'];
$teacher_name = $_POST['teacher_name'];
$branch = $_POST['tbranch'];
$sem = $_POST['sem'];
$subject = $_POST['subject'];
$year = $_POST['year'];
$section = $_POST['section'];
$questionno = $_POST['questionno'];
$question = $_POST['question'];
 $obj=new apis();
 $res=$obj->uploadquestion($teacher_id,$teacher_name,$branch,$sem,$subject,$year,$section,$questionno,$question);
 echo json_encode($res);	
?>