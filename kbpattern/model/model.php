<?php
// model/model.php
// Logic goes here.  Business logic that is.
require_once 'config.php';

function open_db()
{
   global $configDbServer, $configDbUser, $configDbPass, $configDb;
   $link = mysql_connect($configDbServer, $configDbUser, $configDbPass);
   mysql_select_db($configDb);
   
   return $link;
}

function close_db($link)
{
   mysql_close($link);
}

function create_job($quoteid)
{ 
 $link = open_db();
 
 $quoteid = mysql_real_escape_string($quoteid);
 
 $query = 'SELECT c.shopNumber FROM quotes AS q LEFT JOIN customers AS c ON q.customer_id=c.id WHERE q.id = '.$quoteid;
 $result = mysql_query($query,$link);
 $row = mysql_fetch_row($result);
 $shopNumber = $row[0];
 
 $createquery = "INSERT INTO jobs (`quote_id`,`shopNumber`,`dateReceived`,`status`) ";
 $createquery.= "VALUES ('" .$quoteid. "', '" .$shopNumber. "', '" .date('Y-m-d'). "','OPEN')";
 
 $result = mysql_query($createquery, $link);
 
 $jobid = mysql_insert_id();
  echo $createquery;
 $updatequery = "UPDATE quotes SET job_id = '" .$jobid. "' WHERE id = '" .$quoteid. "';";
 $result = mysql_query($updatequery,$link);

 close_db($link);
 return $jobid;
}

function get_alerts($action)
{
if ($action === 'newquote') {
	 $html = '<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
	 	  <strong>Congrats!</strong> New quote successfully created!</p>';
	 return $html;
	}
}

function set_contact_info($post)
{
   $link = open_db();
   // Insert quote into the general table
   $updatequery = sprintf("UPDATE contacts 
   			SET name='%s',email='%s'
			WHERE id='%s'",
            		mysql_real_escape_string($post['name']),
            		mysql_real_escape_string($post['email']),
            		mysql_real_escape_string($post['id'])
            		);
   $result = mysql_query($updatequery, $link);
   if (!result){ return FALSE; }else{ return TRUE;}
   
   close_db($link);
}


function set_add_contact($post)
{
   $link = open_db();
   // Insert quote into the general table
   $query = sprintf("INSERT INTO contacts 
   			(name,email,customer_id)
   			VALUES ('%s','%s','%s')",
            		mysql_real_escape_string($post['name']),
            		mysql_real_escape_string($post['email']),
            		mysql_real_escape_string($post['customerid'])
            		);
   $result = mysql_query($query, $link);
   if (!result){ return FALSE; }else{ return TRUE;}
   
   close_db($link);
}

function remove_contact_id($id)
{
   $link = open_db();
   // Insert quote into the general table
   $query = sprintf("DELETE FROM contacts 
   			WHERE id='%s'",
            		mysql_real_escape_string($id)
            		);
   $result = mysql_query($query, $link);
   if (!result){ return FALSE; }else{ return TRUE;}
   
   close_db($link);
}

function set_new_quote($post)
{
   $link = open_db();
   // Insert quote into the general table
   $quotequery = sprintf("INSERT INTO quotes (customer_id,contact_id,dateIssued,patternNumber,patternOwner,shopRate,
   					      margin,totalMaterial,totalHours,totalPrice,estimatedDelivery) 
   			  VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
            		mysql_real_escape_string($post['customer']),
            		mysql_real_escape_string($post['contact']),
            		mysql_real_escape_string($post['dateIssued']),
            		mysql_real_escape_string($post['patternNumber']),
            		mysql_real_escape_string($post['patternOwner']),
            		mysql_real_escape_string($post['shopRate']),
            		mysql_real_escape_string($post['margin']),
            		mysql_real_escape_string($post['totalMaterial']),
            		mysql_real_escape_string($post['totalHours']),
            		mysql_real_escape_string($post['totalPrice']),
            		mysql_real_escape_string($post['estDelivery'])
            		);
   $result = mysql_query($quotequery, $link);

   $quoteid = mysql_insert_id(); //return id for newly created quote
  
   //insert quote into details database (instructions and such)
   $quotequery = "INSERT INTO quoteDetails (quote_id,instruction,hours,material,lineItemOrder) VALUES ";
   
   for ($i = 0; $i < count($post['instruct']); $i++) {
    $quotequery .= " ('" .$quoteid. "','" .mysql_real_escape_string($post['instruct'][$i]). "','" .mysql_real_escape_string($post['hours'][$i]). 
    "','" .mysql_real_escape_string($post['material'][$i]). "','" .$i. "'),";
   }
   $quotequery = substr($quotequery, 0, -1);
   $result = mysql_query($quotequery);
   
   return $quoteid;
   
   close_db($link);
}

function get_company_data()
{
   $link = open_db();
   
   $result = mysql_query('SELECT * FROM company', $link);
   $company = array();
   while ($row = mysql_fetch_assoc($result))
   {
   	$company['address'] = $row['address'];   	
   	$company['citystzip'] = $row['citystzip'];
   	$company['phone'] = $row['phone'];   	
   	$company['fax'] = $row['fax'];
   	$company['shoprate'] = $row['shoprate'];   	
   	$company['margin'] = $row['margin'];
   }
   
   close_db($link);
   
   return $company;
}

