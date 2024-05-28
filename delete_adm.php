<?php
require_once('database.php');
$id =$_GET ['id'];
$data= delete('admin',$id);
if($data){
    header("location:admin.php");
}

?>