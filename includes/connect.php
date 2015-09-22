<?php
$connect=mysql_connect("localhost","root","");
mysql_select_db("blog");
if(!$connect){echo mysql_error();} 
?>

