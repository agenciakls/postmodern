<?php
function href($list, $select = '') {
	global $link, $basePrincipal;
	if (isset($link[$list][$select])) {
		return $basePrincipal . $link[$list][$select];
	}
	else if ($select == '' || !isset($link[$list][$select])) {
		return $list;
	}
}
?>