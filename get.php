
<html>
<form>

    <button class="btn-link" id="btn" type="submit">download</button>
    <div id="ss"></div>
    <a  id="bb" style="display: none;" ></a>
</form>
</html>
<script type="text/javascript">

$("#btn").submit(function(e) {
    e.preventDefault();    
$.ajax({
  type : 'POST',
  url : 'listdata.php',
  data : data1,
    success: function(data){ 
      var json = $.parseJSON(data);
      if(json.Success == 'true')
      {
        response = json['data'];
        for (var i = 0, len = response.length; i < len; ++i) 
        {
        	var list=response[i];
        	var list1=response[0];
			var html='<p>'+list.name+'</p><br>';
			$("#ss").append(html);
			
        }
        $("#bb").append(list1);
      }   
 }

  });
    $.ajax({
        url: "files/",
        method: 'GET',
        xhrFields: {
            responseType: 'blob'
        },
        success: function (data) {
            var a = document.createElement('a');
            var url = window.URL.createObjectURL(data);
            a.href = url;
            a.download = ''+list1+'.pdf';
            document.body.append(a);
            a.click();
            a.remove();
            window.URL.revokeObjectURL(url);
        }
    });
});




</script>
