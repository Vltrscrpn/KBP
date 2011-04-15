<?php

require_once 'model/model.php';

if (isset($_POST['postCompany'])){
 set_company_data($_POST);
}elseif (isset($_POST['saveemployee'])){
 set_employee_data($_POST);
 header("Location: settings.php?action=employees");
}elseif (isset($_POST['editemployee'])){
 set_employee_detail($_POST);
 header("Location: settings.php?action=employees");
}

if ($_GET['action'] === 'company'){
 $company = get_company_data();
 require 'templates/companysettings.php';
}elseif($_GET['action'] === 'employees'){
 $employees = get_employee_data();
 require 'templates/employeesettings.php';
}elseif($_GET['action'] === 'editemployee'){
 $employee = get_employee_details($_GET['id']);
 require 'templates/editemployee.php';
}else{
 $company = get_company_data();
 require 'templates/companysettings.php';
}



?>