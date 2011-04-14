<?php
// newquote.php

require_once 'model/model.php';

if (isset($_POST['submit'])){
 $newquote = set_new_quote($_POST);
 //var_dump($_POST);
 header("Location: show.php?action=newquote&id=$newquote");
}


$customerListAsOptions = get_customers_as_options();
$instructions = get_instructions_as_options();
$company = get_company_data();

if (($_GET['action'] === 'copy') && isset($_GET['id'])){
 $copy = get_quote_for_copy($_GET['id']);
 require 'templates/copyquote.php';
 exit;
}elseif (($_GET['action'] === 'edit') && isset($_GET['id'])){
 $edit = get_quote_for_copy($_GET['id']);
 var_dump($edit);
 require 'templates/editquote.php';
 exit;
}

require 'templates/newquote.php';
?>