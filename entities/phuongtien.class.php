<?php
require_once('config/db.class.php');
/**
 * 
 */
class PhuongTien
{
    public $maPhuongTien;
    public $tenPhuongTien;
 
    function __construct($phuongtien_name)
    {
        $this->tenPhuongTien = $phuongtien_name;
       
    }

    //Lưu phương tiện
    public function save(){
    
        // Khởi tạo đối tượng $db với class Db từ file db.class.php
        $db = new Db();
        // Tạo biến $sql để insert phuongtien, chạy biến này ở dưới
        $sql = "INSERT INTO phuongtien (TenPhuongTien) VALUES
        ('$this->tenPhuongTien')";
        // query_execute là function từ class Db
        $result = $db -> query_execute($sql);
        // Trả về kết quả
        return $result;
    }

    
    //Update phương tiện
    public function update($maPhuongTien, $tenPhuongTien){
     
        // Khởi tạo đối tượng $db với class Db từ file db.class.php
        $db = new Db();
        // Tạo biến $sql để update phương tiện, chạy biến này ở dưới
        $sql = "UPDATE phuongtien SET TenPhuongTien = '$tenPhuongTien' WHERE MaPhuongTien = '$maPhuongTien' ";
        // query_execute là function từ class Db
        $result = $db -> query_execute($sql);
        // Trả về kết quả
        return $result;
    }

    //Delete phương tiện
    public function delete($maPhuongTien){
        // Khởi tạo đối tượng $db với class Db từ file db.class.php
        $db = new Db();
        // Tạo biến $sql để Delete phương tiện, chạy biến này ở dưới
        $sql = "DELETE FROM phuongtien WHERE MaPhuongTien = '$maPhuongTien' ";
        // query_execute là function từ class Db
        $result = $db -> query_execute($sql);
        // Trả về kết quả
        return $result;
    }


    
    // Lấy danh sách phương tiện
    public static function list_phuongtien()
    {
        $db = new Db();
        $sql = "SELECT * FROM phuongtien";
        $result = $db->select_to_array($sql);
        return $result;
    }

    // Danh sách tên phương tiện theo mã phương tiện
    public static function list_PhuongTien_by_maPhuongTien($id){
        $db = new Db();
        $sql = "SELECT * FROM phuongtien WHERE MaPhuongTien='$id'";
        // select_to_array là hàm của class Db, dùng để xuất ra mảng
        $result = $db -> select_to_array($sql);
        return $result;
    }

}
?>