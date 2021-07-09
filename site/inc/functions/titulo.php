<?php
function titulo($imp = '', $class = '', $id = '') {
	if (isset($imp)) :
		$class = (!empty($class)) ? ' class="' . $class . '"' : '';
		$id = (!empty($id)) ? ' id="' . $id . '"' : '';
		return '<h1' . $class . $id . '>' . $imp . '</h1>';
	endif;
}
?>