<?php
setcookie("admin_user", '', time()-3600*24, '/');
setcookie("admin_senha", '', time()-3600*24, '/');
header('location: ' . baseUrl() . 'controle');
?>