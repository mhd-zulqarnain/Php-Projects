<?php
  $db_host='localhost';  
  $db_name='dbname';  
  $db_user='dbuser';  
  $db_passwd='dbpassword';

  mysql_connect($db_host, $db_user, $db_passwd)
    or die('Could not connect: ' . mysql_error());

  mysql_select_db($db_name) or die('Could not select database');

  function db($sql)
  {
    $result = mysql_query($sql) or die('Query failed: ' . mysql_error());
    return $result;
  }
?>