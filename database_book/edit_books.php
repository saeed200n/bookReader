<?php
include 'connect.php';

if(isset($_POST['id'])){
  	$id=$_POST['id'];
    $id_product_ve=$_POST['id_product_ve'];
    $name_product_ve=$_POST['name_product_ve'];
    $id_dflip_ve=$_POST['id_dflip_ve'];
    $id_dflipPrw_ve=$_POST['id_dflipPrw_ve'];
 /* echo $id.'-'.$id_product_ve.'-'.$name_product_ve.'-'.$id_dflip_ve.'-'.$id_dflipPrw_ve;*/
    date_default_timezone_set('Iran');
    $date = date("Y-m-d H:i:s");

    $esql = "UPDATE bookReader SET date=:date,name_product=:name_product,id_product=:id_product,id_dflip=:id_dflip,id_dflipPrw=:id_dflipPrw WHERE id=$id ";
    $a=$conn->prepare($esql);
    
  $ck = $a->execute([
                ':date' => $date,
                ':name_product' => $name_product_ve,
                ':id_product' => $id_product_ve,
                ':id_dflip' => $id_dflip_ve,
                ':id_dflipPrw' => $id_dflipPrw_ve
            ]);
  	
    if ($ck) {
        echo "200";
    } else {
        echo "400";
    }

}