<?php

$return_arr = array();

require_once 'model/config.php';

$conn = mysql_connect($configDbServer, $configDbUser, $configDbPass);
mysql_select_db($configDb);

/* If connection to database, run sql statement. */
if ($conn)
{
	$fetch = mysql_query("SELECT * FROM instructions WHERE instruction LIKE '%" . $_GET['term'] . "%'"); 

	/* Retrieve and store in array the results of the query.*/

	while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
		$row_array['id'] = $row['id'];
		$row_array['value'] = $row['instruction'];
		$row_array['hours'] = $row['hours'];
		$row_array['material'] = $row['material'];

        array_push($return_arr,$row_array);
    }

}

/* Free connection resources. */
mysql_close($conn);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

?>