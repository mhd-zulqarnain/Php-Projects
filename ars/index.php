<?php
/* watch the video for detailed instructions */

$to = "03485562470@mobilinkgsm.com";
$from = "xlualy@yourdomain.com";
$message = "This is a text message\nNew line...";
$headers = "From: $from\n";
mail($to, '', $message, $headers);
echo '<script>alert("$from")</script>';
?>