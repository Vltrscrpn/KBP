	<link rel="stylesheet" href="css/start/jquery-ui-1.8.10.custom.css"> 
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.js"></script>
	<script src="js/jquery.easy-confirm-dialog.js"></script>
	
	<script src="development-bundle/ui/jquery.ui.core.js"></script> 
	<script src="development-bundle/ui/jquery.ui.widget.js"></script> 
	<script src="development-bundle/ui/jquery.ui.position.js"></script> 
	<script src="development-bundle/ui/jquery.ui.autocomplete.js"></script> 
	
	<script src="development-bundle/ui/jquery.ui.mouse.js"></script> 
	<script src="development-bundle/ui/jquery.ui.draggable.js"></script> 
	<script src="development-bundle/ui/jquery.ui.sortable.js"></script> 
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8/jquery.validate.min.js"></script>
	<script src="js/jquery.tablesorter.js"></script> 
	<script src="js/jquery.tablesorter.pager.js"></script> 
	
	<script> 
	function alterPricing(material,labor,method)
	{
	  var currHrs	= document.getElementById('totalhrs');
	  var currMat	= document.getElementById('totalmat');	 
	  //window.alert('Current Total Hrs: '+currHrs.value+'\nCurrent Material:'+currMat.value+'\nClicked Hrs:'+labor+'\nClicked Mat:'+material);
	  if (method == 'add'){
		currHrs.value = (parseFloat(currHrs.value) + parseFloat(labor));
		currMat.value = (parseFloat(currMat.value) + parseFloat(material));
	  }else if (method == 'subtract'){
	  	currHrs.value = (parseFloat(currHrs.value) - parseFloat(labor));
		currMat.value = (parseFloat(currMat.value) - parseFloat(material));
	  }
	  updatePricing();
	}
	
	function instructionChange()
	{	
	  var numi = document.getElementById('count');  
	  var currHrs = document.getElementById('totalhrs');
	  var currMat = document.getElementById('totalmat');
	  var hrid;
	  var maid;
	  var hrs;
	  var mat;
	  currHrs.value = 0;
	  currMat.value = 0;	
	  //window.alert('count: '+numi.value);
	  for (i=1;i <= numi.value;i++)
	  { 
	  	hrid = 'hrs'+i;
          	maid = 'mat'+i;
          	if ((document.getElementById(hrid) != null)) //skip element if it does not exist
		{
		  hrs = document.getElementById(hrid);
		  mat = document.getElementById(maid);
		   if (isNaN(hrs.value) || isNaN(mat.value) || hrs.value == ' ' || mat.value ==' ')
		   {
		    //window.alert('Not A number... skipped.');
		    }else{
		        //window.alert('Count:'+i+'\nCurrent Total Hrs: '+currHrs.value+'\nCurrent Material:'+currMat.value+'\nClicked Hrs:'+hrs.value+'\nClicked Mat:'+mat.value);
			currHrs.value = (parseFloat(currHrs.value) + parseFloat(hrs.value));
			currMat.value = (parseFloat(currMat.value) + parseFloat(mat.value));
		   }
		}
	  }
	  updatePricing();
	}
	
	function updatePricing()
	{
	  var hours	= document.getElementById('totalhrs');
	  var rate	= document.getElementById('shoprate');
	  var material  = document.getElementById('totalmat');
	  var margin	= document.getElementById('margin');
	  var total	= document.getElementById('totalprice');
	  
	  var percent	= 1 + (margin.value/100);
	  var labor	= (hours.value * rate.value);
	  var cost	= labor+ parseFloat(material.value);
	  total.value = Math.round((cost * percent)/5)*5;
	}
	
	function addInstruction2(id)
	{
	document.getElementById("Select1").selectedIndex = -1
	if (id != 'BLANK'){
	var ins =0;
	var mat =0;
	var hrs =0;
	var httpxml;
	try
	  {
	  // Firefox, Opera 8.0+, Safari
	  httpxml=new XMLHttpRequest();
	  }
	catch (e)
	  {
	  // Internet Explorer
			  try
	   		{
	   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
	    				}
	  			catch (e)
	    				{
	    			try
	      		{
	      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
	     		 }
	    			catch (e)
	      		{
	      		alert("Your browser does not support AJAX!");
	      		return false;
	      		}
	    		}
	  }
	function stateck() 
	    {
	    if(httpxml.readyState==4)
	      {
	
	var myarray=eval(httpxml.responseText);	
	
	   var ins = myarray[0];
	   var hrs = myarray[1];
	   var mat = myarray[2];
	   var ni   = document.getElementById('sortable');
	   var numi = document.getElementById('count');
	   var num  = (document.getElementById('count').value -1)+ 2;
	   numi.value = num;
	   var newdiv = document.createElement('div');
	   var divIdName = 'instruction'+num;
	   newdiv.setAttribute('id',divIdName);
	   newdiv.innerHTML = '';
	   newdiv.innerHTML += '<input type="text" name="instruct[]" value="'+ins+'" size=63>';
	   newdiv.innerHTML += '<input type="text" id="hrs'+num+'" name="hours[]" value="'+hrs+'" size=2  onChange="instructionChange()">';
	   newdiv.innerHTML += '<input type="text" id="mat'+num+'" name="material[]" value="'+mat+'" size=4 onChange="instructionChange()">';
	   newdiv.innerHTML += '<a href=\'#\' onclick=\'removeInstruction('+num+')\'><img src="images/icon_remove.png"></a>';
	   newdiv.innerHTML += '<img src="images/move_icon.jpg">';
	   ni.appendChild(newdiv);
	   cnt = 0;  
	   	
	   alterPricing(mat,hrs,'add');
	      }
	    }   
	    
	var url="ajax_getinstruction.php";
	url=url+"?id="+id;
	url=url+"&sid="+Math.random();
	httpxml.onreadystatechange=stateck;
	httpxml.open("GET",url,true);
	httpxml.send(null);
	}else{
	   var ins = '';
	   var hrs = ' ';
	   var mat = ' ';
	   var ni   = document.getElementById('sortable');
	   var numi = document.getElementById('count');
	   var num  = (document.getElementById('count').value -1)+ 2;
	   numi.value = num;
	   var newdiv = document.createElement('div');
	   var divIdName = 'instruction'+num;
	   newdiv.setAttribute('id',divIdName);
	   newdiv.innerHTML = '';
	   newdiv.innerHTML += '<input type="text" name="instruct[]" value="'+ins+'" size=63>';
	   newdiv.innerHTML += '<input type="text" id="hrs'+num+'" name="hours[]" value="'+hrs+'" size=2  onChange="instructionChange()">';
	   newdiv.innerHTML += '<input type="text" id="mat'+num+'" name="material[]" value="'+mat+'" size=4 onChange="instructionChange()">';
	   newdiv.innerHTML += '<a href=\'#\' onclick=\'removeInstruction('+num+')\'><img src="images/icon_remove.png"></a>';
	   newdiv.innerHTML += '<img src="images/move_icon.jpg">';
	   ni.appendChild(newdiv);
	   cnt = 0;  
	   	
	}
  	}
 
        function removeInstruction(divNum) {
          var hrid = 'hrs'+divNum;
          var maid = 'mat'+divNum;
          var inid = 'instruction'+divNum;
	  var d = document.getElementById('sortable');
	  var olddiv = document.getElementById(inid);
	  var hrs = document.getElementById(hrid);
	  var mat = document.getElementById(maid);
	  alterPricing(mat.value,hrs.value,'subtract');
	  d.removeChild(olddiv);
	}
	
