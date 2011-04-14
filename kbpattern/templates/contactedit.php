<?php
		//var_dump($customer);exit;
?>
<?php $title = 'Editing Contact'?>

<?php ob_start() ?>
<div id="rightnow">
    <h3 class="reallynow">
        <span>Edit Contact</span>
        <a href="customers.php?action=newcontact&custid=<?php echo $customer[0]['id']?>" class="useradd">Add contact</a>
        <br />
    </h3>
    <p class="youhave">
    <form method=POST action="customers.php" id="form">
    <table>
    	<tr>
    	 <td>Contact Name</td>
    	 <td><input type="hidden" name="customerid" class="required" value="<?php echo $contact[0]['customer_id']?>"/>
    	 <input type="hidden" name="id" value="<?php echo $contact[0]['id']?>"/>
    	 <input type="text" name="name" class="required" value="<?php echo $contact[0]['name']?>"/></td>
    	 <td>Contact Email</td>
    	 <td><input type="text" name="email" class="required" value="<?php echo $contact[0]['email']?>"/></td>
    	</tr>
    </table>
    
    <div class="spacer"></div>
    	
   <div class="spacer"></div>
   <input type="submit" name="editcontact" value="Save Contact"/>
   </form>
   </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>