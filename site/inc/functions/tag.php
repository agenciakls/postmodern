<?php
function tag($tag = '', $imp = '', $class = '', $id = '', $href = '') {
	if (isset($imp)) :
		$class = (!empty($class)) ? ' class="' . $class . '"' : '';
		$id = (!empty($id)) ? ' id="' . $id . '"' : '';
		$href = (!empty($href)) ? ' href="' . $href . '"' : '';
		return '<' . $tag . $href . $class . $id . '>' . $imp . '</' . $tag . '>';
	endif;
}
?>