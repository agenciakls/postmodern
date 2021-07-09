<?php
function ultimoIdInserido() {
	global $conectar;
	return mysqli_insert_id($conectar);
}
?>