<?php 
	class apis{
		private $db;
		private $server;
		private $username;
		private $password;
		private $con;

		private $response;		
		
		function __construct() {
    		$this->con = mysqli_connect("localhost","root","","question");
		    if (mysqli_connect_errno()) {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  exit();	
			}
  		} 	
  		function tsignup($teacher_name,$teacher_email,$teacher_mobile,$teacher_branch,$teacher_password){
  			$sql= "SELECT * FROM `teacher` WHERE email = '$teacher_email'";
			$result = mysqli_query($this->con,$sql);	
			if(mysqli_num_rows($result)==1)
   			{
       			$response['Success']='false';
			  	$response['Message']='this email is already taken';
    		} else {
    			$teacher_password = md5($teacher_password);
    			 $sql= "INSERT INTO `teacher` (`name`,`branch`, `email`, `mobile`,`password`) VALUES ('$teacher_name', '$teacher_branch', '$teacher_email','$teacher_mobile', '$teacher_password')";
			  	$result = mysqli_query($this->con,$sql);
			  	if($result){
			  		$response['Success']='true';
			  	$response['Message']='teacher Register successfull..';
			  	}else{
    				$response['Success']='false';
			  		$response['Message']="teacher Register unsuccessful..";
    			}
    			
     		}
			return $response;
    	}
  		function tlogin($teacher_email,$teacher_password){	
  			$teacher_password=md5($teacher_password);
			$sql= "SELECT * FROM `teacher` WHERE `email` = '$teacher_email' AND `password` = '$teacher_password'";
			$result = mysqli_query($this->con,$sql);	
			if(mysqli_num_rows($result)==1)
   			{
   				$data=mysqli_fetch_assoc($result);
				//session_start();
				$this->startsession("teacher",$data);

				$response['Success']='true';
			  	$response['Message']='login Successfull..';
			}else
			{
			  $response['Success']='false';
			  $response['Message']='login Unsuccessfull..';
			}
			return $response;
			}
		
		function ssignup($student_name,$student_email,$student_mobile,$student_branch,$student_sem,$student_password){
  			$sql= "SELECT * FROM `student` WHERE `student_email` = '$student_email'";
			$result = mysqli_query($this->con,$sql);	
			if(mysqli_num_rows($result)==1)
   			{
       			$response['Success']='false';
			  	$response['Message']='this email is already taken';
    		} else {
    			$student_password = md5($student_password);
    			 $sql= "INSERT INTO `student` (`student_name`, `student_email`, `student_mobile`,`student_branch`,`student_sem`,`student_password`) VALUES ('$student_name', '$student_email','$student_mobile','$student_branch','$student_sem', '$student_password')";
			  	$result = mysqli_query($this->con,$sql);
			  	if($result){
			  		$response['Success']='true';
			  	$response['Message']='student Register successfull..';
			  	}else{
    				$response['Success']='false';
			  		$response['Message']="student Register unsuccessful..";
    			}
    			
     		}
			return $response;
    	}
  		function slogin($student_email,$student_password){		
  			$student_pass=md5($student_password);
			$sql= "SELECT * FROM `student` WHERE `student_email` = '$student_email' AND `student_password` = '$student_pass'";
			$result = mysqli_query($this->con,$sql);
			if(mysqli_num_rows($result)==1)
   			{

   				$data=mysqli_fetch_assoc($result);
				//session_start();
				$this->startsession("student",$data);
				$response['Success']='true';
			  	$response['Message']='login Successfull..';

			}else
			{
			  $response['Success']='false';
			  $response['Message']='login Unsuccessfull..';
			}
			return $response;
			}
			function startsession($key,$data)
		{
			session_start();
			$_SESSION[$key]=$data;
			$response['Success']='true';
			$response['Message']=" session started";
			return $response; 
		}
function destroysession($key)
	{
		session_start();
		session_destroy();
		$response['Success']='true';
		$response['Message']=" session destroyed";
		return $response;
	}



function uploadquestion($teacher_id,$teacher_name,$branch,$sem,$subject,$year,$section,$questionno,$question){
	$con=$this->con($teacher_id,$teacher_name,$branch,$sem,$subject,$year);
	if($con['Success'] == 'true'){
        $con_id=$con['con_id'];
        $questionpaper=$this->questionpaper($con_id,$section,$questionno,$question);
        if($questionpaper['Success'] == 'true')
        {
	        	$response['Success']='true';
	        	$response['Message']='Question paper uploaded';
		}
		else
		{
			$response['Success']='false';
            $response['Message']="Not successful";
		}
	}else
	{
		$response['Success']='false';
        $response['Message']="Enter valid inputs";
	}
	return $response;
}

		function con($teacher_id,$teacher_name,$branch,$sem,$subject,$year){
    $res = mysqli_query($this->con,"INSERT INTO `con` (`teacher_id`,`teacher_name`,`branch`,`sem`,`subject`,`year`) VALUES ('$teacher_id','$teacher_name', '$branch','$sem','$subject','$year')");
    $id=mysqli_insert_id($this->con);
    if($res){
      $response['Success']='true';
      $response['con_id']=$id;
      $response['Message']="Successfull";  
    }else{
      $response['Success']='false';
      $response['Message']="unsuccessful";  
    }
      return $response;
    }
    function questionpaper($con_id,$section,$questionno,$question){
		   	for($i=0;$i<count($section);$i++) {
		    $sec=$section[$i];
		    $quesno=$questionno[$i];
		    $ques=$question[$i];
	    $sql = "INSERT INTO `questionpaper` (`con_id`,`section`,`questionno`,`question`) VALUES ('$con_id','".$sec."','".$quesno."','".$ques."')";
	    $result = mysqli_query($this->con,$sql);
	    
	    	if($result)
	    	{
	      			$response['Success']='true';
	      			$response['Message']="Successfull";  
	    	}
	    	else
	    	{
	    			$response['Success']='false';
	      			$response['Message']="unsuccessfull";  
	    	}
	    	continue;
		}	
		return $response;
	}
	 function showquestosfromdata($student_branch,$student_sem){
    	$tt=array();
 	 	$sql1= "SELECT * FROM `con` WHERE `branch`='$student_branch' AND `sem`='$student_sem'";
		$result1 = mysqli_query($this->con,$sql1);
		if($result1 && $result1->num_rows > 0) 
		{
  			while($row1 = mysqli_fetch_assoc($result1))
  			{
				$temp=array();
  				$cid=$row1['con_id'];
  				$sql="SELECT t.* FROM  `questionpaper` as t  where t.con_id=$cid";
				$result = mysqli_query($this->con,$sql);
   				if($result && $result->num_rows > 0) 
				{
			  	    while($row = mysqli_fetch_assoc($result))
			  		{
			  			array_push($temp, $row);
					}
				}
				$row1['questions']=$temp;
				array_push($tt, $row1);
			}
			$response['Success']='true';
			$response['Message']=" data found";
			$response['data'] =$tt;
		}else{
			$response['Success']='false';
		  	$response['Message']="No data found";
		}
		return $response;
    } 
  
}
?>