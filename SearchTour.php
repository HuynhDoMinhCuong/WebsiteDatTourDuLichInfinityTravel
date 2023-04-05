<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <!-- <link href="site.css" rel="stylesheet" /> -->
    <title>Search tour</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
</head>

<?php //include_once('style.php'); ?>

<?php 
require_once("entities/tour.class.php");
require_once('entities/phuongtien.class.php');


?>
<?php 
if(isset($_POST["btnsubmit"])){
    //Lấy giá trị từ form
 
    $tenTour = $_POST["txttentour"];

    $timkiemtour = Tour::list_tour_search($tenTour);
}
else {
    $timkiemtour = Tour::list_tour();
}

?>



<?php 




?>



<link href="site.css" rel="stylesheet" />

    <!--  -->
    
 <body>
    <!-- 
 <header class="bg-primary text-white py-3">
    <div class="navbar navbar-dark bg-primary navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a href="Index.php" class="navbar-brand">Trang chủ</a>
                <a href="uploads_product.php" class="navbar-brand">Uploads hình ảnh</a>
                <a href="add_product.php" class="navbar-brand">Thêm sản phẩm</a>
                <a href="list_product.php" class="navbar-brand">Danh sách sản phẩmm</a>
            </div>
            <form class="form-inline">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </div>
    </header>  -->

    <h2> TÌM TOUR </h2>

    <?php
    /*if(isset($_GET["status"])){
        if ($_GET["status"] == 'inserted') {
            echo "<h1>Thông báo: Thêm sản phẩm thành công!</h1>";
        }else{
            echo "<h1>Thông báo: Thêm sản phẩm thất bại!</h1>";    
        }
    }*/
    ?>

      

    <div class="container">
    <!-- Form Thêm tour -->
    <form method="post">
        <!-- Tên sản phẩm -->
        <div class="row">
            <div class="form-group">
                <label>Tên tour:</label>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="txttentour" value="<?php echo isset($_POST["txttentour"]) ? $_POST["txttentour"] : "" ?>">
            </div>
        </div>
   
        <div class="row">
            <div class="lbltitle">
                   Click thêm:
            </div>
            <div class="submit">
                <button type="submit" class="btn btn-primary" name="btnsubmit">Thêm tour</button>
            </div>
        </div>
    </form>
    </div>


    <hr></hr>

    <h2> TÌM THẤY TOUR </h2> 
   
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

            <?php foreach ($timkiemtour as $item) { ?>
     
                <div class="item ajaxed __cate_42" >
            
                <a href="tour_detail.php?id=<?php echo $item["MaTour"]; ?>">  <!-- Đường dẫn đến trang chi tiết tour theo Mã Tour --> 

               <!-- <div class="item-label">
                    <span class="lb-tragop">Trả góp 0%</span>
                </div> -->
              
                <div class="item-img item-img_42">
                <img src="<?php echo $item['Hinh']; ?>" class="img-responsive" style="width: 100%" alt='Image' onerror="this.src='uploads/<?php echo $item['Hinh']; ?>'">
               <!-- <img src="https://cdn.tgdd.vn/ValueIcons/Label_01-05.png" width="40" height="40" class="lbliconimg lbliconimg_42 tgdd" /> -->
                </div>
                    <p class="text-dark"><b>Tour: </b><?php echo $item['TenTour']; ?></p>
                    <p class="text-dark"><b>Nơi khởi hành: </b><?php echo $item['NoiKhoiHanh']; ?></p>
                 

                    <p class="text-dark"><b>Ngày khởi hành: </b> 
                    <?php   $date=date_create($item['NgayKhoiHanh']);
                        echo date_format($date,"d/m/Y") ?> </p>


                    <p class="text-dark"><b>Thời gian: </b><?php echo $item['ThoiGian']; ?></p>
                    
                    <p class="text-danger"><b>
                                <?php
                                    $giaTour = $item['GiaTour'];
                                    $formattedPrice = number_format($giaTour);
                                    printf("Giá: %s VND\n", $formattedPrice) ; 
                                ?></b>               
                    </p>
                    <p>
                    <a href="tour_cart.php?id=<?php echo $item["MaTour"]; ?>"> <button type="button" class="btn btn-primary"> Đặt tour </button> </a>   

                    <!-- <button type="button" class="btn btn-primary" onclick="location.href='shopping_cart.php?id=<?php echo $item["ProductID"]; ?>'"> Mua hànggggg </button> -->

                </p>
                
                </a>
                </div>

                <?php } ?>

                </ul>
        </div>
    </div>    

    <!--
    <script src ="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src ="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src ="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
</body>
    </html>
<!-- Footer -->
<?php require 'footer.php'; ?>

