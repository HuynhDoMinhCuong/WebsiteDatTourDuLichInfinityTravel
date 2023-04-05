<?php 
require_once("config/db.class.php");
 
class Uploads{
    public $hinh;
    public function __construct($tour_picture){
        $this -> hinh = $tour_picture;
    }

    //Lưu sản phẩm
    public function saveuploads($loi){
        //Xử lý upload ảnh
        if ($this->hinh['name'] != null){
            $uploadOk = 1;
            $target_dir = "uploads/";
            $file_temp = $this->hinh["tmp_name"];
            $file_name = $this->hinh["name"];
            $timestamp = date("y").date("m").date("d").date("h").date("i").date("s");
            $filepath = $target_dir.$timestamp.$file_name;
            $imageFileType = strtolower(pathinfo($filepath,PATHINFO_EXTENSION));
           
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                $uploadOk = 0;
                $loi[] = "Hình ảnh không đúng định dạng.";  
            }

            if (file_exists($filepath)) {
                $loi[] = "Hình ảnh đã tồn tại.";
                $uploadOk = 0;
            }

            if ($this->hinh["size"] > 5000000000) {
                $loi[] = "Hình ảnh quá lớn.";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                $loi[] = "Xin lỗi, hình ảnh của bạn không thể tải lên.";
                return false;
            }else{
                if(move_uploaded_file($file_temp, $filepath)==false) {
                    return false;
                }
            }
        }
        
        if ($this->hinh==null){
            $loi[] = "Chưa uploads hình";
            return false;
        }
 
    }
}
      
?>

