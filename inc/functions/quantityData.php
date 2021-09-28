<?php
function quantityData($query) {
	$quantity = ($query) ? mysqli_num_rows($query) : false;
	return $quantity;
	
}
?>