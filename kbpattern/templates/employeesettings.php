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
    	 <td><input type="text" name="employeeName" class="required"/>
    	<tr>
    	 <td>Email Address</td>
    	 <td><input type="text" name="emailAddress" class="required"/></td> 
    	</tr>
    	<tr>
    	 <td>Password</td>
    	 <td><input type="text" name="password" class="required"/></td>
    	</tr>
    </table>
    
	<input type="submit" name="saveemployee" value="Save Employee"/>
	
    <table class="tablesorter"> 
		<thead> 
		<tr> 
		    <th>Employee Name</th> 
		    <th>Email Address</th> 
		</tr> 
		</thead> 
		<tbody> 
		<?php foreach ($employees as $employee): ?>
		<tr> 
		    <td><a href="settings.php?action=editemployee&id=<?php echo $employee['id']?>" title="Edit Employee"><?php echo $employee['name']?></a></td> 
		    <td><?php echo $employee['email']?></td>
		</tr> 
	    	<?php endforeach; ?>
		</tbody> 
	    </table> 
    
	
    <div class="spacer"></div>
    	
   <div class="spacer"></div>
   
   </form>
   </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>