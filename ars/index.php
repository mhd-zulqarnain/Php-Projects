<?php 

	if(isset($_POST['getContent']))
	{
		$file = file_get_contents('http://www.jqueryscript.net/jquery-plugins/list-16-3.html');
		echo $file;
	}
	
	if(isset($_POST['saveContentFile']))
	{
		$content= $_POST['saveResult'];
		file_put_contents('data/list-16-3.html',$content);
	}
?>

<html>
	<head>
		
	</head>
	<body>
		<form action="index.php" method="post"> 
			<input type="submit" value="Get Content from another site" name="getContent"/>
			<input type="button" value="Specific" onclick="getSpecific()"/><br>
			<textarea id="result" name="saveResult"></textarea><br>
			<input type="submit" value="Save Content into your file" name="saveContentFile"/>
			<br>
			
		
		</form>
		<script>
		 var Result = document.getElementById('result');
		function getSpecific()
		{
			var getSection = document.getElementsByTagName('article')
			for(i=0;i<getSection.length;i++)
			{
				Result.innerHTML=Result.innerHTML+ "<div class='saveSection'>"+getSection[i].innerHTML  +"</div>" 
			}

			
		}	
		</script>
	</body>
	
</html>
