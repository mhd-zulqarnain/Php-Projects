<html>

  <head>
     <style>
	  body
	  {
		  margin:0px;
		  padding:0px;
	  }
	 
	   #header
	   {
		   height:50px;
		   width:100%;
		   background:black;
		   position:relative;
	   }
	   #nav
	   {
		   background:black;
		   width:80%;
		   height:50px;
		   position:absolute;
	   }
	   #nav ul
	   {
		   height:50px;
		   list-style:none;
		   position:absolute;
	   }
	   #nav ul li
	   {
		   float:left;
		   margin-left:40px;
	   }
	   #nav ul li a
	   {
		   text-decoration:none;
		   line-height:10px;
		   color:grey;
	   }
	   #nav ul li a:hover
	   {
		   transition:all 2s;
		   color:white;
	   }
	   #sector
	   {
		   height:75px;
		   width:100%;
	   }
	   #sector h1
	   {
		   margin-left:74px;
		   margin-top:30px;
		   font-size:40px;
	   }
	   #sector1
	   {
		   height:120px;
	   }
	   #sector1 p
	   {
		   margin-left:65px;
	   }
	   .pic
	   {
		   height:400px;
		   
	   }
	   .pic img
	   {
		   height:300px;
		   width:900px;
		   margin-left:60px;
		   margin-top:20px;
	   }
	   .pic p
	   {
		   margin-left:60px;
	   }
	   #button
	   {
		   margin-left:60px;
		   margin-top:20px;
		   }
	   #button a
	   {
		   color:white;
		   border:solid black;
		   border-width:1px;
		   background:blue;
		   text-decoration:none;
		   padding:10px;
	   }
	   #button a:hover
	   {
		   background:purple;
		   transition:all 2s;
	   }
	   
	 </style>
  </head>
  
      <body>
	     <div id="header">
		   <div id="nav">
		   <ul>
		       <li><a href="#" style="font-size:20px;">Start Bootstrap</a></li>
			   <li><a href="#">About</a></li>
			   <li><a href="#">Services</a></li>
			   <li><a href="#">Contact</a></li>
		   </ul>
		   </div>
		 </div>
		 <div id="sector">
		 <h1>Page Heading</h1>
		 </div>
		 <hr>
		 <div id="sector1">
		 <a href="#" style="font-size:30px;margin-left:64px;text-decoration:none">Blog Post Title</a><br>
		 <p><strong>by</strong> <a href="#" style="font-size:20px;text-decoration:none;">Start Bootstrap</a></p>
		 <img src="clock.png" style="height:15px;width:15px;margin-left:45px;margin-top:-2px;"/> <p style="margin-top:-16px;">Posted on August 28, 2013 at 10:00 PM</p>
		 </div>
		 <hr>
<?php  
 $conn=mysqli_connect('localhost','root','','practise');
  $que="Select * from work";
  $run=mysqli_query($conn,$que);
  while($row=mysqli_fetch_array($run))
  {
	  $img=$row['image'];
	  $con=$row['paragraph'];
	  $img1=$row['image1'];
	  $con1=$row['paragraph1'];
	  $img2=$row['image3'];
	  $con2=$row['paragraph3'];
	  $id=$row['id'];
  

?>

  <?php
  }?>  
	  </body>

</html>
 