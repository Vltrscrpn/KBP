<?php

require_once 'model/model.php';

$quote = get_quote_by_id($_GET['id']);
$customerName = get_customer_by_id($_GET['id']);
$contact = get_contact_by_id($_GET['id']);

$instructions = get_quote_instructions_by_id($_GET['id']);

$alerts = get_alerts($_GET['action']);

if ($_GET['action'] === 'preview'){
 $company = get_company_data();
 require 'fpdf/fpdf.php';
 require 'templates/quotepreview.php';
}else{
require 'templates/show.php';
}
?>