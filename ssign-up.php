	
<html lang="en">
<?php
    include 'head.php';
    ?>
<body>
<div class="container">
	<div class="card" style="padding: 15px; padding-left: 25px; padding-right: 25px; width: 38%; display: block; margin-left: auto; margin-right: auto;">
			<div class="card-header">
				<h4>Student Sign-Up</h4>
			</div>
			<div class="card-body">
				<form id="usersignup" action="">
					<div class="input-field">
		          		<input id="sname" type="text" class="validate" name="sname">
          				<label for="sname">Name</label>						
					</div>
                    <div class="input-field">
		          		<input id="semail" type="email" class="validate" name="semail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="enter the valid email ID">
          				<label for="semail">Email-Id</label>						
					</div>
                    <div class="input-field">
		          		<input id="smobile" type="text" class="validate" name="smobile" pattern="[0-9]{10}" title="phone must be 10 numbers">
          				<label for="smobile">Phone</label>						
					</div>
						<!-- 		<div class="input-field">
		          		<input id="tbranch" type="text" class="validate" name="tbranch">
          				<label for="tbranch">Branch</label>

					</div>
 -->					<div class="input-field">
   					 <select name='sbranch'>
      			<option value="" disabled selected>Branch</option>
     			 <option value="CSE">CSE</option>
      				<option value="ISE">ISE</option>
      			<option value="MECH">MECH</option>
    			</select>
  				</div>
  				<div class="input-field">
   					 <select name='ssem'>
      			<option value="" disabled selected>Sem</option>
     			 <option value="1">SEM 1</option>
      				<option value="2">SEM 2</option>
      			<option value="3">SEM 3</option>
    			</select>
  				</div>

					<div class="input-field">
		          		<input id="spassword" type="password" class="validate" name="spassword" pattern="[a-z]{4}" title="password must be 8 characters">
          				<label for="spassword">Password</label>
					</div>

					<div style="text-align: center;">
						<button type="submit" class="btn">Sign-up</button>
					</div>
					<h6 align="center" style="text-align: center;">Have an Account!<a href="slogin.php">&nbsp; Login</a></h6>
				</form>
			</div>
		</div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script src="https://apis.google.com/js/api:client.js"></script>

	<script>
$(document).ready(function(){
$('#usersignup').submit(function(e){

	var data1 = $("#usersignup").serialize();


$.ajax({

  type : 'POST',
  url : 'ssign-uptodata.php',
  data : data1,
  success : function(response){
  	var json = $.parseJSON(response); // create an object with the key of the array
  	   if(json.Success == 'true')
  	   {
  	   	location.href = "slogin.php"; 
  	   	alert(json.Message);	
  	   }
  	   else
  	   	alert(json.Message); // where html is the key of array that you want, $response['html'] = "<a>something..</a>";
       
    }
})
e.preventDefault();
});
});
  $(document).ready(function(){
    $('select').formSelect();
  });

</script>
</body>
</html>