<?php

$responce["page"] = 1;
$responce["total"] = 1;
$responce["records"] = 1;
$responce["rows"][0]["cell"] = array ("A"=>"20130606","B"=>"testdate...","sn1"=>"20130606","sn2"=>"20130606",);
$responce["rows"][0]["id"] = 0;
echo json_encode($responce);
// echo $responce;

?>