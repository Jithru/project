<?php

define('URL','http://localhost/project/');
define('APPROOT',dirname(__FILE__));

function redirect($page){
    header('location: ' . URL . $page);
}
function getLink(){
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    return $actual_link;
}

function sendOtp($message,$tel){
    $user = "94771845973";
    $password = "7243";
    $text = urlencode($message);
    $to = "94771845973";

    $baseurl ="http://www.textit.biz/sendmsg";
    $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
    $ret = file($url);

    $res= explode(":",$ret[0]);

    if (trim($res[0])=="OK")
    {
    echo "Message Sent - ID : ".$res[1];
    }
    else
    {
    echo "Sent Failed - Error : ".$res[1];
    }
}

?>