<?php 
$title = 'Company Settings';
 ?>

<?php ob_start() ?>


<div id="rightnow">
    <h3 class="reallynow">
        <span>Company Settings</span><br />
    </h3>
    
    <p class="youhave">
    <form id="form" name="form" method="post" action="settings.php">
   
    <table>
    	<tr>
    	 <td>Company Address</td>
    	 <td><input type="text" name="address" value="<?php echo $company['address']?>"/></td>
    	</tr>
    	<tr>
    	 <td>Company City, State ZIP</td>
    	 <td><input type="text" name="citystzip" value="<?php echo $company['citystzip'] ?>"/></td>
    	</tr>
    	<tr>
    	 <td>Company Phone</td>
    	 <td><input type="text" name="phone" value="<?php echo $company['phone']?>"/></td>
    	</tr>
    	<tr>
    	 <td>Company Fax</td>
    	 <td><input type="text" name="fax" value="<?php echo $company['fax'] ?>"/></td>
    	</tr>
    	<tr>
    	 <td>Shop Rate</td>
    	 <td><input type="text" name="shoprate" value="<?php echo $company['shoprate']?>"/></td>
    	</tr>
    	<tr>
    	 <td>Margin</td>
    	 <td><input type="text" name="margin" value="<?php echo $company['margin'] ?>"/></td>
    	</tr>
    </table>
    <br/>
   <input type="submit" name="postCompany" value="Save Settings"/>
   </form>
   </p>
</div>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>