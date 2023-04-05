<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="author" content="HuynhDoMinhCuong" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="site.css" rel="stylesheet" />
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    
</head>

<?php //include_once("header.php");?>

<?php //include_once('style.php'); ?> <!-- style cũ -->

<?php 
require_once('entities/tour.class.php');
require_once('entities/phuongtien.class.php');
?>
<?php 


if(!isset($_GET["id"])){
    //Đường dẫn xem chi tiết tour không đúng
    //Dẫn tới trang not found
    header('Location: not_found.php');
}

else{
    $id = $_GET["id"];
    $tmp = Tour::get_tour($id); //Đường dẫn biến
    $tour = reset($tmp);
    $tours_relate = Tour::list_tour_relate($tour["MaPhuongTien"], $id);

   
    $tmp2 = PhuongTien::list_PhuongTien_by_maPhuongTien($tour["MaPhuongTien"], $id); //Đường dẫn biến
    $phuongtien = reset($tmp2);
  //  $cates_relate = Category::list_categoryName_by_cateid($cate["CateID"], $id);

}

?>

<!--
<?php require 'header.php'; ?> -->
    <!--  -->
 <body>

    <?php require 'headerImages.php'; ?>

<link href="site.css" rel="stylesheet" />


    <h2> CHI TIẾT TOUR </h2> 
   
    <div class="container text-center form-text">
    <div class="row">
        <div class="col-sm-12">
            <h2>  </h2>   
        </div>
    
        <div class="clearfix"></div> 
        <div class="container-productbox">

            <!-- -->
            <div id="preloader">
            <div id="loader"></div>
            </div>
            <!-- -->
            <ul class="listproduct"> 
     
                <div class="item ajaxed __cate_42" >             
            
                <a href="GioiThieuTourID=<?php echo $tour["MaTour"]; ?>.php">     <!-- Đường dẫn giới thiệu tour theo MaTour -->
 
               
                <!--<div class="item-label">
                    <span class="lb-tragop">Trả góp 0%</span>
                </div> -->
              
                <div class="item-img item-img_42">
                    
                <img src="<?php echo $tour['Hinh']; ?>" class="img-responsive" style="width: 100%" alt='Image' onerror="this.src='uploads/<?php echo $tour['Hinh']; ?>'">
               
                <!-- <img src="https://cdn.tgdd.vn/ValueIcons/Label_01-05.png" width="40" height="40" class="lbliconimg lbliconimg_42 tgdd" /> -->
                </div>

                    <p class="text-dark"><b>Tour: </b><?php echo $tour['TenTour']; ?></p>
                    <p class="text-dark"><b>Nơi khởi hành: </b><?php echo $tour['NoiKhoiHanh']; ?></p>
                 

                    <p class="text-dark"><b>Ngày khởi hành: </b> 
                    <?php   $date=date_create($tour['NgayKhoiHanh']);
                        echo date_format($date,"d/m/Y") ?> </p>


                    <p class="text-dark"><b>Thời gian: </b><?php echo $tour['ThoiGian']; ?></p>
                  
                    <p class="text-danger"><b>
                                <?php
                                    $giaTour = $tour['GiaTour'];
                                    $formattedPrice = number_format($giaTour);
                                    printf("Giá: %s VND\n", $formattedPrice) ; 
                                ?></b>               
                    </p>
                    <p>
                    <a href="tour_cart.php?id=<?php echo $tour["MaTour"]; ?>"> <button type="button" class="btn btn-primary"> Đặt tour </button> </a>     
                </a>
                </p>
                </div>
              

                <a class="text-dark"><b>Mã Tour:</b> <?php echo $tour['MaTour']; ?> </p>
             
                <p class="text-dark"><b>Mã phương tiện:</b> <?php echo $tour['MaPhuongTien']; ?></p>
                <p class="text-dark"><b>Tên phương tiện:</b> <?php echo $phuongtien['TenPhuongTien']; ?></p>
            

                <p class="text-dark"><b>SL vé hiện có:</b> <?php echo $tour['SoLuongVeHienCo']; ?></p>
                <p class="text-dark"><b>Mô tả:</b> <?php echo $tour['MoTa']; ?></p>
                <a></a>
                <!-- <a href="GioiThieuSanPhamid=<?php echo $tour["ProductID"]; ?>.php"> <button type="button" class="btn btn-primary">Giới thiệu sản phẩm</button> </a> -->
        
                </ul>
        
        </div>
    </div>    
 </div>

 <h2> PHƯƠNG TIỆN LIÊN QUAN </h2> 
   
    <div class="container text-center form-text">
    <div class="row">
        <div class="col-sm-12">
            <h2>  </h2>   
        </div>
    

        <div class="clearfix"></div> 
        <div class="container-productbox">

            <!-- -->
            <div id="preloader">
            <div id="loader"></div>
            </div>
            <!-- -->
            <ul class="listproduct"> 

            <?php foreach ($tours_relate as $item) { ?>
     
                <div class="item ajaxed __cate_42" >
            
                <a href="tour_detail.php?id=<?php echo $item["MaTour"]; ?>">

               <!-- <div class="item-label">
                    <span class="lb-tragop">Trả góp 0%</span>
                </div> -->
              
                <div class="item-img item-img_42">
                <img src="<?php echo $item['Hinh']; ?>" class="img-responsive" style="width: 100%" alt='Image' onerror="this.src='uploads/<?php echo $item['Hinh']; ?>'">
             <!--   <img src="https://cdn.tgdd.vn/ValueIcons/Label_01-05.png" width="40" height="40" class="lbliconimg lbliconimg_42 tgdd" /> -->
                </div>
                    <p class="text-dark"><b>Tour: </b><?php echo $item['TenTour']; ?></p>
                    <p class="text-dark"><b>Nơi khởi hành: </b><?php echo $item['NoiKhoiHanh']; ?></p>
                 

                    <p class="text-dark"><b>Ngày khởi hành: </b> 
                    <?php   $date=date_create($tour['NgayKhoiHanh']);
                        echo date_format($date,"d/m/Y") ?> </p>


                    <p class="text-dark"><b>Thời gian: </b><?php echo $tour['ThoiGian']; ?></p>
                    <p class="text-danger"><b>
                                <?php
                                    $giaTour = $item['GiaTour'];
                                    $formattedPrice = number_format($giaTour);
                                    printf("Giá: %s VND\n", $formattedPrice) ; 
                                ?></b>               
                    </p>
                    <p>
                    <a href="tour_cart.php?id=<?php echo $item["MaTour"]; ?>"> <button type="button" class="btn btn-primary">Đặt tour</button> </a>     
            
                </p>
                
                </a>
                </div>

                <?php } ?>

                </ul>
        </div>
    </div>    
 </div>

    <!--<script src ="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>-->
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src ="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  </body>
  
</html>
<!-- Footer -->
<?php require 'footer.php'; ?>







