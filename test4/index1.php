<?php
$orig = "I'll \"walk\" the <b>dog</b> now";


echo $a = htmlentities($orig);

$b =html_entity_decode('<h1><span style="color: rgb(255, 0, 255); font-family: Lato; font-size: 14px;">
<b style="color: rgb(255, 0, 255); font-family: Lato; font-size: 14px;"><u style="font-family: Lato; font-size: 14px; color: rgb(255, 0, 255);">
    Many hikers choose to break the trail up into two days, setting up camp at the beach of Hanakoa, and then heading to Kalalau the next morning. Camping
permits are required from the Hawaii State Parks
Division office in Lihue. Hiking during the winter months is</u></b></span></h1><h1 style="text-align: center;"><span style="color: rgb(255, 0, 255); 
font-family: Lato; font-size: 14px;"><span style="color: rgb(255, 0, 255); font-family: Lato; font-size: 14px;"><u style="font-family: 
Lato; font-size: 14px; color: rgb(255, 0, 255);"><sup style="font-family: Lato; color: rgb(255, 0, 255); font-size: 14px;">
<b> <span style="font-family: Lato; color: rgb(255, 0, 255); font-size: 14px;">discouraged.</span></b></sup></u></span><br></span></h1>');
echo  $b;
$c =substr($b,0,210);

$c=htmlentities($c);
echo  $c;
?>