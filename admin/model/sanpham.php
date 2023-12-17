<?php
function insert_sanpham($tensp,$giasp,$hinh,$mota,$iddm){
    $sql="insert into sanpham(name,price,img,mota,iddm) values('$tensp','$giasp','$hinh','$mota','$iddm')";
    pdo_execute($sql);
}

// function delete_sanpham($id){
//     $sql="delete from sanpham where id=".$id;
//     pdo_execute($sql);
// }
function delete_sanpham($id){
    try {
        // Xóa các bản ghi có liên kết với sản phẩm trong bảng 'cart' trước
        $cart_sql = "delete from cart where idpro = ?";
        pdo_execute($cart_sql, $id);
        
        // Xóa sản phẩm từ bảng 'sanpham'
        $sanpham_sql = "delete from sanpham where id = ?";
        pdo_execute($sanpham_sql, $id);
        
        // Nếu không có lỗi xảy ra, thông báo xóa sản phẩm thành công
        echo "Xóa sản phẩm thành công!";
    } catch(PDOException $e) {
        // Nếu xảy ra lỗi, in thông báo lỗi
        echo "Lỗi xóa sản phẩm: " . $e->getMessage();
    }
}

function loadall_sanpham_home(){
    $sql="select * from sanpham where 1 order by id desc limit 0,9";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham_top10(){
    $sql="select * from sanpham where 1 order by luotxem desc limit 0,10";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadall_sanpham($kyw,$iddm){
    $sql="select * from sanpham where 1";
    if($kyw!=""){
        $sql.=" and name like '%".$kyw."%'";
    }
    if($iddm>0){
        $sql.=" and iddm ='".$iddm."'";
    }
    $sql.=" order by id desc";
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function loadone_sanpham($id){
    $sql = "select * from sanpham where id=".$id;
    $sp = pdo_query_one($sql);
    return $sp;
}
function updatesoluong($id){
    $sql="update sanpham SET luotxem=luotxem+1 where id=".$id;
    pdo_execute($sql);
}
function load_ten_danhmuc($iddm){
   if($iddm>0){
    $sql = "select * from danhmuc where id=".$iddm;
    $dm = pdo_query_one($sql);
    extract($dm);
    return $name;
   }
   else{
    return "";
   }
}
function load_ttdh($iddh){
    $sql = "select * from bill where id=".$iddh;
    $dm = pdo_query_one($sql);

    // Check if $dm is a valid array before extracting its values.
    if (is_array($dm)) {
        extract($dm);
        return $bill_status;
    }

    // Handle the case when $dm is not a valid array (e.g., no row found).
    // You can return a default value or handle the situation as per your requirements.
    // For example, return null or throw an exception.
    return null;
}

function load_sanpham_cungloai($id,$iddm){
    $sql = "select * from sanpham where iddm=".$iddm." AND id <> ".$id;
    $listsanpham = pdo_query($sql);
    return $listsanpham;
}
function update_sanpham($id,$iddm,$tensp,$giasp,$mota,$hinh){
    if($hinh!="")
    $sql="update sanpham set iddm='".$iddm."', name='".$tensp."', price='".$giasp."', mota='".$mota."', img='".$hinh."' where id=".$id;
    else
    $sql="update sanpham set iddm='".$iddm."', name='".$tensp."', price='".$giasp."', mota='".$mota."' where id=".$id;
    pdo_execute($sql);
}
?>