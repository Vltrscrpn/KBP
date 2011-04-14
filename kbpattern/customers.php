<?php

require_once 'model/model.php';

if (isset($_POST['editcontact'])){
  if ($posted = set_contact_info($_POST)){    
   header("Location: customers.php?action=show&id=".$_POST['customerid']);
  }else{die("FATAL: Error during post.");}
}elseif (isset($_POST['addcontact'])){
  if ($posted = set_add_contact($_POST)){
   header("Location: customers.php?action=show&id=".$_POST['customerid']);
  }else{ die("FATAL: Error during post.");}
}
if (($_GET['action'] === 'removecontact') && isset($_GET['id'])){
  remove_contact_id($_GET['id']);
}

if ($_GET['action'] === 'show'){
  $customer = get_customer_info_by_id($_GET['id']);
  $contacts = get_contacts_by_customer($_GET['id']);
  
  require 'templates/customershow.php';
  //$alerts = get_alerts($_GET['action']);
}
elseif ($_GET['action'] === 'new'){
   require 'templates/customernew.php';
}
elseif (($_GET['action'] === 'newcontact') && isset($_GET['id'])){
   $contact = get_contact_info_id($_GET['id']);
   require 'templates/contactedit.php';
}
elseif (($_GET['action'] === 'newcontact') && isset($_GET['custid'])){
   $customerid = $_GET['custid'];
   require 'templates/contactadd.php';
}
elseif ($_GET['action'] === 'list'){
   $customers = get_all_customers();
   require 'templates/customerlist.php';
}else{
   $customers = get_all_customers();
   require 'templates/customerlist.php';
}
?>