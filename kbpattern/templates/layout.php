<?php /* templates/layout.php */ 

$panel_quotes 	= '<ul><li><a href="newquote.php" class="pagenew">New quote</a></li>
		   <li><a href="quotes.php?action=list" class="report">List quotes</a></li></ul>';
$panel_jobs     = '<ul><li><a href="jobs.php?action=list" class="manage_page">List jobs</a></li>  
	           <li><a href="jobs.php?action=backlog" class="cog_go">Show backlog</a></li>  
	           <li><a href="jobs.php?action=packing" class="cog_edit">Create packing list</a></li></ul>';
$panel_invoices = '<ul><li><a href="invoices.php?action=list" class="chart_line">List invoices</a></li></ul>';
$panel_timecards= '<ul><li><a href="timecards.php?action=list" class="clock_edit">List timecards</a></li>
                   <li><a href="timecards.php?action=new" class="clock_add">New timecard</a></li></ul>';
$panel_customers ='<ul><li><a href="customers.php?action=list" class="group_go">List customers</a></li>
                   <li><a href="customers.php?action=new" class="groupadd">New customer</a></li></ul>';
$panel_settings = '<ul>
		   <li><a href="settings.php?action=employees" class="useradd">Employees</a></li>
                   <li><a href="settings.php?action=company" class="building_edit">Company setup</a></ul>';
                  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title ?></title> 

<link rel="stylesheet" type="text/css" href="css/theme1.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->

<?php include ('javascript.php'); ?>
</head>

<body>
	<div id="container">
    	<div id="header">
        	<h2>KB Pattern Works LLC</h2>
    <div id="topmenu">
            <ul>
                    <li<?php if ($_SERVER['SCRIPT_NAME'] == '/kbpattern/index.php'){?> class="current" <?php }?>><a href="index.php">Dashboard</a></li>
                    <li<?php 
                    if ($_SERVER['SCRIPT_NAME'] == '/kbpattern/quotes.php' || $_SERVER['SCRIPT_NAME'] == '/kbpattern/newquote.php')
                    {?> class="current" <?php }?>><a href="quotes.php">Quotes</a></li>
                    <li<?php if ($_SERVER['SCRIPT_NAME'] == '/kbpattern/jobs.php'){?> class="current" <?php }?>><a href="#">Jobs</a></li>
                    <li<?php if ($_SERVER['SCRIPT_NAME'] == '/kbpattern/invoices.php'){?> class="current" <?php }?>><a href="#">Invoices</a></li>
                    <li<?php if ($_SERVER['SCRIPT_NAME'] == '/kbpattern/timecards.php'){?> class="current" <?php }?>><a href="#">Timecards</a></li>
                    <li<?php if ($_SERVER['SCRIPT_NAME'] == '/kbpattern/customers.php'){?> class="current" <?php }?>><a href="customers.php">Customers</a></li>
                    <li<?php if ($_SERVER['SCRIPT_NAME'] == '/kbpattern/settings.php'){?> class="current" <?php }?>><a href="settings.php?action=instructions">Settings</a></li>
            </ul>
    </div>
      </div>
        <div id="top-panel">
          <div id="panel">
            <?php 
            switch($_SERVER['SCRIPT_NAME']){ 
            	case '/kbpattern/quotes.php':
            		echo $panel_quotes;
            		break;
            	case '/kbpattern/newquote.php':
            		echo $panel_quotes;
            		break;
            	case '/kbpattern/jobs.php':
            		echo $panel_jobs;
            		break;
            	case '/kbpattern/customers.php':
            		echo $panel_customers;
            		break;
            	case '/kbpattern/invoices.php':
            		echo $panel_invoices;
            		break;
            	case '/kbpattern/timecards.php':
            		echo $panel_timecards;
            		break;
            	case '/kbpattern/settings.php':
            		echo $panel_settings;
            		break;
            }            
            ?> 
         </div>
         </div>
        <div id="wrapper">
         <div id="content">
          <?php echo $content ?> 
         </div>
        </div>
            
            
            <div id="sidebar">
  		<ul>
                 <li><h3><a href="#" class="house">Dashboard</a></h3>
                     
                 </li>
                 <li><h3><a href="quotes.php" class="folder_table">Quotes</a></h3>
          	     <ul><?php echo $panel_quotes;?></ul>
                 </li>
                 <li><h3><a href="#" class="manage">Jobs</a></h3>
          	     <ul><?php echo $panel_jobs;?></ul>
                 </li>
                 <li><h3><a href="#" class="promotions">Invoices</a></h3>
          	     <ul><?php echo $panel_invoices;?></ul>
                 </li>
                 <li><h3><a href="#" class="clock">Timecards</a></h3>
          	     <ul><?php echo $panel_timecards;?></ul>
                 </li>
                 <li><h3><a href="customers.php" class="group">Customers</a></h3>
          	     <ul><?php echo $panel_customers;?></ul>
                 </li>
                 <li><h3><a href="#" class="modules_manage">Settings</a></h3>
          	     <ul><?php echo $panel_settings;?></ul>
                 </li>
		</ul>       
          </div>
      
     
<?php include 'layoutFooter.php';?>