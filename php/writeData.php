<?php

$json = $_POST['json'];
$data = $_POST['data'];

$fileName = "../data/".$json.".json";

$file = fopen($fileName,"w");

fwrite($file,$data);

fclose($file);

?>