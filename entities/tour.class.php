<?php 
require_once("config/db.class.php");
 
class Tour{
    public $maTour;
    public $maPhuongTien;
    public $tenTour;
    public $noiKhoiHanh;
    public $ngayKhoiHanh;
    public $thoiGian;
    public $giaTour;
    public $soLuongVeHienCo;
    public $moTa;
    public $hinh;


    public function __construct($phuongtien_id, $tour_name, $khoihanh_place, $khoihanh_date, $tour_time, $tour_price, $tour_quantityNow, $tour_mota, $tour_picture){
        $this -> maPhuongTien = $phuongtien_id;
        $this -> tenTour = $tour_name;
        $this -> noiKhoiHanh = $khoihanh_place;
        $this -> ngayKhoiHanh = $khoihanh_date;
        $this -> thoiGian = $tour_time;
        $this -> giaTour = $tour_price;
        $this -> soLuongVeHienCo = $tour_quantityNow;
        $this -> moTa = $tour_mota;
        $this -> hinh = $tour_picture;
    }

    //Lưu tour
    public function save(){
         
        // Khởi tạo đối tượng $db với class Db từ file db.class.php
        $db = new Db();
        // Tạo biến $sql để insert tour, chạy biến này ở dưới
        $sql = "INSERT INTO tour (MaPhuongTien, TenTour,NoiKhoiHanh, NgayKhoiHanh, ThoiGian, GiaTour, SoLuongVeHienCo, MoTa, Hinh) VALUES
        ('$this->maPhuongTien', 
        '$this->tenTour', 
        '$this->noiKhoiHanh', 
        '$this->ngayKhoiHanh', 
        '$this->thoiGian ', 
        '$this->giaTour',
        '$this->soLuongVeHienCo',
        '$this->moTa',
        '$this->hinh')";
        // query_execute là function từ class Db
        $result = $db -> query_execute($sql);
        // Trả về kết quả
        return $result;
    }

    //Update tour
    public function update($maTour, $maPhuongTien, $tenTour, $noiKhoiHanh, $ngayKhoiHanh, $thoiGian, $giaTour, $soLuongVeHienCo, $moTa, $hinh){
     
        // Khởi tạo đối tượng $db với class Db từ file db.class.php
        $db = new Db();
        // Tạo biến $sql để update tour, chạy biến này ở dưới
        $sql = "UPDATE tour SET MaPhuongTien = '$maPhuongTien', TenTour = '$tenTour' , NoiKhoiHanh = '$noiKhoiHanh', NgayKhoiHanh = '$ngayKhoiHanh', ThoiGian = '$thoiGian', GiaTour = '$giaTour', SoLuongVeHienCo = '$soLuongVeHienCo', MoTa = '$moTa' , Hinh = '$hinh' WHERE MaTour = '$maTour' ";
        // query_execute là function từ class Db
        $result = $db -> query_execute($sql);
        // Trả về kết quả
        return $result;
    }

    //Delete tour
    public function delete($maTour){
        // Khởi tạo đối tượng $db với class Db từ file db.class.php
        $db = new Db();
        // Tạo biến $sql để Delete tour, chạy biến này ở dưới
        $sql = "DELETE FROM tour WHERE MaTour = '$maTour' ";
        // query_execute là function từ class Db
        $result = $db -> query_execute($sql);
        // Trả về kết quả
        return $result;
    }

    // Danh sách tour
    public static function list_tour(){
        $db = new Db();
        $sql = "SELECT * FROM tour";
        // select_to_array là hàm của class Db, dùng để xuất ra mảng
        $rs = $db -> select_to_array($sql);
        return $rs;
    }

     // Danh sách tour theo mã phương tiện
     public static function list_tour_by_maPhuongTien($maPhuongTien){
        $db = new Db();
        $sql = "SELECT * FROM tour WHERE MaPhuongTien='$maPhuongTien'";
        // select_to_array là hàm của class Db, dùng để xuất ra mảng
        $result = $db -> select_to_array($sql);
        return $result;
    }

    // Danh sách phương tiện cùng tên
    public static function list_tour_relate($maPhuongTien, $id){
        $db = new Db();
        $sql = "SELECT * FROM tour WHERE MaPhuongTien='$maPhuongTien' AND MaTour!='$id'";
        // select_to_array là hàm của class Db, dùng để xuất ra mảng
        $result = $db -> select_to_array($sql);
        return $result;
    }
    public static function get_tour($id){
        $db = new Db();
        $sql = "SELECT * FROM tour WHERE MaTour='$id'";
        $result = $db->select_to_array($sql);
        return $result;
    }

    // Danh sách tour có mã số 1 là ô tô
    public static function list_tourID1(){
        $db = new Db();
        $sql = "SELECT * FROM tour WHERE MaPhuongTien = 1";
        // select_to_array là hàm của class Db, dùng để xuất ra mảng
        $rs = $db -> select_to_array($sql);
        return $rs;
    }

    // Danh sách tour có mã số 2 là xe buýt
    public static function list_tourID2(){
        $db = new Db();
        $sql = "SELECT * FROM tour WHERE MaPhuongTien = 2";
        // select_to_array là hàm của class Db, dùng để xuất ra mảng
        $rs = $db -> select_to_array($sql);
        return $rs;
    }

    // Danh sách tour có mã số 3 là máy bay
    public static function list_tourID3(){
        $db = new Db();
        $sql = "SELECT * FROM tour WHERE MaPhuongTien = 3";
        // select_to_array là hàm của class Db, dùng để xuất ra mảng
        $rs = $db -> select_to_array($sql);
        return $rs;
    }
 

    //Tìm theo tên gần giống

    public static function list_tour_search($tenTour){
        $db = new Db();
        $sql = "SELECT * FROM tour WHERE TenTour like '%$tenTour%'";
        // select_to_array là hàm của class Db, dùng để xuất ra mảng
        $rs = $db -> select_to_array($sql);
        return $rs;
    }


   
}
?>

