<?php
$states = Array('AL' => 'Alabama',
		'AK' => 'Alaska',
		'AZ' => 'Arizona',
		'AR' => 'Arkansas',
		'CA' => 'California',
		'CO' => 'Colorado',
		'CT' => 'Connecticut',
		'DE' => 'Delaware',
		'DC' => 'District of Columbia',
		'FL' => 'Florida',
		'GA' => 'Georgia',
		'HI' => 'Hawaii',
		'ID' => 'Idaho',
		'IL' => 'Illinois',
		'IN' => 'Indiana',
		'IA' => 'Iowa',
		'KS' => 'Kansas',
		'KY' => 'Kentucky',
		'LA' => 'Louisiana',
		'ME' => 'Maine',
		'MD' => 'Maryland',
		'MA' => 'Massachusetts',
		'MI' => 'Michigan',
		'MN' => 'Minnesota',
		'MS' => 'Mississippi',
		'MO' => 'Missouri',
		'MT' => 'Montana',
		'NE' => 'Nebraska',
		'NV' => 'Nevada',
		'NH' => 'New Hampshire',
		'NJ' => 'New Jersey',
		'NM' => 'New Mexico',
		'NY' => 'New York',
		'NC' => 'North Carolina',
		'ND' => 'North Dakota',
		'OH' => 'Ohio',
		'OK' => 'Oklahoma',
		'OR' => 'Oregon',
		'PA' => 'Pennsylvania',
		'RI' => 'Rhode Island',
		'SC' => 'South Carolina',
		'SD' => 'South Dakota',
		'TN' => 'Tennessee',
		'TX' => 'Texas',
		'UT' => 'Utah',
		'VT' => 'Vermont',
		'VA' => 'Virginia',
		'WA' => 'Washington',
		'WV' => 'West Virginia',
		'WI' => 'Wisconsin',
		'WY' => 'Wyoming');
		//var_dump($customer);exit;
?>
<?php $title = 'Showing Customer - '. $customer[0]['name'] ?>

<?php ob_start() ?>
<div id="rightnow">
    <h3 class="reallynow">
        <span>Edit Customer</span>
        <a href="customers.php?action=newcontact&custid=<?php echo $customer[0]['id']?>" class="useradd">Add contact</a>
        <a href="customers.php?action=instructions&id=<?php echo $customer[0]['id']?>" class="invoices">Instructions</a>
        <br />
    </h3>
    <p class="youhave">
    <table>
    	<tr>
    	 <td>Foundry Name</td>
    	 <td><input type="text" name="foundryName" class="required" value="<?php echo $customer[0]['name']?>"/></td>
    	 <td>Foundry Abbr.</td>
    	 <td><input type="text" name="foundryAbbr" class="required" value="<?php echo $customer[0]['shopNumber']?>"/></td>
    	</tr>
    	<tr>
    	 <td>Address</td>
    	 <td><input type="text" name="address1" class="required" value="<?php echo $customer[0]['address1']?>"/></td> 
    	 <td>Billing Contact</td>
    	 <td><input type="text" name="billingContact" class="required" value="<?php echo $customer[0]['billingContact']?>"/></td>
    	</tr>
    	<tr>
    	 <td></td>
    	 <td><input type="text" name="address2" value="<?php echo $customer[0]['address2']?>"/></td>
    	 <td>Billing Email</td>
    	 <td><input type="text" name="billingEmail" value="<?php echo $customer[0]['billingEmail']?>"/></td>
    	</tr>
    	<tr>
    	 <td>City</td>
    	 <td><input type="text" name="city" class="required" value="<?php echo $customer[0]['city']?>"/></td>
    	 <td></td>
    	 <td></td>
    	</tr>
    	<tr>
    	 <td>State</td>
    	 <td><select name="state"><?php 
    	 foreach($states as $key => $value){ 
    	  echo "<option value='$key'";
    	   if ($customer[0]['state'] == $key){ echo " SELECTED";}
    	  echo ">$value</option>";}?></select></td>    	 
    	 <td></td>
    	 <td></td>
    	</tr>
    	<tr>
    	 <td>ZIP</td>
    	 <td><input type="text" name="zip" class="required" value="<?php echo $customer[0]['zip']?>"/></td>
    	 <td></td>
    	 <td></td>
    	</tr>
    </table>
    
    <table class="tablesorter"> 
		<thead> 
		<tr> 
		    <th>Contact Name</th> 
		    <th>Email Address</th> 
		    <th>Options</th> 
		</tr> 
		</thead> 
		<tbody> 
		<?php foreach ($contacts as $contact): ?>
		<tr> 
		    <td><a href="customers.php?action=newcontact&id=<?php echo $contact['id']?>&custid=<?php echo $customer[0]['id']?>" title="Edit Contact"><?php echo $contact['name']?></a></td> 
		    <td><?php echo $contact['email']?></td>
		    <td><a href="customers.php?action=removecontact&id=<?php echo $contact['id']?>">Delete Contact</a></td> 
		</tr> 
	    	<?php endforeach; ?>
		</tbody> 
	    </table> 
    
	
    <div class="spacer"></div>
    	
   <div class="spacer"></div>
   <input type="submit" name="submit" value="Save Customer"/>
   </form>
   </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>