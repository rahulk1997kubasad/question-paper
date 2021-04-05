	
<html lang="en">
<?php
    include 'head.php';
    ?>
<body>
<div class="container">
	<div class="card" style="padding: 15px; padding-left: 25px; padding-right: 25px; width: 38%; display: block; margin-left: auto; margin-right: auto; height: 520px">
			<div class="card-header">
				<h4>Faculty Sign-Up</h4>
			</div>
			<div class="card-body">
				<form id="usersignup" action="">
					<div class="input-field">
		          		<input id="tname" type="text" class="validate" name="tname">
          				<label for="tname">Name</label>						
					</div>
                    <div class="input-field">
		          		<input id="temail" type="email" class="validate" name="temail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="enter the valid email ID">
          				<label for="temail">Email-Id</label>						
					</div>
                    <div class="input-field">
		          		<input id="tmobile" type="text" class="validate" name="tmobile" pattern="[0-9]{10}" title="phone must be 10 numbers">
          				<label for="tmobile">Phone</label>						
					</div>
						<!-- 		<div class="input-field">
		          		<input id="tbranch" type="text" class="validate" name="tbranch">
          				<label for="tbranch">Branch</label>

					</div>
 -->					<div class="input-field">
   					 <select name='tbranch'>
      			<option value="" disabled selected>Branch</option>
     			 <option value="CSE">CSE</option>
      				<option value="ISE">ISE</option>
      			<option value="MECH">MECH</option>
    			</select>
  				</div>

					<div class="input-field">
		          		<input id="tpassword" type="password" class="validate" name="tpassword" pattern="[a-z]{4}" title="password must be 8 characters">
          				<label for="tpassword">Password</label>
					</div>

					<div style="text-align: center;">
						<button type="submit" class="btn">Sign-up</button>
					</div>
					<h6 align="center" style="text-align: center;">Have an Account!<a href="tlogin.php">&nbsp; Login</a></h6>
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
  url : 'tsignuptodata.php',
  data : data1,
  success : function(response){
  	var json = $.parseJSON(response); // create an object with the key of the array
  	   if(json.Success == 'true')
  	   {
  	   	location.href = "tlogin.php"; 
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