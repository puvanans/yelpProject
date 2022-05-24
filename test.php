
<?php 
    
    //This is test page for trying out newly learned techniques

    echo "This be the test page";
    echo "<br>";

    $url = 'https://www.google.com';

    $handle = curl_init();

    curl_setopt($handle,CURLOPT_URL,$url);

    curl_setopt($handle,CURLOPT_SSL_VERIFYPEER,false);
    
    $result = curl_exec($handle);

    curl_close($handle);
    
    print_r($result);

?>