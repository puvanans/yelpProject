<?php 

    //this page will serve as the server from which the test page pulls data. hopefully

    $array = [];
    $array [] = 'Puva';
    $array [] = 'Frankie';
    $array [] = 'Bek';
    $array [] = 'Aarif';

    echo json_encode($array);
?>