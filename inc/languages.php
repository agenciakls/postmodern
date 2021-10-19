<?php 
function reqLang($getLang) {
    require 'languages/' . $getLang . '.php';
}

function getLang($getLang = 'pt') {
    $langCurrent = (string) $getLang;
    switch ($langCurrent) {
        case 'pt': $lang = 'pt'; break;
        case 'en': $lang = 'en'; break;
        case 'es': $lang = 'es'; break;
        default: $lang = 'pt'; break;
    }

    if (!isset($_COOKIE['l']) || $_COOKIE['l'] != $lang) {
        setcookie('l', $lang, time()+2500000, "/");
        reqLang($lang);
    }
    else { reqLang($_COOKIE['l']); }
}

function textLang($arrayText) {
    $lang = $_COOKIE['l'];
    return $arrayText[$lang];
}

function langVar($langVar = '') {
    global $lang;
    $resultVar = (isset($lang[$langVar])) ? $lang[$langVar] : '';
    return $resultVar;
}

function whatLang() {
    $lang = (isset($_COOKIE['l'])) ? $_COOKIE['l'] : 'pt';
    return $lang;
}

if (isset($_GET['l'])) { getLang($_GET['l']); }
else if (isset($_COOKIE['l'])) { reqLang($_COOKIE['l']); }
else { getLang(); }

?>