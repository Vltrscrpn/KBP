<?php $title = 'Create A New Quote' ?>

<?php ob_start() ?>
<body onload="document.form.customer.focus()">
    <div id="stylized" class="myform">
    <form id="form" name="form" method="post" action="newquote.php">
    <h1>Quote#: <i><small>Generated on save...</small></i></h1>
    	
    <table>
    	<tr>
    	 <td>Foundry</td>
    	 <td><select id="combobox2" name="customer" onchange="AjaxFunction(this.value)";><option value="" tabindex=1>Select one...</option><?php echo $customerListAsOptions ?></select></td>
    	 <td>Date Issued</td>
    	 <td><input type="text" name="dateIssued" value="<?php echo date('Y-m-d') ?>" tabindex=100/></td>
    	</tr>
    	<tr>
    	 <td>Customer Contact</td>
    	 <td><select id="combobox3" name="contact" >
    	 <option value="" tabindex=2>Select one...</option>
    	 </select></td>
    	 <td>Pattern Number</td>
    	 <td><input type="text" name="patternNumber" value="<?php echo $copy['quote']['patternNumber']?>"  tabindex=4/></td>
    	</tr>
    	<tr>
    	 <td>Est. Delivery</td>
    	 <td><input type="text" name="estDelivery" value="<?php echo $copy['quote']['estimatedDelivery']?>"  tabindex=3/></td>
    	 <td>Pattern Owner</td>
    	 <td><input type="text" name="patternOwner" value="<?php echo $copy['quote']['patternOwner']?>"  tabindex=5/></td>
    	</tr>
    </table>
    
    <div class="spacer"></div>
    <br/> Instruction <small>(click to add)</small><br/> 
    <input type="hidden" id="count" value="<?php echo count($copy['instruct']); ?>"/>

<div class="ui-widget">
    <select name="drop1" id="Select1" multiple="multiple" onchange="addInstruction2(this.options[this.selectedIndex].value)" size=8>
    <?php echo $instructions ?>
</select>
    <!--<input type="text" autocomplete=off id="instruction" name="instruction"/>
    <input type="text" id="hours" size=4/>
    <input type="text" id="material" size=6/>
    <button id="submitbutton" onclick="addInstruction();return false;">Add Instruction</button></div>-->
    <br/>
    <table>
     <th width=400px>Instructions</th>
     <th>Hrs</th>
     <th>Material</th>
     <th>Options</th>
    </table>
    <div id="instructions">
    <ul id="sortable"> 
    
    <?php for($i=0;$i < count($copy['instruct']);$i++){?>
    <div id="instruction<?php echo ($i + 1);?>"><input type="text" name="instruct[]" value="<?php echo htmlentities($copy['instruct'][$i]['instruction'])?>" size="63"><input type="text" name="hours[]" value="<?php echo $copy['instruct'][$i]['hours']?>" size="2"><input type="text" name="material[]" value="<?php echo $copy['instruct'][$i]['material']?>" size="4">
      <a href="#" onclick="removeInstruction(instruction<?php echo ($i + 1);?>)">
      <img src="images/icon_remove.png"></a><img src="images/move_icon.jpg">
    </div>
    <?php } ?>
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
    	 <td><input type="text" id="totalhrs" name="totalHours" value="<?php echo $copy['quote']['totalHours']?>" />
    	 <input type="hidden" id="shoprate" name="shopRate" value="<?php echo $company['shoprate']?>" /></td>
    	 <td><input type="text" id="totalmat" name="totalMaterial" value="<?php echo $copy['quote']['totalMaterial']?>" />
    	 <input type="hidden" id="margin" name="margin" value="<?php echo $company['margin']?>" /></td>
    	 <td><input type="text" id="totalprice" name="totalPrice" value="<?php echo $copy['quote']['totalPrice']?>" /></td>
    	</tr>
    </table>
    	
   <div class="spacer"></div>
   <input type="submit" name="submit" value="Save Quote"/>
   <button id="updatebutton" onclick="updatePricing();return false;">Update Pricing</button>
   </form>
   </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>