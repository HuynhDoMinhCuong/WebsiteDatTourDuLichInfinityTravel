<?php //IDEA:
/**
 * Lớp xử lý kết nối và truy vấn cơ sở dữ liệu
 */
class Db
{
    // Biến kết nối CSDL
    protected static $connection;
    // Hàm khởi tạo kết nối 
    public function connect(){
        //Kết nối tới CSDL trong trường hợp kết nối chưa khởi tạo
        if(!isset(self::$connection)){
            //Lấy thông tin kết nối từ tập tin config.ini
            $config = parse_ini_file("config.ini");
            self::$connection = new mysqli("localhost", $config["username"], $config["password"], $config["databasename"]);
        }
        // Xử lý lỗi nếu không kết nối được tới CSDL
        if(self::$connection==false){
            //Xử lý ghi file tại đây //your todo advanced
            return false;
        }
        return self::$connection;
    }
    //Hàm thực hiện xử lý câu lệnh truy vấn
    public function query_execute($queryString){
        //Khởi tạo kết nối
        $connection = $this->connect();
        //Thực hiện execute truy vấn
        $connection->query("SET NAMES utf8");
        $result = $connection->query($queryString);
        //$connection->close();
        return $result;
    }
    //Hàm thực hiện trả về một mảng danh sách kết quả
    public function select_to_array($queryString){
        $rows = array();
        $result = $this->query_execute($queryString);
        if($result==false) return false;
        while($item = $result->fetch_assoc()){
            $rows[] = $item;
        }
        return $rows;
    }
}
?>