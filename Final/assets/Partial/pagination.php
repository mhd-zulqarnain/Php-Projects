<div>
<?php
$a=ceil($sql1/4);
for ($j=1;$j<=$a;$j++)
{
    ?>         <ul class="pagination pagination-lg">
                   <li><a href="<?php echo $link?>?&page=<?php echo $j?>">$j</a></li>
                </ul><?php
}
?>
</div>
    