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
?>
<?php $title = 'New Customer' ?>

<?php ob_start() ?>
<body onload="document.form.customer.focus()">
    <div id="stylized" class="myform">
    <form id="form" name="form" method="post" action="customers.php">
    <h1>New Customer</h1>    	
    <table>
    	<tr>
    	 <td>Foundry Name</td>
    	 <td><input type="text" name="foundryName" class="required" /></td>
    	 <td>Foundry Abbr.</td>
    	 <td><input type="text" name="foundryAbbr" class="required" /></td>
    	</tr>
    	<tr>
    	 <td>Address</td>
    	 <td><input type="text" name="address1" class="required" /></td> 
    	 <td>Billing Contact</td>
    	 <td><input type="text" name="billingContact" class="required" /></td>
    	</tr>
    	<tr>
    	 <td></td>
    	 <td><input type="text" name="address2"/></td>
    	 <td>Billing Email</td>
    	 <td><input type="text" name="billingEmail"/></td>
    	</tr>
    	<tr>
    	 <td>City</td>
    	 <td><input type="text" name="city" class="required"/></td>
    	 <td>Contact</td>
    	 <td><input type="text" name="contact" class="required" /></td>
    	</tr>
    	<tr>
    	 <td>State</td>
    	 <td><select name="state"><?php 
    	 foreach($states as $key => $value){ echo "<option value='$key'>$value</option>";}?></select></td>
    	 
    	 <td>Contact Email</td>
    	 <td><input type="text" name="contactEmail" /></td>
    	</tr>
    	<tr>
    	 <td>ZIP</td>
    	 <td><input type="text" name="zip" class="required"/></td>
    	 <td></td>
    	 <td></td>
    	</tr>
    </table>
    
	
    <div class="spacer"></div>
    	
   <div class="spacer"></div>
   <input type="submit" name="newcustomer" value="Save Customer"/>
   </form>
   </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>