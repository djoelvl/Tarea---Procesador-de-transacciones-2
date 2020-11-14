<?php

function logger($log){

if(!file_exists('log.txt')){

    file_put_contents('log.txt','');
}
date_default_timezone_set('America/Santo_Domingo');
$time=date('d-m-Y h:i:s',time());

$contents=file_get_contents('log.txt');
$contents.="$time/$log";

file_put_contents('log.txt',$contents);
    
}



?>