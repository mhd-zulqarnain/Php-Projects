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
		 <?php
		 if(isset($_REQUEST['id']))
		 {
			 $ID=$_REQUEST['id'];
			 $conn=mysqli_connect('localhost','root','','practise');
			 $que="Select * from pics where id=$ID";
			 $run=mysqli_query($conn,$que);
			 while($row=mysqli_fetch_array($run))
			 {
				 
				 $img=$row['image'];
				 $con=$row['paragraph'];
			
		 ?>
		 <div class="pic">
		 <img src="<?php echo $img;?>"></img>
		 <p><?php echo $con ?></p>
		 </div>
		 <?php
}
	}
?>
		 <?php
		 if(isset($_REQUEST['id']))
		 {
			 $ID=$_REQUEST['id'];
			 $conn=mysqli_connect('localhost','root','','practise');
			 $que="Select * from pics where id=$ID";
			 $run=mysqli_query($conn,$que);
			 while($row=mysqli_fetch_array($run))
			 {
				 
				 $img1=$row['image1'];
				 $con1=$row['paragraph1']
			
		 ?>
		 <div class="pic">
		 <img src="<?php echo $img1;?>"></img>
		 <p><?php echo $con1 ?></p>
		 </div>
		 <?php
}
	}
?>
<?php
		 if(isset($_REQUEST['id']))
		 {
			 $ID=$_REQUEST['id'];
			 $conn=mysqli_connect('localhost','root','','practise');
			 $que="Select * from pics where id=$ID";
			 $run=mysqli_query($conn,$que);
			 while($row=mysqli_fetch_array($run))
			 {
				 
				 $img2=$row['image3'];
				 $con2=$row['paragraph3']
			
		 ?>
		 <div class="pic">
		 <img src="<?php echo $img2;?>"></img>
		 <p><?php echo $con2 ?></p>
		 </div>
		 <?php
}
	}
?>
	</body>
</html>