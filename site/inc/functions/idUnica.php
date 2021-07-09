<?php
function idUnica() {
	return md5(uniqid(rand(), true));
}
?>