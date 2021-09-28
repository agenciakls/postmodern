<?php
// VERIFICAR SE EXISTE CAMPOS
function verif_campo($campos = '') {
	if ($campos == '') {global $campos;} 
	foreach ($campos as $vl_campo) {
		if (!isset($_POST[$vl_campo])) {
			global $imp;
			$imp .= ' ' . $vl_campo;
			return false;
			break;
		}
	}
	return true;
}
?>