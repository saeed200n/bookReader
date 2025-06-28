<?php
include 'connect.php';

if(isset($_POST['productB_v'])){
  $productB_v=$_POST['productB_v'];
  $codeProductB_v=$_POST['codeProductB_v'];
  $codeDflipProductB_v=$_POST['codeDflipProductB_v'];
  $codeDflipPBPrw_v=$_POST['codeDflipPBPrw_v'];
  
  	date_default_timezone_set('Iran');
    $date = date("Y-m-d H:i:s");
  
  $csql = "INSERT INTO bookReader(date,name_product,id_product,id_dflip,id_dflipPrw)VALUES (:date,:name_product,:id_product,:id_dflip,:id_dflipPrw) ";
  
            $statment = $conn->prepare($csql);
            $ck = $statment->execute([
              	':id_dflipPrw' => $codeDflipPBPrw_v,
                ':id_dflip' => $codeDflipProductB_v,
                ':id_product' => $codeProductB_v,
                ':name_product' => $productB_v,
                ':date' => $date
            ]);
            if ($ck) {
                echo "200";
            } else {
                echo "400";
            }
  
}