<?php
header("Comtent-Type:text/xml");

echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

echo '<response>';
$food   =$_GET['food'];
$foodArray=array('tuna','biryani','beef','chiken');

if(in_array($food,$foodArray)){
    echo 'we do have'.$food.'!';
}
else if($food=="")
    echo 'Enter a food ';
else
    echo"sory we don't sell".$food;
echo '</response>';

?>