<?php $title = 'Showing Employee' ?>

<?php ob_start() ?>
<div id="rightnow">
    <h3 class="reallynow">
        <span>Employee List</span>
        <br />
    </h3>
    <form id="form" name="form" method="post" action="settings.php">
    <p class="youhave">
    <table>
    	<tr>
    	 <td>Employee Name</td>
    	 <td><input type="hidden" name="id" value="<?php echo $employee[0]['id'] ?>" />
		 <input type="text" name="employeeName" class="required" value= "<?php echo $employee[0]['name'] ?>"/>
    	<tr>
    	 <td>Email Address</td>
    	 <td><input type="text" name="emailAddress" class="required" value= "<?php echo $employee[0]['email'] ?>"/></td> 
    	</tr>
    	<tr>
    	 <td>Password</td>
    	 <td><input type="text" name="password" class="required" value= "<?php echo $employee[0]['password'] ?>"/></td>
    	</tr>
    </table>
    
	<input type="submit" name="editemployee" value="Save Employee"/>
	   
	
    <div class="spacer"></div>
    	
   <div class="spacer"></div>
   
   </form>
   </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>