<?php
setcookie("usuario", '', time()-3600*24, '/');
setcookie("senha", '', time()-3600*24, '/');
header('location: /andre_dias/login');
?>