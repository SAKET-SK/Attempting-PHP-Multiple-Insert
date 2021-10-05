<!--
//index.php
!-->

<html>  
    <head>  
        <title>Purchased Items</title>  
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="bootstrap.min.css" />
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
			<br />
			
			<h3 align="center">Purchased Items</a></h3><br />
			<br />
			<br />
			<div align="right" style="margin-bottom:5px;">
				<button type="button" name="add" id="add" class="btn btn-success btn-xs">Add</button>
			</div>
			<br />
			<form method="post" id="user_form">
				<div class="table-responsive">
					<table class="table table-striped table-bordered" id="user_data">
						<tr>
							<th>Product Name</th>
							<th>Purchase ID</th>
							<th>Purchase Date</th>
							<th>Invoice Number</th>
							<th>Product Number</th>
							<th>Vendor Name</th>
							<th>Quantity</th>
							<th>Unit Price</th>
							<th>Total Cost</th>
							<th>Remove</th>
						</tr>
					</table>
				</div>
				<div align="center">
					<input type="submit" name="insert" id="insert" class="btn btn-primary" value="Insert" />
				</div>
			</form>

			<br />
		</div>
		<!--This is modal asking for ip-->
		<div id="user_dialog" title="Add Data">
			<div class="form-group">
				<label>Enter Product Name</label>
				<input type="text" name="first_name" id="product_name" class="form-control" />
				<span id="error_product_name" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label>Enter Product ID</label>
				<input type="text" name="product_id" id="product_id" class="form-control" />
				<span id="error_product_id" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label>Enter Purchase Date</label>
				<input type="text" name="purchase_date" id="purchase_date" class="form-control" />
				<span id="error_purchase_date" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label>Enter Invoice Number</label>
				<input type="text" name="invoice_number" id="invoice_number" class="form-control" />
				<span id="error_invoice_number" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label>Enter Product Number</label>
				<input type="text" name="product_number" id="product_number" class="form-control" />
				<span id="error_product_number" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label>Enter Vendor Name</label>
				<input type="text" name="vendor_name" id="vendor_name" class="form-control" />
				<span id="error_vendor_name" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label>Enter Quantity</label>
				<input type="text" name="quantity" id="quantity" class="form-control" />
				<span id="error_quantity" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label>Enter Unit Price</label>
				<input type="text" name="unit_price" id="unit_price" class="form-control" />
				<span id="error_unit_price" class="text-danger"></span>
			</div>
			<div class="form-group">
				<label>Enter Total Price</label>
				<input type="text" name="total_price" id="total_price" class="form-control" />
				<span id="error_total_price" class="text-danger"></span>
			</div>
			<div class="form-group" align="center">
				<input type="hidden" name="row_id" id="hidden_row_id" />
				<button type="button" name="save" id="save" class="btn btn-info">Save</button>
			</div>
		</div>
		<div id="action_alert" title="Action">

		</div>
    </body>  
</html>  




