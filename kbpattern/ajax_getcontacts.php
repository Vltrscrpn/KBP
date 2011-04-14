<?php
// ajax_getcontacts.php - Grabs list of contacts from customer for ajax.
require 'model/config.php';

//initialize variables
$str = "";
$arr = array();

//connect to database
$link = mysql_connect($configDbServer, $configDbUser, $configDbPass);
mysql_select_db($configDb);
     
$cid = mysql_real_escape_string($_GET['cid']);
$result = mysql_query("SELECT id, name, email FROM contacts WHERE customer_id=$cid ORDER BY name ASC");

   while ($row = mysql_fetch_array($result))
   {
   	$str .= "'" .$row['id']. "',";
   	$str .= "'" .$row['name']. "',";
   }

mysql_close($link); //close database connection
   
$str = substr($str,0,(strLen($str)-1)); // Removing the last char , from the string
echo "new Array($str)"; //output to AJAX on form

?>