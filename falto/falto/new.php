<htlm>
<head>
<title> Registration Form</title>
</head>
<body>
<div>
<form action="new.php" method="post">
name:<input type="text" name="text">
username:<input type="text" name="text">
<input type="submit" name="submit">

</form>
</div>

</body>



</htlm>
<?php
 if(isset($_Post['submit']))
 {
	 $value=$_Post['text'];
	 $value1=$_Post['text'];
	 $con=mysqli_connect("localhost","root","","test");
	 $sql="Insert Into test value('$value''$value1')";
	 
	 $res=mysql_query($con,$sql);
	 if($res){
		 echo "run";
	 }
	 else
	 {
		 echo "error in programme";
	 }
	 
	 
 }

?>