function get_instructions_as_options()
{
   $link = open_db();
   
   $result = mysql_query('SELECT * FROM instructions ORDER BY instruction ASC');
   
   $instructions = "<option value='BLANK'>--BLANK INSTRUCTION--</option\r\n";
   while ($row = mysql_fetch_array($result))
   {
   	$instructions .= "<option value='".$row['id']."'>".$row['instruction']."</option>\r\n";
   }
   close_db($link);
   
   return $instructions;
}

function get_customers_as_options()
{
   $link = open_db();
   
   $result = mysql_query('SELECT id, name FROM customers WHERE active = 1 ORDER BY name ASC');

   while ($row = mysql_fetch_array($result))
   {
   	$customers .= "<option value='".$row['id']."'>".$row['name']."</option>\r\n";
   }
   close_db($link);
   
   return $customers;
}

function get_all_quotes()
{
   $link = open_db();
   
   $result = mysql_query('SELECT q.id, q.customer_id, q.contact_id, q.dateIssued, q.patternNumber, cc.name AS `contact`, c.name
   			  FROM quotes AS q 
   			  LEFT JOIN customers AS c ON q.customer_id = c.id
   			  LEFT JOIN contacts AS cc on q.contact_id = cc.id', $link);
   $quotes = array();
   while ($row = mysql_fetch_assoc($result))
   {
   	$quotes[] = $row;
   }
   
   close_db($link);
   
   return $quotes;
}


function get_all_customers()
{
   $link = open_db();
   
   $result = mysql_query('SELECT *
   			  FROM customers', $link);
   $customers = array();
   while ($row = mysql_fetch_assoc($result))
   {
   	$customers[] = $row;
   }
   
   close_db($link);
   
   return $customers;
}


function get_customer_info_by_id($id)
{
   $link = open_db();
   
   $result = mysql_query('SELECT * FROM customers WHERE id ='.$id, $link);
   $customer = array();
   while ($row = mysql_fetch_assoc($result))
   {
   	$customer[] = $row;
   }
   
   close_db($link);
   
   return $customer;
}

//returns customer name
function get_customer_by_id($id)
{
   $link = open_db();
   
   $id = mysql_real_escape_string($id);
   $query = 'SELECT c.name FROM quotes AS q LEFT JOIN customers AS c ON q.customer_id=c.id WHERE q.id = '.$id;
   $result = mysql_query($query);
   $row = mysql_fetch_row($result);
   
   close_db($link);
   
   return $row[0];
}


//returns contact info by customer
function get_contacts_by_customer($id)
{
   $link = open_db();
   
   $id = mysql_real_escape_string($id);
   $query = 'SELECT * FROM contacts WHERE customer_id = '.$id;
   $result = mysql_query($query);
   $contacts = array();
   while ($row = mysql_fetch_assoc($result))
   {
   	$contacts[] = $row;
   }
   
   close_db($link);
   
   return $contacts;
}


//returns contact info by contact ID
function get_contact_info_id($id)
{
   $link = open_db();
   
   $id = mysql_real_escape_string($id);
   $query = 'SELECT * FROM contacts WHERE id = '.$id;
   $result = mysql_query($query);
   $contacts = array();
   while ($row = mysql_fetch_assoc($result))
   {
   	$contacts[] = $row;
   }
   
   close_db($link);
   
   return $contacts;
}
//returns contact name
function get_contact_by_id($id)
{
   $link = open_db();
   
   $id = mysql_real_escape_string($id);
   $query = 'SELECT c.name,c.email FROM quotes AS q LEFT JOIN contacts AS c ON q.contact_id = c.id WHERE q.id = '.$id;
   $result = mysql_query($query);
   $row = mysql_fetch_row($result);
   
   close_db($link);
   
   return $row;
}

function get_quote_for_copy($id)
{
  $link = open_db();
  $id = mysql_real_escape_string($id);
  $copy['quote'] = get_quote_by_id($id);
  $copy['instruct'] = get_quote_instructions_by_id($id);
  //var_dump($copy);
  return $copy;
}
//returns quoted instructions
function get_quote_instructions_by_id($id)
{
   $link = open_db();
   
   $id = mysql_real_escape_string($id);
   $query = 'SELECT * FROM quoteDetails WHERE quote_id = '.$id.' ORDER BY lineItemOrder ASC';
   $result = mysql_query($query);
   while ($row = mysql_fetch_assoc($result))
   {
   	$instructions[] = $row;
   }
   close_db($link);
   
   return $instructions;
}


function get_job_by_id($id)
{
   $link = open_db();
   
   $id = mysql_real_escape_string($id);
   $query = 'SELECT * FROM jobs WHERE id = '.$id;
   $result = mysql_query($query);
   $row = mysql_fetch_assoc($result);
   
   close_db($link);
   
   return $row;
}

function get_quote_by_id($id)
{
   $link = open_db();
   
   $id = mysql_real_escape_string($id);
   $query = 'SELECT * FROM quotes WHERE id = '.$id;
   $result = mysql_query($query);
   $row = mysql_fetch_assoc($result);
   
   close_db($link);
   
   return $row;
}

?>