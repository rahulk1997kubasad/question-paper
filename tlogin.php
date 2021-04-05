<?php
session_start();

    include 'head.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<body>
	<div class="container">
		
	<div class="card" style="padding: 15px; padding-left: 25px; padding-right: 25px; width: 38%; display: block; margin-left: auto; margin-right: auto;">
			<div class="card-header">
				<h4>Faculty Login</h4>
			</div>
			<div class="card-body">
				<form id="userlogin" method="POST">
                    <div class="input-field">
		          		<input id="temail" type="email" class="validate" name="temail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="enter the valid email ID">
          				<label for="email">Email-Id</label>						
					</div>
					<div class="input-field">
		          		<input id="tpassword" type="password" class="validate" name="tpassword" title="password must be 4 characters">
          				<label for="tpassword">Password</label>
					</div>
					<div style="text-align: center;">
						<button type="submit" class="btn" id="ulogin">Login</button>
					</div>
					<h6 align="center" style="text-align: center;">New User?<a href="tsign-up.php">&nbsp; Create Account!</a></h6>
				</form>
			</div>
		</div>
	</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script>
$(document).ready(function(){
$('#userlogin').submit(function(e){

	var data1 = $("#userlogin").serialize(); 
$.ajax({

  type : 'POST',
  url : 'tlogintodata.php',
  data : data1,

  success : function(response){
  	   var json = $.parseJSON(response); // create an object with the key of the array
  	   if(json.Success == 'true')
  	   {
  	   		 location.href = "questionup.php"; 
  	   		alert(json.Message);
  	   }
  	   else{ 
    	   	alert(json.Message);
    }
	}

});
e.preventDefault();
});
});
</script>

</html>  
