<?php

require_once 'model/model.php';



if ($_GET['action'] === 'show'){
  $quote = get_quote_by_id($_GET['id']);
  $customerName = get_customer_by_id($_GET['id']);
  $contact = get_contact_by_id($_GET['id']);
  
  $instructions = get_quote_instructions_by_id($_GET['id']);
  
  require 'templates/show.php';
  //$alerts = get_alerts($_GET['action']);
}
elseif ($_GET['action'] === 'preview'){
  $quote = get_quote_by_id($_GET['id']);
  $customerName = get_customer_by_id($_GET['id']);
  $contact = get_contact_by_id($_GET['id']);

  $instructions = get_quote_instructions_by_id($_GET['id']);
  
   $company = get_company_data();
   require 'fpdf/fpdf.php';
   require 'templates/quotepreview.php';
}
elseif ($_GET['action'] === 'list'){
   $quotes = get_all_quotes();
   require 'templates/list.php';
}else{
   $quotes = get_all_quotes();
   require 'templates/list.php';
}
?>