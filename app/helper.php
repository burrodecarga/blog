<?php

define('RESERVA',0.1);
define('ANOI',2019);
define('ANOF',2031);
define('MES',array(
    'Na/A','enero','febrero','marzo','abril','mayo',
    'junio','julio','agosto','septiembre','octubre',
    'noviembre','diciembre'
));
define('DIA',array(
    'lunes','martes','miércoles','jueves','viernes','sábado','domingo'
));

function mes($i){
    $meses=['Na/A','enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
  return $meses[$i];
}

function fecha($date){
    return date("d/m/Y", strtotime($date));;
}

function tipo($s){
    return str_replace('ordinario:','',$s);
}

function numerico($m){
    return number_format($m,2,',','.');
}


function miles($m){
    return number_format($m,0,',','.');
}

