<?php
function insert_taikhoan($email,$user,$pass){
    $sql="insert into taikhoan(email,pass,user) values('$email','$pass','$user')";
    pdo_execute($sql);
}
function checkuser($user,$pass){
    $sql = "select * from taikhoan where user='".$user."' AND pass='".$pass."'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function update_taikhoan($id,$user,$email,$pass,$diachi,$sdt,$role){
    $sql="update taikhoan set user='".$user."', email='".$email."', pass='".$pass."', diachi='".$diachi."', sdt='".$sdt."',role='".$role."' where id=".$id;
    pdo_execute($sql);
}

function update_taikhoanKH($id,$user,$email,$pass,$diachi,$sdt){
    $sql="update taikhoan set user='".$user."', email='".$email."', pass='".$pass."', diachi='".$diachi."', sdt='".$sdt."' where id=".$id;
    pdo_execute($sql);
}
function checkemail($email){
    $sql = "select * from taikhoan where email='".$email."'";
    $sp = pdo_query_one($sql);
    return $sp;
}
function loadall_taikhoan(){
    $sql="select * from taikhoan order by user";
    $listtaikhoan = pdo_query($sql);
    return $listtaikhoan;
}

// function loadall_taikhoan($kyw="",$iduser=0){

//     $sql = "select * from taikhoan where 1";
//     if($iduser!="")  $sql.=" AND id=".$iduser;
//     if($kyw!="")  $sql.=" AND id like '%".$kyw."%'";
//     $sql.=" order by id desc";
//     $bill = pdo_query($sql);
//     return $bill;
// }
function loadone_taikhoan($id){
    $sql = "select * from taikhoan where id=".$id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function delete_cartById($id){
    $sql="delete from cart where iduser=".$id;
    pdo_execute($sql);
}
function delete_binhluanById($id){
    $sql="delete from binhluan where iduser=".$id;
    pdo_execute($sql);
}
function delete_taikhoan($id){
    $sql="delete from taikhoan where id=".$id;
    pdo_execute($sql);
}

?>