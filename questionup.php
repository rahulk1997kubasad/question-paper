<?php
session_start();
?>
<?php
isset($_SESSION['teacher']);
?>
  <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php

    include 'head.php'; 
?>
<head>
  <style type="text/css">
    #logout,#gg{
  
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

#gg:hover {
  background-color: black;
  color: white;
}
#logout:hover{
  background-color: black;
  color: white;
}
  </style>
</head>
<body>
	<div class="container">
		
	<div id="profile" class="col s12">
       
<div class="card center" style="padding:10px;background-color:transparent;">
       <div class="container">
          
           <h5>Question Paper</h5>
    <form class="col s12" id="questiontodata" onSubmit="window.location.reload()">
      
        <input type="hidden" name="teacher_name" id="teacher_name" value=<?php echo $_SESSION['teacher']['name'];?>>
       <!--  <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name" style="color: black">Last Name</label>
        </div> -->
           <input type="hidden" id="teacher_id" name="teacher_id" value=<?php echo $_SESSION['teacher']['teacher_id'];?>>
   <div class="row">
        <div class="input-field col s6">
            <input disabled id="tbranch" name="tbranch" value=<?php echo $_SESSION['teacher']['branch'];?>>
    		</div>
        
        <div class="input-field col s6">
          <select name='sem' id="sem">
      			<option value="" disabled selected>Sem</option>
     			 <option value="1">Sem 1</option>
      				<option value="2">Sem 2</option>
      			<option value="3">Sem 3</option>
    			</select>
        </div>
        <div class="input-field col s6">
          <input id="subject_name" type="text" class="validate" name="subject" required="">
          <label for="subject_name" style="color: black">Subject Name</label>
        </div> 
                <div class="input-field col s6">
          <input id="year" type="text" class="validate" name="year" required="">
          <label for="year" style="color: black">Enter Year</label>
        </div> 
          
        </div>
        <div class="row" id="add">
        <div class="input-field col s6">
      <input id="section" type="text" class="validate" name="section[]" required="">
          <label for="section" style="color: black">Section</label>
  </div>
                <div class="input-field col s6">
    <input id="questionno" type="text" class="validate" name="questionno[]" required="">
          <label for="questionno" style="color: black">Question NO</label>
  </div>
        <div class="input-field col s12">
        <input id="question" type="text" class="validate" name="question[]" required="">
          <label for="question" style="color: black">Question</label>
        </div>
    </div>
    <div class="row">

           <a class="btn-floating btn-large waves-effect waves-light red" id="add1"><i class="material-icons">add</i></a><br><br>
         </div>
  <div class="row">
					<div class="col s4 m4 l4" style="text-align: center;">
						<button id="gg" type="submit">Submit</button>
					</div>
          <div class="col s8 m8 l8"><button style="margin-left: 300px"  onclick="test()"  id="logout">Logout</button></div>
				</div>
        </form>
			</div>
  </div>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
    $('select').formSelect();
  });
</script>
<script type="text/javascript">
	$(document).ready(function(){
   $(this).on("click","#add1",function(){
       var html ='<div class="input-field col s6"><input id="section" type="text" class="validate" name="section[]" required=""><label for="section" style="color: black">Section</label></div><div class="input-field col s6"><input id="questionno" type="text" class="validate" name="questionno[]" required=""><label for="questionno" style="color: black">Question NO</label></div><div class="input-field col s12"><input id="question" type="text" class="validate" name="question[]" required=""><label for="question" style="color: black">Question</label></div>';
         // html += '<button class="remove">Remove</button></div>';
        $("#add").append(html);

    });
   // $(this).on("click",".remove",function(){

   //    var target_input =  $(this).parent();
   //    target_input.remove();
   //    });
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
$('#questiontodata').submit(function(e){
var teacher_name = $('#teacher_name').val();
var tbranch = $('#tbranch').val();
var teacher_id = $('#teacher_id').val();
var sem = $('#sem').val();
var subject = $('#subject_name').val();
var year = $('#year').val();
var section = [];
    $('input[name="section[]"]').each( function() {
        section.push(this.value);
    });
    var questionno = [];
    $('input[name="questionno[]"]').each( function() {
        questionno.push(this.value);
    });
    var question = [];
    $('input[name="question[]"]').each( function() {
        question.push(this.value);
    });
    // var single=[section,questionno,question];
    // console.log(single);
$.ajax({

  type : 'POST',
  url : 'questiontodata.php',
 data : {
            teacher_name:teacher_name,
            tbranch:tbranch,
            teacher_id:teacher_id,
            sem:sem,
            subject:subject,
            year:year,
            section:section,
            questionno:questionno,
            question:question,
          },
  success : function(response){
       var json = $.parseJSON(response);
       if(json.Success == 'true')
       {
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
<script type="text/javascript">
  function test()
{
    
    $("#logout").click(function() {
               var Shop ="<?php $_SESSION['teacher']?>";
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