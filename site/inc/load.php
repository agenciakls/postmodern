<?php
foreach (glob("inc/functions/*.php") as $filename) { 
    require $filename; 
}
require 'inc/paypal/vendor/autoload.php';
?>