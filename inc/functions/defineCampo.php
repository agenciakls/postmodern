<?php
function defineCampo($campos) {
	foreach ($campos as $campo) {
		$GLOBALS[$campo] = $_POST[$campo];
	}
}
?>