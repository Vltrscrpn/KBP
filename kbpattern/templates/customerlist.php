<?php 
$title = 'List of Customers';
$box1content = 'Customer List';
?>

<?php ob_start() ?>

<div id="rightnow">
    <h3 class="reallynow">
        <span>Customer List</span>
        <br />
    </h3>
    <p class="youhave">
	    <table id="myTable" class="tablesorter"> 
		<thead> 
		<tr> 
		    <th>Shop Number</th> 
		    <th>Name</th> 
		    <th>Address</th> 
		    <th>City</th> 
		    <th>State</th>
		    <th>Zip</th>
		    <?php //var_dump($quotes);die();
		    ?>
		</tr> 
		</thead> 
		<tbody> 
		<?php foreach ($customers as $customer): ?>
		<tr> 
		    <td><?php echo $customer['shopNumber']?></td> 
		    <td><a href="customers.php?action=show&id=<?php echo $customer['id']?>" title="Show Customer"><?php echo $customer['name']?></a></td> 
		    <td><?php echo $customer['address1']?></td> 
		    <td><?php echo $customer['city']?></td> 
		    <td><?php echo $customer['state']?></td> 
		    <td><?php echo $customer['zip']?></td> 
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