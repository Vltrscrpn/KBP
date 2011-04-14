<?php

require_once 'model/model.php';

if (isset($_POST['postCompany'])){
 set_company_data($_POST);
}

if ($_GET['action'] === 'company'){
 $company = get_company_data();
}

require 'templates/companysettings.php';

?>