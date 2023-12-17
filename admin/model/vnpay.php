<?php 
function insert_vnpay($id_bill,$amount){
    $sql="insert into bill_vnpay(id_bill,amount) values('$id_bill','$amount')";
    pdo_execute($sql);
}
function updatettdonhang($id){
    $sql="update bill SET TrangThaiThanhToan=1 where id=".$id;
    pdo_execute($sql);
}
?>