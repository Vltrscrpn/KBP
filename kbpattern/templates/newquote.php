<?php $title = 'Create A New Quote' ?>

<?php ob_start() ?>
<body onload="document.form.customer.focus()">
    <div id="stylized" class="myform">
    <form id="form" name="form" method="post" action="newquote.php">
    <h1>Quote#: Generated on save...</h1>
    	
    <table>
    	<tr>
    	 <td>Foundry</td>
    	 <td><select id="combobox2" name="customer" class="required" onchange="AjaxFunction(this.value)";><option value="" tabindex=1>Select one...</option><?php echo $customerListAsOptions ?></select></td>
    	 <td>Date Issued</td>
    	 <td><input type="text" name="dateIssued" value="<?php echo date('Y-m-d') ?>" tabindex=100 class="required"/></td>
    	</tr>
    	<tr>
    	 <td>Customer Contact</td>
    	 <td><select id="combobox3" name="contact" class="required">
    	 <option value="" tabindex=2>Select one...</option>
    	 </select></td>
    	 <td>Pattern Number</td>
    	 <td><input type="text" name="patternNumber" value=""  tabindex=4/></td>
    	</tr>
    	<tr>
    	 <td>Est. Delivery</td>
    	 <td><input type="text" name="estDelivery" value=""  tabindex=3/></td>
    	 <td>Pattern Owner</td>
    	 <td><input type="text" name="patternOwner" value=""  tabindex=5/></td>
    	</tr>
    </table>
    
    <div class="spacer"></div>
    <br/> Instruction <small>(click to add)</small><br/> 
    <input type="hidden" value="0" id="count" />

<div class="ui-widget">
    <select name="drop1" id="Select1" multiple="multiple" onchange="addInstruction2(this.options[this.selectedIndex].value)" size=8>
    <?php echo $instructions ?>
</select>
    <br/>
    <table>
     <th width=400px>Instructions</th>
     <th>Hrs</th>
     <th>Material</th>
     <th>Options</th>
    </table>
    <div id="instructions">
    <ul id="sortable"> 
    </ul>
    </div>
	
    <div class="spacer"></div>
    
    	    <br/>    <br/>    <br/>
    <table>
    	<tr>
    	 <td>Total Hours</td>
    	 <td>Total Material</td>
    	 <td>Total Price</td>
    	</tr>
    	<tr>
    	 <td><input type="text" id="totalhrs" name="totalHours" value="0" />
    	 <input type="hidden" id="shoprate" name="shopRate" value="<?php echo $company['shoprate']?>" /></td>
    	 <td><input type="text" id="totalmat" name="totalMaterial" value="0" />
    	 <input type="hidden" id="margin" name="margin" value="<?php echo $company['margin']?>" /></td>
    	 <td><input type="text" id="totalprice" name="totalPrice" value="" /></td>
    	</tr>
    </table>
    	
   <div class="spacer"></div>
   <input type="submit" name="submit" value="Save Quote"/>
   <button id="updatebutton" onclick="updatePricing();return false;">Update Pricing</button>
   </form>
   </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>