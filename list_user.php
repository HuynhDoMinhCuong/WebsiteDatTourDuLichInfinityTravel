<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="site.css" rel="stylesheet" />
    <title>Danh sách tour</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>

<?php //include_once('style.php'); ?>

<?php 


require_once('entities/user.class.php');
?>

<?php require 'headerImages.php'; ?>

<link href="site.css" rel="stylesheet" />


<?php 
// $prods là biến khởi tạo đối tượng từ class Product, function list_product()
if (!isset($_GET["phuongtienID"])){
    
    $tours = User::list_users();                       //Danh sách tour
    //
    
    $phuongtiens2 = PhuongTien::list_phuongtien();                 //Danh sách phương tiện



}
else{
    $maPhuongTien = $_GET["phuongtienID"];

    $tours = Tour::list_tour_by_maPhuongTien($maPhuongTien);       //Lấy danh sách tour theo mã    
    
    //
    
    
}
$phuongtiens = PhuongTien::list_phuongtien();     //Tạo danh mục phương tiện, lấy danh sách tour có mã phương tiện ra tên phương tiện

?>



<!-- -->



<body>




<div class="container text-center form-text">
    <div class="row">
        <div class="col-sm-12">
            <h2>DANH SÁCH USERS</h2>   
        </div>
            <table border="1" class="table">
                <tr>
                    <td><b><center>Tài khoản</center></b></td>
                    <td><b><center>Mật khẩu</center></b></td>
       
                    <td><b><center>Email </center></b></td>
              
                
                </tr>
                <?php 
                    foreach ($tours as $item) {
                ?>
                <tr> 
                    <td><center><?php echo $item['UserName']?></center></td>
                    <td><center><?php echo $item['Password']?></center></td>
                    
                    

                    <td><?php echo $item['Email']?></td>
                
                   
                    <!--
                   <td>
                    <a onclick="return confirm('Bạn có muốn xoá');"href="delete_product.php?id= <?php echo $item['ProductID'];?>" id="btnUpdate" class="text-danger">
                                <i class="fas fa-edit"></i> Xoá
                    </a>
                   
                    <a onclick="return confirm('Bạn có muốn sửa');"href="update_product.php?id= <?php echo $item['ProductID'];?>" id="btnUpdate" class="text-primary">
                                <i class="fas fa-edit"></i> Sửa
                    </a>
                    <td>-->

                </tr>
                <?php } ?>
            </table>

        </div>    
    </div>



    


</div>
 
   <!-- <script src ="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src ="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
</body>
</html>
<?php include_once('footer.php'); ?>