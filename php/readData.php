<?php

$json = $_POST['json'];

$fileName = "../data/".$json.".json";

if(file_exists($fileName)){
    $file = fopen($fileName,"r");

    $readFile = fread($file,filesize($fileName));

    fclose($file);
}else {
    $readFile = "{\"error\":\"file does not exist\"}";
}

echo ($readFile);

?>