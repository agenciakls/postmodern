<?php
function nomeMes($mes) {
	switch ($mes) {
		case '01': $mes = 'Janeiro'; break;
		case '1': $mes = 'Janeiro'; break;
		case '02': $mes = 'Fevereiro'; break;
		case '2': $mes = 'Fevereiro'; break;
		case '03': $mes = 'Março'; break;
		case '3': $mes = 'Março'; break;
		case '04': $mes = 'Abril'; break;
		case '4': $mes = 'Abril'; break;
		case '05': $mes = 'Maio'; break;
		case '5': $mes = 'Maio'; break;
		case '06': $mes = 'Junho'; break;
		case '6': $mes = 'Junho'; break;
		case '07': $mes = 'Julho'; break;
		case '7': $mes = 'Julho'; break;
		case '08': $mes = 'Agosto'; break;
		case '8': $mes = 'Agosto'; break;
		case '09': $mes = 'Setembro'; break;
		case '9': $mes = 'Setembro'; break;
		case '10': $mes = 'Outubro'; break;
		case '11': $mes = 'Novembro'; break;
		case '12': $mes = 'Dezembro'; break;
	}
	return $mes;
}
?>