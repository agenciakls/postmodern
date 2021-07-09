<?php
require 'paypal/vendor/autoload.php';
foreach (glob("inc/functions/*.php") as $filename) { 
    require $filename; 
}
?>