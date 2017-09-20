<?php 

	$sqlStatement = "drop table IF EXISTS temp_item_id; ";
	$sqlStatement = "create TEMPORARY table temp_item_id as ";
	$sqlStatement = "SELECT item_id FROM item WHERE category_id =89 AND borrower =0 AND deleted =0 LIMIT 3; ";
	
	$sqlStatement = "update item set borrower = 21 , date_borrowed = now(), borrowed=1  where item_id in ";
	$sqlStatement = "(SELECT item_id FROM temp_item_id);";
	
	echo $sqlStatement; 


?>