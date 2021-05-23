<?php
    $curl = curl_init();
    $NEWSAPI_KEY = '7726aef29d5a4ce58c997510e31e2c72';
    curl_setopt($curl , CURLOPT_URL, "https://newsapi.org/v2/top-headlines?country=it&category=technology&apiKey=7726aef29d5a4ce58c997510e31e2c72");    
    curl_setopt($curl , CURLOPT_RETURNTRANSFER,1);
    $res = curl_exec($curl);
    curl_close($curl);

    echo $res;
?>