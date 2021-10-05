<?php

//insert.php

$connect = new PDO("mysql:host=localhost;dbname=shop_inventory", "root", "");

$query = "
INSERT INTO purchase 
(purchaseID, invoiceNumber, purchaseDate, itemName, unitPrice, quantity, vendorName) 
VALUES (:invoice_number, :purchase_date, :product_name, :unit_price, :qunatity, :vendor_name)
";

for($count = 0; $count<count($_POST['hidden_product_name']); $count++)
{
	$data = array(
		':product_name'	=>	$_POST['hidden_product_name'][$count],
		':product_id'	=>	$_POST['hidden_product_id'][$count],
		':purchase_date'	=>	$_POST['hidden_purchase_date'][$count],
		':invoice_number'	=>	$_POST['hidden_invoice_number'][$count],
		':product_number'	=>	$_POST['hidden_product_number'][$count],
		':vendor_name'	=>	$_POST['hidden_vendor_name'][$count],
		':quantity'	=>	$_POST['hidden_quantity'][$count],
		':unit_price'	=>	$_POST['hidden_unit_price'][$count],
		':total_price'	=>	$_POST['hidden_total_price'][$count]
	);
	$statement = $connect->prepare($query);
	$statement->execute($data);
}

?>