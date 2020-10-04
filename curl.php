<?php
// Buat Fungsi Http_request

function http_request($url){
    $ch = curl_init();

    //set Url
    curl_setopt($ch, CURLOPT_URL, 'url')
}



?>