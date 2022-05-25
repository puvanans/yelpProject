
<?php 
    
    //This is test page for trying out newly learned techniques

    echo "This be the test page";
    echo "<br>";


    $url = 'https://www.google.com';

    $handle = curl_init();

    //phpinfo();

    curl_setopt($handle,CURLOPT_URL,$url);

    //curl_setopt($handle,CURLOPT_SSL_VERIFYPEER,true);
        //SSL certificate verification is turned off in this case to produce result
        //will be focussed on obtaining certificates today.

    //curl_setopt($handle,CURLOPT_CAINFO,"C:\MAMP\conf\php7.4.16\cacert.pem");
    
    $result = curl_exec($handle);

    curl_close($handle);
    
    print_r($result);

?>