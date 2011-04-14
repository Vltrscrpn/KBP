<?php 
$title = 'List of Quotes';
$box1content = 'Recent Quotes';
?>

<?php ob_start() ?>

<div id="rightnow">
    <h3 class="reallynow">
        <span>Recent Quotes</span>
        <a href="newquote.php" class="pagenew">New quote</a>
        <br />
    </h3>
    <p class="youhave">
	    <table id="myTable" class="tablesorter"> 
		<thead> 
		<tr> 
		    <th>Date</th> 
		    <th>Quote #</th> 
		    <th>Pattern Number</th> 
		    <th>Customer</th> 
		    <th>Contact</th><?php //var_dump($quotes);die();
		    ?>
		</tr> 
		</thead> 
		<tbody> 
		<?php foreach ($quotes as $quote): ?>
		<tr> 
		    <td><?php echo $quote['dateIssued']?></td> 
		    <td><a href="quotes.php?action=show&id=<?php echo $quote['id']?>" title="View Quote"><?php echo $quote['id']?></a></td> 
		    <td><?php echo $quote['patternNumber']?></td> 
		    <td><a href="customers.php?action=show&id=<?php echo $quote['customer_id']?>" title="View Customer"><?php echo $quote['name'] ?></a></td> 
		    <td><?php echo $quote['contact']?></td> 
		</tr> 
	    	<?php endforeach; ?>
		</tbody> 
	    </table> 
	     <div id="pager" class="pager">
		<form>
		<img src="img/tablesorter/first.png" class="first">
		<img src="img/tablesorter/prev.png" class="prev">
		<input type="text" class="pagedisplay">
		<img src="img/tablesorter/next.png" class="next">
		<img src="img/tablesorter/last.png" class="last">
		<select class="pagesize">
			<option selected="selected" value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option value="40">40</option>
		</select>
		</form>
           </div>
	<br/>
	<br/><br/>
</div>
	    
<?php $content = ob_get_clean() ?>
<?php include 'layout.php' ?>