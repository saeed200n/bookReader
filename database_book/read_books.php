<?php
include 'connect.php';

$select=$conn->prepare("SELECT id,date,name_product,id_product,id_dflip,id_dflipPrw FROM bookReader ");
$select->execute();
/*$select=$dbcon->prepare("SELECT * FROM `bookReader` ORDER BY `bookReader`.`ID` DESC ");
$select->execute();*/

//$res=$res2->fetchAll(PDO::FETCH_GROUP| PDO::FETCH_ASSOC);
$res=$select->fetchAll( PDO::FETCH_ASSOC);



echo json_encode($res);