<?php
		//var_dump($customer);exit;
?>
<?php $title = 'Add A Contact'?>

<?php ob_start() ?>
<div id="rightnow">
    <h3 class="reallynow">
        <span>Add A Contact - <?php echo $customer?></span><br />
    </h3>
    <p class="youhave">
    <form method=POST action="customers.php" id="form">
    <table>
    	<tr>
    	 <td>Contact Name</td>
    	 <td><input type="hidden" name="customerid" class="required" value="<?php echo $customerid?>"/>
    	 <input type="text" name="name" class="required" value="<?php echo $contact[0]['name']?>"/></td>
    	 <td>Contact Email</td>
    	 <td><input type="text" name="email" class="required" value="<?php echo $contact[0]['email']?>"/></td>
    	</tr>
    </table>
    
    <div class="spacer"></div>
    	
   <div class="spacer"></div>
   <input type="submit" name="addcontact" value="Add Contact"/>
   </form>
   </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>