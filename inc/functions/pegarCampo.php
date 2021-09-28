<?php
function pegarCampo($camposRequerido) {
	if (isset($_POST[$camposRequerido]) && $_POST[$camposRequerido] != '') { return $_POST[$camposRequerido]; } else { return false; }
}
?>