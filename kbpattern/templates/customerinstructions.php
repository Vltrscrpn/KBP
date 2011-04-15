<?php $title = $name .' - Instructions' ?>

<?php ob_start() ?>
<div id="rightnow">
    <h3 class="reallynow">
        <span>Customer Instructions - <?php echo $name?></span><br />
    </h3>
    <p class="youhave">
    <form method=POST action="customers.php" id="form">
    
    <div class="spacer"></div>
    <br/> Instruction <small></small><br/> 
	<input type="text" name="ins"/>
    <input type="hidden" value="0" id="count" />
	
<div id="instructions">
    <ul id="sortable"> 
	
	<?php $i=1;foreach ($instructions as $instruction): ?>
    <div id="instruction<?php echo $i?>">
	<input type="text" name="instruct[]" value="<?php echo htmlentities($instruction['instruction'])?>" size="63">
	<input type="text" id="hrs1" name="hours[]" value="<?php echo $instruction['hours']?>" size="2" onchange="instructionChange()">
	<input type="text" id="mat1" name="material[]" value="<?php echo $instruction['material']?>" size="4" onchange="instructionChange()">
	<a href="#" onclick="removeInstruction(<?php echo $i?>)"><img src="images/icon_remove.png"></a>
	<img src="images/move_icon.jpg"></div>
	<?php $i++; endforeach;?>
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