function AjaxFunction(customer_id)
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
   				 httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    				}
  			catch (e)
    				{
    			try
      		{
      		httpxml=new ActiveXObject("Microsoft.XMLHTTP");
     		 }
    			catch (e)
      		{
      		alert("Your browser does not support AJAX!");
      		return false;
      		}
    		}
  }
function stateck() 
    {
    if(httpxml.readyState==4)
      {

var myarray=eval(httpxml.responseText);
// Before adding new we must remove previously loaded elements
for(j=document.form.contact.length-1;j>=0;j--)
{
document.form.contact.remove(j);
}


for (i=0;i<myarray.length;i++)
{
var optn = document.createElement("OPTION");
optn.value = myarray[i];
i = i + 1;
optn.text = myarray[i];
document.form.contact.options.add(optn);

} 
      }
    }
	var url="ajax_getcontacts.php";
url=url+"?cid="+customer_id;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateck;
httpxml.open("GET",url,true);
httpxml.send(null);
  }
	
	(function( $ ) {
		$.widget( "ui.combobox", {
			_create: function() {
				var self = this,
					select = this.element.hide(),
					selected = select.children( ":selected" ),
					value = selected.val() ? selected.text() : "";
				var input = this.input = $( "<input>" )
					.insertAfter( select )
					.val( value )
					.autocomplete({
						delay: 0,
						minLength: 0,
						source: function( request, response ) {
							var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
							response( select.children( "option" ).map(function() {
								var text = $( this ).text();
								if ( this.value && ( !request.term || matcher.test(text) ) )
									return {
										label: text.replace(
											new RegExp(
												"(?![^&;]+;)(?!<[^<>]*)(" +
												$.ui.autocomplete.escapeRegex(request.term) +
												")(?![^<>]*>)(?![^&;]+;)", "gi"
											), "<strong>$1</strong>" ),
										value: text,
										option: this
									};
							}) );
						},
						select: function( event, ui ) {
							ui.item.option.selected = true;
							self._trigger( "selected", event, {
								item: ui.item.option
							});
						},
						change: function( event, ui ) {
							if ( !ui.item ) {
								var matcher = new RegExp( "^" + $.ui.autocomplete.escapeRegex( $(this).val() ) + "$", "i" ),
									valid = false;
								select.children( "option" ).each(function() {
									if ( $( this ).text().match( matcher ) ) {
										this.selected = valid = true;
										return false;
									}
								});
								if ( !valid ) {
									// remove invalid value, as it didn't match anything
									$( this ).val( "" );
									select.val( "" );
									input.data( "autocomplete" ).term = "";
									return false;
								}
							}
						}
					})
					.addClass( "ui-widget ui-widget-content ui-corner-left" );
 
				input.data( "autocomplete" )._renderItem = function( ul, item ) {
					return $( "<li></li>" )
						.data( "item.autocomplete", item )
						.append( "<a>" + item.label + "</a>" )
						.appendTo( ul );
				};
 
				this.button = $( "<button type='button'>&nbsp;</button>" )
					.attr( "tabIndex", -1 )
					.attr( "title", "Show All Items" )
					.insertAfter( input )
					.button({
						icons: {
							primary: "ui-icon-triangle-1-s"
						},
						text: false
					})
					.removeClass( "ui-corner-all" )
					.addClass( "ui-corner-right ui-button-icon" )
					.click(function() {
						// close if already visible
						if ( input.autocomplete( "widget" ).is( ":visible" ) ) {
							input.autocomplete( "close" );
							return;
						}
 
						// pass empty string as value to search for, displaying all results
						input.autocomplete( "search", "" );
						input.focus();
					});
			},
 
			destroy: function() {
				this.input.remove();
				this.button.remove();
				this.element.show();
				$.Widget.prototype.destroy.call( this );
			}
		});
	})( jQuery );
 
	$(function() {
		$('#hours').val("");
		$('#material').val("");
			
			
		$("#instruction").autocomplete({
			source: "search_instructions.php",
			minLength: 2,
			select: function( event, ui ) {
				$('#id').val(ui.item.id);
				$('#value').val(ui.item.value);
				$('#hours').val(ui.item.hours);
				$('#material').val(ui.item.material);
			}
		});
	
	
		$( "#combobox" ).combobox();
		$( "#toggle" ).click(function() {
			$( "#combobox" ).toggle();
		});
		
		$( "#sortable" ).sortable({
			revert: true
		});
		$("#myTable")
		.tablesorter({sortList: [[1,1],[0,1]]})
     		.tablesorterPager({container: $("#pager")});
		$( "ul, li" ).disableSelection();
		$("#form").validate();
	});    jQuery.validator.messages.required = "";
	</script> 
       
	<script type="text/javascript"> 
	$(function() {
		$(".confirm").easyconfirm();
		$("#alert").click(function() {
			alert("You approved the action");
		});
		
		$("#yesno").easyconfirm({locale: { title: 'Select Yes or No', button: ['No','Yes']}});
		$("#yesno").click(function() {
			alert("You clicked yes");
		});
		
		
	});
	</script> 
       <style type="text/css">
	.ui-button { margin-left: -1px; }
	.ui-button-icon-only .ui-button-text { padding: 0.35em; } 
	
       .ui-dialog { font-size: 11px; }
	#question {
		width: 300px!important;
		height: 60px!important;
		padding: 10px 0 0 10px;
	}
	#question img {
		float: left;
	}
	#question span {
		float: left;
		margin: 20px 0 0 10px;
	}
	img
	{  border-style: none;
	}
</style>