<?php
session_start();

    include 'head.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
	span.s {
    display:table;
    margin-left: auto;
    margin-right: auto;
	}
	table {
  border-collapse: collapse;
  width: 100%;
}
button{
  
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #f1f1f1;
  color: black;
  font-size: 16px;
  padding: 16px 30px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

button:hover {
  background-color: black;
  color: white;
}

</style>
<body>
	<div class="container">
		
		<form id="ll">
				<h7><b>Welcome <?php echo $_SESSION['student']['student_name']; ?></b></h7>
				<input type="hidden" id="student_branch" name="student_branch" value=<?php echo $_SESSION['student']['student_branch'];?>>
				<input type="hidden" id="student_sem" name="student_sem" value=<?php echo $_SESSION['student']['student_sem'];?>>
				</form>
<div id="f">
</div>
	</div>

	<br>>
	<div class="container" style="margin-left: auto;margin-right: auto">
	<div class="row" id="ss">
		<div id="no"></div>
		      <div class="col s6 m6 l6"><button id="print" style="margin-left: auto" onclick="window.print()">Print</button></div>
		      <div class="col s6 m6 l6"><button style="margin-right: auto"  onclick="test()"  id="logout">Logout</button></div>
		  </div>
</div>

</body>
<script type="text/javascript">
	$(document).ready(function(){
		var data1 = $("#ll").serialize(); 
$.ajax({
  type : 'POST',
  url : 'showquestosfromdata.php',
  data : data1,
    success: function(data){ 
      var json = $.parseJSON(data);
      if(json.Success == 'true')
      {
        response = json['data'];
        for (var i = 0, len = response.length; i < len; ++i) 
        {
        	var catObj=response[i];	
        	var questions = response[i].questions;
        	var html1='';
          	for(var j=0; j<questions.length; ++j)
          	{
            	var catObj1 = questions[j];
            	html1=html1+'<tr><td style="text-align: center;border: none;">'+catObj1.section+'</td><td style="text-align: center;border: none;">'+catObj1.questionno+'</td><td style="text-align: center;border: none;">'+catObj1.question+'</td><td></td></tr></div></div>';
          	}
			var html='<div class="card" style="padding: 15px; padding-left: 10px; padding-right: 10px; width: 100%; display: block; margin-left: auto; margin-right: auto; "><div class="row"><div class="col s4 m4 l4"><span class="s">Faculty Name</span><span class="s">'+catObj.teacher_name+'</span></div><div class="col s4 m4 l4"><span class="s">Subject</span><span class="s">'+catObj.subject+'</span></div><div class="col s4 m4 l4"><span class="s">Year</span><span class="s">'+catObj.year+'</span></div></div><div class="row"><div class="col s6 m6 l6"><span class="s">branch</span><span class="s">'+catObj.branch+'</span></div><div class="col s6 m6 l6"><span class="s">sem</span><span class="s">'+catObj.sem+'</span></div></div><div class="row"><table border="0" style="border:none"; id='+catObj.con_id+'><tr><th style="text-align:center;border:none;" width="10%">Sec</th><th width="10%" style="text-align:center;border:none;">Q.No</th><th width="80%" style="text-align:center;border:none;"s>Question</th></tr>';
			$("#f").append(html);
			$('#'+catObj.con_id).append(html1);
        }
      }   
      else{
    $(document).ready(function(){
    $("#print").hide();
});
     var no='<h6>No Question Paper available at this time</h6>';
     $("#no").append(no);
 }
    }
  });    
});

</script>
<script type = text/javascript>
function test()
{
    
    $("#logout").click(function() {
               var Shop ="<?php $_SESSION['student']?>";
        $.ajax({
            type: 'GET',
            url: 'destroysession_webapi.php?key=Shop',
            data : 'Shop',

            success: function(data){
                 alert("Logout Successfully");
                 document.location="Welcome.php";
            }


        });
        // session_destroy();
    });
}
</script>

</html>