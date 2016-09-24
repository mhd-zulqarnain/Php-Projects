<!DOCTYPE html>
<html>
	<head>
    	<title>Payment Options</title>
     </head>
 
 <body>
 <?php 
 include("includes/db.php");
 
 ?>

<div align="center" style="padding:20px;">

<h2>Payment Options for you</h2>

<?php 

//getting the real customer 

$ip = getRealIpAddr();

$get_customer = "select * from customers where customer_ip='$ip'";

$run_customer = mysqli_query($con, $get_customer); 

$customer = mysqli_fetch_array($run_customer);

$customer_id = $customer['customer_id'];


//Getting products price & number of items 

$ip_add = getRealIpAddr();
		 
		 $total = 0;
	
	$sel_price = "select * from cart where ip_add='$ip_add'";
	
	$run_price = mysqli_query($db, $sel_price); 
	
	$status = 'Pending';
	
	$invoice_no = mt_rand();
	
	$i= 0;
	
	$count_pro = mysqli_num_rows($run_price);
	
	while ($record=mysqli_fetch_array($run_price)){
		
		$pro_id = $record['p_id'];
		
		$pro_price = "select * from products where product_id='$pro_id'";
		
		$run_pro_price = mysqli_query($db,$pro_price); 
		
		while($p_price=mysqli_fetch_array($run_pro_price)){
			
			$product_name = $p_price['product_title'];
			
			$product_price = array($p_price['product_price']);
			
			$values = array_sum($product_price);
			
			$total +=$values;
			
			$i++;
			
			}
		}
//Getting Quaintity from the cart 

$get_cart = "select * from cart";

$run_cart = mysqli_query($con, $get_cart); 

$get_qty = mysqli_fetch_array($run_cart);

$qty = $get_qty['qty'];

if($qty==0){
	
	$qty=1;
	
	$sub_total = $total;
	}
	else {
		
		$qty=$qty;
		
		$sub_total = $total*$qty;
		
		}

?>


<b>Pay with Paypal</b>&nbsp; 

<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

<!-- Identify your business so that you can collect the payments. -->
<input type="hidden" name="business" value="businesstest@academy.com">

<!-- Specify a Buy Now button. -->
<input type="hidden" name="cmd" value="_xclick">

<!-- Specify details about the item that buyers will purchase. -->
<input type="hidden" name="item_name" value="<?php echo $product_name; ?>">
<input type="hidden" name="amount" value="<?php echo $sub_total; ?>">
<input type="hidden" name="currency_code" value="USD">

<!-- Return and Cancel_return URLs--> 

<input type="hidden" name="return" value="http://www.onlinetuting.com/myshop/paypal_success.php" /> 
<input type="hidden" name="cancel_return" value="http://www.onlinetuting.com/myshop/paypal_cancel.php" /> 

<!-- Display the payment button. -->
<input type="image" name="submit" border="0"
src="http://www.kingmantennisleague.com/communities/1/004/012/541/111//images/4607414471.gif"
alt="PayPal - The safer, easier way to pay online" width="150" height="80">
<img alt="" border="0" width="1" height="1"
src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>





</a> <b>Or <a href="order.php?c_id=<?php echo $customer_id; ?>">Pay Offline</a></b><br><br><br>

<b> If you selected "Pay Offline" option then please check your email or account to find the Invoice No for your order</b>




</div>
</body>
</html>