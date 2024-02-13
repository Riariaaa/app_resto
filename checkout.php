<?php
    session_start();
    include "config/classDB.php";
    if(!empty($_SESSION['cart'])){
        //simpan ke table orders
        $insertOrder = $dbo->insert("tborders(idorder,idpelanggan,tglorder)","null,'1',now()");
        $idorder = $dbo->lastInsert();
        if($insertOrder){
            //simpan ke order detail
            foreach($_SESSION['cart'] as $id=>$val){
                $menu = $dbo->select('tbmenu where idmenu='.$id);
                foreach ($menu as $row){

                }
                $harga = $row['harga'];
                $insertdetail = $dbo->insert("tborderdetail","null,'$idorder',$id,$val,$harga,''");
                unset($_SESSION['cart'][$id]);
            }
        }
    }
?>
<script>
    location.href='index.php';
</script>