<script>  
$(document).ready(function(){ 
	
	var count = 0;

	$('#user_dialog').dialog({
		autoOpen:false,
		width:400
	});

	$('#add').click(function(){
		$('#user_dialog').dialog('option', 'title', 'Add Data');
		$('#product_name').val('');
		$('#product_id').val('');
		$('#purchase_date').val('');
		$('#invoice_number').val('');
		$('#product_number').val('');
		$('#vendor_name').val('');
		$('#quantity').val('');
		$('#unit_price').val('');
		$('#total_price').val('');
		

		$('#error_product_name').text('');
		$('#error_product_id').text('');
		$('#error_purchase_date').text('');
		$('#error_invoice_number').text('');
		$('#error_product_number').text('');
		$('#error_vendor_name').text('');
		$('#error_quantity').text('');
		$('#error_unit_price').text('');
		$('#error_total_price').text('');
		

		$('#product_name').css('border-color', '');
		$('#product_id').css('border-color', '');
		$('#purchase_date').css('border-color', '');
		$('#invoice_number').css('border-color', '');
		$('#product_number').css('border-color', '');
		$('#vendor_name').css('border-color', '');
		$('#quantity').css('border-color', '');
		$('#unit_price').css('border-color', '');
		$('#total_price').css('border-color', '');
		

		$('#save').text('Save');
		$('#user_dialog').dialog('open');
	});

	$('#save').click(function(){
		var error_product_name = '';
		var error_product_id = '';
		var error_purchase_date = '';
		var error_invoice_number = '';
		var error_product_number = '';
		var error_vendor_name = '';
		var error_quantity = '';
		var error_unit_price = '';
		var error_total_price = '';
		
		var product_name = '';
		var product_id = '';
		var purchase_date = '';
		var invoice_number = '';
		var product_number = '';
		var vendor_name = '';
		var quantity = '';
		var unit_price = '';
		var total_price = '';
		

		if($('#product_name').val() == '')
		{
			error_product_name = 'Product Name is required';
			$('#error_product_name').text(error_product_name);
			$('#product_name').css('border-color', '#cc0000');
			product_name = '';
		}
		else
		{
			error_product_name = '';
			$('#error_product_name').text(error_product_name);
			$('#product_name').css('border-color', '');
			product_name = $('#product_name').val();
		}	

		if($('#product_id').val() == '')
		{
			error_product_id = 'Product ID is required';
			$('#error_product_id').text(error_product_id);
			$('#product_id').css('border-color', '#cc0000');
			product_id = '';
		}
		else
		{
			error_product_id = '';
			$('#error_product_id').text(error_product_id);
			$('#product_id').css('border-color', '');
			product_id = $('#product_id').val();
		}

		if($('#purchase_date').val() == '')
		{
			error_purchase_date = 'Purchase Date is required';
			$('#error_purchase_date').text(error_purchase_date);
			$('#purchase_date').css('border-color', '#cc0000');
			purchase_date = '';
		}
		else
		{
			error_purchase_date = '';
			$('#error_purchase_date').text(error_purchase_date);
			$('#purchase_date').css('border-color', '');
			purchase_date = $('#purchase_date').val();
		}

		if($('#invoice_number').val() == '')
		{
			error_invoice_number = 'Invoice Number is required';
			$('#error_invoice_number').text(error_invoice_number);
			$('#invoice_number').css('border-color', '#cc0000');
			invoice_number = '';
		}
		else
		{
			error_invoice_number = '';
			$('#error_invoice_number').text(error_invoice_number);
			$('#invoice_number').css('border-color', '');
			invoice_number = $('#invoice_number').val();
		}	

		if($('#product_number').val() == '')
		{
			error_product_number = 'Product Number is required';
			$('#error_product_number').text(error_product_number);
			$('#product_number').css('border-color', '#cc0000');
			product_number = '';
		}
		else
		{
			error_product_number = '';
			$('#error_product_number').text(error_product_number);
			$('#product_number').css('border-color', '');
			product_number = $('#product_number').val();
		}

		if($('#vendor_name').val() == '')
		{
			error_vendor_name = 'Vendor Name is required';
			$('#error_vendor_name').text(error_vendor_name);
			$('#vendor_name').css('border-color', '#cc0000');
			vendor_name = '';
		}
		else
		{
			error_vendor_name = '';
			$('#error_vendor_name').text(error_vendor_name);
			$('#vendor_name').css('border-color', '');
			vendor_name = $('#vendor_name').val();
		}	

		if($('#quantity').val() == '')
		{
			error_quantity = 'Quantity is required';
			$('#error_quantity').text(error_quantity);
			$('#quantity').css('border-color', '#cc0000');
			quantity = '';
		}
		else
		{
			error_quantity = '';
			$('#error_quantity').text(error_quantity);
			$('#quantity').css('border-color', '');
			quantity = $('#quantity').val();
		}

		if($('#unit_price').val() == '')
		{
			error_unit_price = 'Unit Price is required';
			$('#error_unit_price').text(error_unit_price);
			$('#unit_price').css('border-color', '#cc0000');
			unit_price = '';
		}
		else
		{
			error_unit_price = '';
			$('#error_unit_price').text(error_unit_price);
			$('#unit_price').css('border-color', '');
			unit_price = $('#unit_price').val();
		}	

		if($('#total_price').val() == '')
		{
			error_total_price = 'Total Price is required';
			$('#error_total_price').text(error_total_price);
			$('#total_price').css('border-color', '#cc0000');
			total_price = '';
		}
		else
		{
			error_total_price = '';
			$('#error_total_price').text(error_total_price);
			$('#total_price').css('border-color', '');
			total_price = $('#total_price').val();
		}

		


		if(error_product_name != '' || error_product_id != '' || error_purchase_date != '' || error_invoice_number != '' || error_product_number != '' || error_vendor_name != '' || error_quantity != '' || error_unit_price != '' || error_total_price != '')
		{
			return false;
		}
		else
		{
			if($('#save').text() == 'Save')
			{
				count = count + 1;
				output = '<tr id="row_'+count+'">';

				output += '<td>'+product_name+' <input type="hidden" name="hidden_product_name[]" id="product_name'+count+'" class="product_name" value="'+product_name+'" /></td>';

				output += '<td>'+product_id+' <input type="hidden" name="hidden_product_id[]" id="product_id'+count+'" value="'+product_id+'" /></td>';

				output += '<td>'+purchase_date+' <input type="hidden" name="hidden_purchase_date[]" id="purchase_date'+count+'" value="'+purchase_date+'" /></td>';

				output += '<td>'+invoice_number+' <input type="hidden" name="hidden_invoice_number[]" id="invoice_number'+count+'" class="invoice_number" value="'+invoice_number+'" /></td>';

				output += '<td>'+product_number+' <input type="hidden" name="hidden_product_number[]" id="product_number'+count+'" value="'+product_number+'" /></td>';

				output += '<td>'+vendor_name+' <input type="hidden" name="hidden_vendor_name[]" id="vendor_name'+count+'" class="vendor_name" value="'+vendor_name+'" /></td>';

				output += '<td>'+quantity+' <input type="hidden" name="hidden_quantity[]" id="quantity'+count+'" value="'+quantity+'" /></td>';

				output += '<td>'+unit_price+' <input type="hidden" name="hidden_unit_price[]" id="unit_price'+count+'" class="unit_price" value="'+unit_price+'" /></td>';

				output += '<td>'+total_price+' <input type="hidden" name="hidden_total_price[]" id="total_price'+count+'" value="'+total_price+'" /></td>';

				output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Remove</button></td>';

				output += '</tr>';
				$('#user_data').append(output);
			}
			else
			{
				var row_id = $('#hidden_row_id').val();

				output = '<td>'+product_name+' <input type="hidden" name="hidden_product_name[]" id="product_name'+row_id+'" class="product_name" value="'+product_name+'" /></td>';

				output += '<td>'+product_id+' <input type="hidden" name="hidden_product_id[]" id="product_id'+row_id+'" value="'+product_id+'" /></td>';

				output += '<td>'+purchase_date+' <input type="hidden" name="hidden_purchase_date[]" id="purchase_date'+row_id+'" value="'+purchase_date+'" /></td>';

				output = '<td>'+invoice_number+' <input type="hidden" name="hidden_invoice_number[]" id="invoice_number'+row_id+'" class="invoice_number" value="'+invoice_number+'" /></td>';

				output += '<td>'+product_number+' <input type="hidden" name="hidden_product_number[]" id="product_number'+row_id+'" value="'+product_number+'" /></td>';

				output = '<td>'+vendor_name+' <input type="hidden" name="hidden_vendor_name[]" id="vendor_name'+row_id+'" class="vendor_name" value="'+vendor_name+'" /></td>';

				output += '<td>'+quantity+' <input type="hidden" name="hidden_quantity[]" id="quantity'+row_id+'" value="'+quantity+'" /></td>';

				output = '<td>'+unit_price+' <input type="hidden" name="hidden_unit_price[]" id="unit_price'+row_id+'" class="unit_price" value="'+unit_price+'" /></td>';

				output += '<td>'+total_price+' <input type="hidden" name="hidden_total_price[]" id="total_price'+row_id+'" value="'+total_price+'" /></td>';

				output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Remove</button></td>';
				$('#row_'+row_id+'').html(output);
			}

			$('#user_dialog').dialog('close');
		}
	});

	/*$(document).on('click', '.view_details', function(){
		var row_id = $(this).attr("id");
		var first_name = $('#first_name'+row_id+'').val();
		var last_name = $('#last_name'+row_id+'').val();
		$('#first_name').val(first_name);
		$('#last_name').val(last_name);
		$('#save').text('Edit');
		$('#hidden_row_id').val(row_id);
		$('#user_dialog').dialog('option', 'title', 'Edit Data');
		$('#user_dialog').dialog('open');
	});*/

	$(document).on('click', '.remove_details', function(){
		var row_id = $(this).attr("id");
		if(confirm("Are you sure you want to remove this row data?"))
		{
			$('#row_'+row_id+'').remove();
		}
		else
		{
			return false;
		}
	});

	$('#action_alert').dialog({
		autoOpen:false
	});

	$('#user_form').on('submit', function(event){
		event.preventDefault();
		var count_data = 0;
		$('.product_name').each(function(){
			count_data = count_data + 1;
		});
		if(count_data > 0)
		{
			var form_data = $(this).serialize();
			$.ajax({
				url:"insert.php",
				method:"POST",
				data:form_data,
				success:function(data)
				{
					$('#user_data').find("tr:gt(0)").remove();
					$('#action_alert').html('<p>Data Inserted Successfully</p>');
					$('#action_alert').dialog('open');
				}
			})
		}
		else
		{
			$('#action_alert').html('<p>Please Add atleast one data</p>');
			$('#action_alert').dialog('open');
		}
	});
	
});  
</script>