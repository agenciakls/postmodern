<?php 
require_once 'security.php';
require_once 'functions.php';
$campos = array( 'facebook_id', 'nome_completo', 'nome', 'sobrenome', 'img' );
$status = (isset($_POST['status']) && $_POST['status'] != '') ? $_POST['status'] : ''; 
$imp = 'disconnected';
$salvarImg = '../img/facebook/' . $_POST['facebook_id'] . '.jpg';
copy($_POST['img'], '../img/facebook/' . $_POST['facebook_id'] . '.jpg');
$_POST['img'] = $salvarImg;
if (verif_campo($campos)) {
	defineCampo($campos);
	if ($status == 'connected') {
		$verificar_id = mysqli_query($conectar, sprintf("SELECT * FROM usuarios WHERE facebook_id='%s'", $facebook_id));
		if ((mysqli_num_rows($verificar_id)) == 1) {
			if (isset($_COOKIE['idUser'])) {
				if ($_COOKIE['idUser'] == $facebook_id) {
					$rowUsuario = mysqli_fetch_array($verificar_id);
					$atualizarUsuarios = atualizarCampos('usuarios', $rowUsuario['id']);
					$imp = ($atualizarUsuarios) ? 'connected' : $imp;
					$idUserConvidado = associarUsuario();
					if ($idUserConvidado != 0) { $textAssociado = " foi associado a ID " . $idUserConvidado; } else { $textAssociado = " não foi associado a uma ID";}
					registrarAcao($nome_completo, $nome_completo . $textAssociado);
					$atualizarUsuario = mysqli_query($conectar, sprintf("UPDATE usuarios SET id_convidado='%s' WHERE facebook_id='%s' AND id_convidado='0'", $idUserConvidado, $facebook_id));
					registrarAcao($nome_completo, $nome_completo . " entrou em sua conta");
				}
				else {setcookie("idUser", '', time()-3600*24, '/'); $imp .= ' 001';}
			}
			else {
				$rowUsuario = mysqli_fetch_array($verificar_id);
				$atualizarUsuarios = atualizarCampos('usuarios', $rowUsuario['id']);
				$imp = ($atualizarUsuarios) ? 'connected' : $imp;
				setcookie("idUser", $facebook_id, time()+3600*24, '/');
				$idUserConvidado = associarUsuario();
				if ($idUserConvidado != 0) { $textAssociado = " foi associado a ID " . $idUserConvidado; } else { $textAssociado = " não foi associado a uma ID";}
				registrarAcao($nome_completo, $nome_completo . $textAssociado);
				$atualizarUsuario = mysqli_query($conectar, sprintf("UPDATE usuarios SET id_convidado='%s' WHERE facebook_id='%s' AND id_convidado='0'", $idUserConvidado, $facebook_id));
				registrarAcao($nome_completo, $nome_completo . " entrou em sua conta");
			}
		}
		else {
			if (!isset($_COOKIE['idUser'])) {
				$criarUsuario = adicionarCampos('usuarios');
				if ($criarUsuario) {
					$idUserConvidado = associarUsuario();
					if ($idUserConvidado != 0) { $textAssociado = " foi associado a ID " . $idUserConvidado; } else { $textAssociado = " não foi associado a uma ID";}
					registrarAcao($nome_completo, $nome_completo . $textAssociado);
					$atualizarUsuario = mysqli_query($conectar, sprintf("UPDATE usuarios SET id_convidado='%s' WHERE facebook_id='%s' AND id_convidado='0'", $idUserConvidado, $facebook_id));
					$imp = 'connected';
					setcookie("idUser", $facebook_id, time()+3600*24, '/');
					registrarAcao($nome_completo, $nome_completo . " entrou em sua conta");
				}
				else {
					setcookie("idUser", '', time()-3600*24, '/'); $imp .= ' 002';
				}
			}
			else {
				setcookie("idUser", '', time()-3600*24, '/');
				$imp .= ' 001';
			}
		}
	}
}
echo $imp;
?>