<?php 


require '../../../bd/libreria-php-json/json-file-decode.class.php';

	//leer archivo json

$read = new json_file_decode();
$json = $read->json("../../../../../elementos/datos/historia.json");


print json_encode($json, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS





 ?>