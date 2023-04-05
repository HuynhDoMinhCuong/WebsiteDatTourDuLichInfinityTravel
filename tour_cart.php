<?php include_once("header.php");?>
<?php
    
    require_once("entities/tour.class.php");
    require_once("entities/phuongtien.class.php");
    $phuongtiens = PhuongTien::list_phuongtien();

    
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    error_reporting(E_ALL);
    ini_set('display_errors','1');
    if(isset($_GET['id'])){
        $pro_id = $_GET["id"];


        $was_found = false;
        $i = 0;
        if(!isset($_SESSION["cart_items"])|| count($_SESSION["cart_items"])<1){
            $_SESSION["cart_items"] = array(0 => array("pro_id" => $pro_id, "quantity" => 1 ));

        }else{
            foreach($_SESSION["cart_items"] as $item){
                $i++;
                foreach ($item as $key => $value) {
                    if($key == "pro_id" && $value == $pro_id){
                        array_splice($_SESSION["cart_items"], $i-1, 1, array(array("pro_id" =>  $pro_id, "quantity" =>
                        $item["quantity"]+1)));
                        $was_found = true;
                    }
                }
            }
            if($was_found == false){
                array_push($_SESSION["cart_items"], array("pro_id" => $pro_id, "quantity"=> 1));
            }
        }
        header("location: tour_cart.php");
    }
?>

<div class="container text-center">
    <div class="col-sm-3">
        <h2> Phương tiện </h2>
        <ul class = "list-group">
                    <a href="danhmuc_phuongtien.php" class="list-group-item">Tất cả</a>     
            <?php
                foreach($phuongtiens as $item) {
                    echo "<li class = 'list-group-item'><a href=/danhmuc_phuongtien.php?phuongtienID=".$item["MaPhuongTien"].">".$item["TenPhuongTien"]."</a></li>" ;
                }?>
        </ul>
        </div>
        
    <hr></hr>

    <div class="col-sm-12">
        <h2>THÔNG TIN GIỎ HÀNG</h2><br>
        <!--<table class="table table-condensed">
            <thead>
                <tr>
                    <th>Mã tour</th>
                    
                    <th>Tên tour</th>
                    <th>Hình ảnh</th>
                    <th>Nơi khởi hành</th>
                    <th>Ngày khởi hành</th>
                    <th>Thời gian</th>
                    <th>SL vé</th>
                    <th>Đơn giá</th>
                    <th>Thành tiền</th>
                    <th scope='col' colspan="2"><b><center>Thao tác</center></b></th>
                </tr> -->

                <table border="1" class="table">
                <tr>
                    <td><b><center>Mã Tour</center></b></td>
                    <td><b><center>Tên tour</center></b></td>
                    <td><b><center>Hình</center></b></td>
                    <td><b><center>Nơi khởi hành</center></b></td>
                    <td><b><center>Ngày khởi hành</center></b></td>
                    <td><b><center>Thời gian</center></b></td>
                    <td><b><center>SL vé </center></b></td>
                    <td class="col-md-2"><b><center>Đơn giá</center></b></td>
                  
                    <td><b><center>Thành tiền</center></b></td>
                    
                   <!-- <td><b><center>Url hình</center></b></td> -->
                    <td scope='col' colspan="2"><b><center>Thao tác</center></b></td>    
                </tr>

            </thead>
            <tbody>
                <?php
                $total_money = 0;
                if(isset($_SESSION["cart_items"]) && count($_SESSION["cart_items"])>0){
                    foreach($_SESSION["cart_items"] as $item){
                        $id = $item["pro_id"];
                        $tours = Tour::get_tour($id);
                        $tour = reset($tours);
                        $total_money += $item["quantity"]*$tour["GiaTour"];
                        $total_money_sp = $item["quantity"]*$tour["GiaTour"];
                        ?>

                        <tr> 
                        <td><center><?php echo $tour['MaTour']?></center></td>
                       <!-- <td><center><?php echo $tour['MaPhuongTien']?></center></td> -->
                        <td><?php echo $tour['TenTour']?></td>


                        <td><center><img src="<?php echo $tour['Hinh']; ?>" class="img-responsive" style="width: 100%" alt='Image' onerror="this.src='uploads/<?php echo $tour['Hinh']; ?>'"><center></td>
                       <!-- <td><center><img src="uploads/<?php echo $tour['Hinh'] ?>"<center></td> -->

                        <td><center><?php echo $tour['NoiKhoiHanh']?></center></td>
                        <td><center>
                            <?php $date=date_create($tour['NgayKhoiHanh']);
                            echo date_format($date,"d/m/Y")                                        // echo date_format($date,"d/m/Y H:i:s")
                            ?></center></td>  
                        <td><center><?php echo $tour['ThoiGian']?></center></td>

                        <td><center><?php echo $item['quantity']?></center></td>    

                       <!-- <td><center><?php echo $tour['SoLuongVeHienCo']?></center></td> -->

                        <td><?php 
                                $giaTour = $tour['GiaTour'];
                                $formattedPrice = number_format($giaTour);
                                printf(" %s VND\n", $formattedPrice) ; 
                            ?></td>

                         <td><?php 
                              //  $giaTour = $tour['GiaTour'];
                                $formattedPrice = number_format($total_money_sp);
                                printf(" %s VND\n", $formattedPrice) ; 
                            ?></td>


                        
                     <!--   <td><?php echo $tour['MoTa']?></td>   -->
                       
                        <!-- <td><p><?php echo $tour['Hinh']?></p></td> -->
                       
                       
                       <?php  echo "<td><a href='tour_cart.php" .$tour['MaTour'] ."' class='text-primary'>Xoá</a></td>";
                             // echo "<td><a href='delete_tour.php?id=" .$tour['MaTour'] ."' class='text-danger'>Xoá</a></td> ";
                      
                        ?> 
                       
    
                    </tr>

                    <?php
                    } 
                }
                else{
                    echo"Không có tour nào trong giỏ tour!";
                }
                ?>

                    <td colspan=15 class='text-right text-danger'> <?php 
                    //$giaTour = $tour['GiaTour'];
                     $formattedPrice = number_format($total_money);
                        printf(" Tổng tiền: %s VND\n", $formattedPrice) ; 
                        ?></td>

            </tbody>
        </table>

                               <tr>
                                <td colspan=3>
                                    <p class='text-right'>
                                        <button type='button' onclick="location.href= 'Index.php'" class='btn btn-primary'> Quay lại trang chủ </button>
                                        <button type="button" class='btn btn-success'>Thanh toán</button>
                                    </p>
                            
                                </td>
            </tr>
                              


    </div>
</div>
<?php include_once('footer.php'); ?>