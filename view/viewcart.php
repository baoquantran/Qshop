<link rel="stylesheet" href="view/css/cart.css">
<style>
    .boxcenter {
        width: 80%;
        margin-left: 3%;
    }

    .boxsp {
        float: left;
        width: 30%;
        margin: 1.5%;
        text-align: center;
    }

    .boxsp img {
        width: 100%;
    }

    span {
        color: red;
    }

    .boxsp p {
        font-size: 14pt;
        font-weight: bold;
    }

    th {
        background-color: #CCC;
    }

    table {
        width: 100%;
    }

    th,
    td {
        border: 1px #999 solid;
        padding: 10px 20px;
    }
</style>
</head>

<body>
    <div style="display: flex; margin-top:5%">
        <div class="boxcenter">
            <h2>ĐƠN HÀNG CỦA BẠN</h2>
            <div>
                <?php
                    // echo var_dump($_SESSION['giohang'])
                    if ((isset($_SESSION['giohang'])) && (count($_SESSION['giohang']) > 0)) {
                        echo ' <table >        
                                    <tr >
                                        <th>STT</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Hình</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th>Hành động</th>
                                    </tr>';
                        $i = 0;
                        $tong = 0;
                        foreach ($_SESSION['giohang'] as $item) {
                            $tt = $item[3] * $item[4];
                            $thue=(12/100) * $tt;
                            $tong += $tt-$thue;

                            echo ' <tr>
                                                <td>' . ($i + 1) . '</td>
                                                <td>' . $item[1] . '</td>
                                                <td><img src="./uploaded/' . $item[2] . '" width=80px ></td>
                                                <td>' . $item[3] . '</td>
                                                <td>' . $item[4] . '</td>
                                                <td>' . number_format($tt, 0, ',', '.') . '</td>
                                                <td><a href="index.php?act=delcart&i=' . $i . '"><i  class="fa fa-times-circle fa-lg text-danger removeproduct"></i></a></td>
                                            </tr>';
                            $i++;
                        }
                        echo '<tr>
                                        <td colspan="4"></td>
                                            <td class="text-right"><strong>VAT (12%)</strong></td>
                                            <td class="text-right">' . number_format($thue, 0, ',', '.') .'VND'. '</strong></td>
                                            <td></td>
                                        <tr>
                                        <td colspan="4"></td>
                                            <td><strong>TOTAL</td>
                                            <td>' . number_format($tong, 0, ',', '.') .'VND'. '</td>
                                            <td></td>
                                        </tr>
                                        
                                        
                                        </tr>';
                        echo '</table>';
                    }
                ?>
                <br>
                <div style="float: right;">
                    <a href="index.php"class="countinue" >Tiếp tục mua hàng</a>  <a href="#" class="thanhtoan" data-toggle="modal" data-target="#checkout_modal">Check Out</a>
                </div>
            </div><br>
        </div>
        <!--  -->
       
        
      



           
      


        
        <!-- <div class="thanhtoan">
            <form action="" method="get" style="margin-top:-2% ; margin-left:3%" id="kiemloi">
                <input type="hidden" name="">
                <table class="dathang">
                    <tr>
                        <td><input type="text" name="name" placeholder="nhập họ tên"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="adress" placeholder="nhập địa chỉ"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="email" placeholder="nhập nhập email"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="tel" placeholder="nhập sdt"></td>
                    </tr>
                    <tr>
                        
                    </tr>
                    <tr>
                        <p style="color:#F00; padding-top:20px;" align="center">
                            <?php echo $_SESSION['action1']; ?><?php echo $_SESSION['action1'] = ""; ?></p>
                        <td><input type="submit" value="thanh toán" name="thanhtoan"></td>
                    </tr>
                </table>
            </form>
        </div> -->
    </div>
    <style>
        #fd {
            margin-top: 5%;
        }
    </style>
    </div>
    <!-- <script type="text/javascript">
      $(document).ready(function () {

        //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
        $("#kiemloi").validate({
          rules: {
            name: "required",
            email: {
              required: true,
              email: true
            },
            tel: {
              required: true,
              minlength:10,
              maxlength: 10
            },
            adress: {
              required: true,
              
              maxlength: 155
            },
           
          },
          messages: {
            name: " <br>Vui lòng nhập tên!",
            email: {
              required: "<br>Vui lòng nhập vào email",
              email: "<br>Nhập đúng định dạng email đê :D"
            },
            tel: {
              required: "<br>Vui lòng nhập vào sdt",
              tel: "<br>Nhập đúng định dạng !"
            },
            adress: {
              required: "<br>Vui lòng nhập đúng địa chỉ!",
              
              maxlength: "<br>Độ tài tối đa 155 kí tự"
            },
          
          }
        });
      });
    </script> -->

</body>