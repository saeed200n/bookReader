<?php
include 'connect.php';

if(isset($_POST['id'])){
  $id=$_POST['id'];
  $dsql="DELETE FROM bookReader WHERE id=$id";
  $a=$conn->prepare($dsql);
  $ck=$a->execute();
  if($ck){
    echo '200';
  }else{
    echo '400';
  }
}


