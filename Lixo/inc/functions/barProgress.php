<?php
function barProgress($valor, $media = 1) {
	$porcentagem = $valor / $media;
	$porcentagem = number_format($porcentagem, 2);
	if ($porcentagem < 25) {
		$barColor = 'danger';
	}
	else if ($porcentagem < 50) {
		$barColor = 'warning';
	}
	else if ($porcentagem < 75) {
		$barColor = 'info';
	}
	else {
		$barColor = 'success';
	}
	$barraProgresso = '<div class="progress">
		<div class="progress-bar progress-bar-' . $barColor . ' progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: ' . $porcentagem . '%">
			<span class="sr-only">' . $porcentagem . '% Completo</span>
		</div>
	</div>';
	return $barraProgresso;
}
?>