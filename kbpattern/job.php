<?php

require_once 'model/model.php';

if (($_GET['action'] === 'create') && isset($_GET['quoteid'])){
 $newjob = create_job($_GET['quoteid']);
 header("Location: job.php?id=$newjob");
}

$job = get_job_by_id($_GET['id']);
$quote = get_quote_by_id($job['quote_id']);
$customerName = get_customer_by_id($job['quote_id']);
$contact = get_contact_by_id($job['quote_id']);
$instructions = get_quote_instructions_by_id($job['quote_id']);

require 'templates/showjob.php';

?>