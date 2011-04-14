<?php $title = 'Viewing ' .$customerName. ' Job # '. $job['shopNumber'].'-'.$job['id'] ?>

<?php ob_start() ?>

    <div id="stylized" class="myform">
    <form id="form" name="form" method="post" action="#">
    <h1><?php echo 'Job#: '. $job['shopNumber'].'-'.$job['id']; ?></h1>
    <?php echo $alerts ?>
    	<a href="#">Edit</a>
    	<a href="show.php?id=<?php echo $quote['id']; ?>&action=preview">Preview</a>
    	<a href="javascript:window.alert('<?php echo $contact[0] ?> from <?php echo $customerName ?> would have been emailed successfully.\n However, this is a test.');" class="confirm" title="Are you sure you want to email the quote?">Email Quote</a>
    <p><strong><a href="show.php?id=<?php echo $job['quote_id']?>">Quote #: <?php echo $job['quote_id'] ?></a></strong> links to this job.</p>
    
    <table>
    	<tr>
    	 <td>Foundry<br/><small class="small"><a href="#">View customer</a></small></td>
    	 <td><input type="text" disabled value="<?php echo $customerName ?>" /></td>
    	 <td>Date Received</td>
    	 <td><input type="text" disabled value="<?php echo $job['dateReceived'] ?>" /></td>
    	</tr>
    	
    	<tr>
    	 <td>Customer Contact</td>
    	 <td><input type="text" disabled value="<?php echo $contact[0]. ' (' .$contact[1]. ')' ?>" /></td>
    	 <td>Pattern Number</td>
    	 <td><input type="text" disabled value="<?php echo $quote['patternNumber'] ?>" /></td>
    	</tr>
    	
    	<tr>
    	 <td>Est. Delivery</td>
    	 <td><input type="text" disabled value="<?php echo $quote['estimatedDelivery'] ?>" /></td>
    	 <td>Pattern Owner</td>
    	 <td><input type="text" disabled value="<?php echo $quote['patternOwner'] ?>" /></td>
    	</tr>
    </table>
    
    <div class="spacer"></div>
    
    <table border=1>
    	<tr>
    	 <th>Instructions</th>
    	 <th>Hours</th>
    	 <th>Material</th>
    	</tr>
    	<?php foreach ($instructions as $instruction): ?>
	    <tr>
	     <td><?php echo $instruction['instruction'] ?></td>
	     <td><?php echo $instruction['hours'] ?></td>
	     <td><?php echo $instruction['material']?></td>
	    </tr>
	<?php endforeach; ?>
    </table>
	
    <div class="spacer"></div>
    	
    <table>
    	<tr>
    	 <td>Total Hours</td>
    	 <td>Shop Rate</td>
    	 <td>Total Material</td>
    	 <td>Margin</td>
    	 <td>Total Price</td>
    	</tr>
    	<tr>
    	 <td><input type="text" disabled value="<?php echo $quote['totalHours'] ?>" /></td>
    	 <td><input type="text" disabled value="<?php echo money_format('%(n', $quote['shopRate']) ?>" /></td>
    	 <td><input type="text" disabled value="<?php echo money_format('%(n', $quote['totalMaterial']) ?>" /></td>
    	 <td><input type="text" disabled value="<?php echo $quote['margin'] ?>" /></td>
    	 <td><input type="text" disabled value="<?php echo money_format('%(n', $quote['totalPrice']); ?>" /></td>
    	</tr>
    </table>
    	
   <div class="spacer"></div>
   
   </form>
   </div>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>