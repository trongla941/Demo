<?php 
function insert_vnpay($id_bill,$amount){
    $sql="insert into bill_vnpay(id_bill,amount) values('$id_bill','$amount')";
    pdo_execute($sql);
}
function updatettdonhangmoi($id){
    $sql="update bill_vnpay SET id_bill=vnp_TxnRef where id_bill=".$id;
    pdo_execute($sql);
}
?>