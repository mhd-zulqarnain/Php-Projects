<?
session_start();
header("Content-type: image/png");
$_SESSION["custom_captcha"]="";
$im = imagecreate(150, 40);        
//Set background color
imagecolorallocate($im, 239, 239 ,239); 
$grey = imagecolorallocate($im, 128, 128, 128);
//$black = imagecolorallocate($im, 0, 0, 0);        
$brown = imagecolorallocate($im, 102, 0, 0);   
// You can replace font by your own
$font = './arial.ttf';   
$ascii_values= array(50,51,52,53,54,55,56,57,65,66,67,68,69,70,71,72,74,75,76,77,78,80,81,82,83,84,85,86,87,88,89,90);
for($i=0;$i<=5;$i++) {
    $ch= chr($ascii_values[mt_rand (0, 31)]);
    $_SESSION["custom_captcha"].=$ch;
    $angle=rand(-15, 15);
    imagettftext($im, 20, $angle, 20+19*$i, 30, $grey, $font, $ch);    
    // Add shadow to the text    
    imagettftext($im, 20, $angle, 21+19*$i, 31, $brown, $font, $ch);    
}
imagepng($im);
?> 