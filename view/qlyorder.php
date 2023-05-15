
<?php include('db.php'); ?>
<?php date_default_timezone_set('Asia/Manila'); ?>
<?php
    $jim = new Admin();
    $p = isset($_GET['p']) ? $_GET['p'] : null;
    if($p == 'deliver'){
        $jim->deliver(); 
    }else if($p == 'paid'){
        $jim->paid();   
    }else if($p == 'delete'){
        $jim->delete();   
    }
    if (isset($_POST['quaylai'])) {
        header('location:userinfo.php');
    }
    class Admin {
        
      
        function getuser($username){
            global $conn;
        
            $q = "SELECT * FROM asm.order where username=$username";
            $result = mysqli_query($conn, $q) or die( mysqli_error($conn));
            
            return $result;
        }
        
     
        
       
        function delete(){
            global $conn;
            $table = $_GET['table'];
            $id = $_GET['id'];
            //echo $q = "DELETE FROM asm.$table where id=$id";
            mysqli_query($conn,"DELETE FROM asm.$table where id=$id");
            return true;
        }
        
      
    }
    
?>




<style>
   .panel-body{
    width: 40%;
  
    text-align: center;
    box-shadow:3px 6px 6px 3px #D3D3D3;
    
    padding-top: 5%;
    padding-bottom: 5%;
   }
   .text-right{
    background-color:  #b6795f;
   }

</style>
   
        <section id="main-content">
            <section class="wrapper">
                <center>
                <h3><i class="fa fa-angle-right"></i> Đơn hàng đã mua</h3>
                </center>
                <div class="row">




                    <hr>
                    <?php $sp = $jim->getuser(0); ?>
                        <?php while($row = mysqli_fetch_array($sp)): ?>
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <center>
                                <h3 class="panel-title">ORDER INFORMATION</h3>
                                </center>
                                
                            </div>
                            <center>
                            <div class="panel-body">
                                <center>
                                <table border="1" class="table">
                   
                                    <tr>
                                        <td class="text-right"><strong>Tên khách hàng :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['name'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>số điện thoại :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['contact'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>địa chỉ :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['address'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Email :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['email'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Date Ordered :</strong></td>
                                        <td class="text-info"><strong><?php echo $row['dateOrdered'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Giá :</strong></td>
                                        <td class="text-danger"><strong><?php echo $row['amount'];?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>sản phẩm:</strong></td>
                                        <td class="text-primary"><strong><?php echo $row['item'];?></strong></td>
                                    </tr>
                                    <tr>
                                    <center>
                                        <tr>
                                            
                                  <td colspan="2"> <center> <a href="../index.php?act=home"><input type="submit" name="quaylai" value="Quay lại" class="btn btn-theme"></a></center>
                                  
                                   </td>  </center>
                                    </tr>
                                        
                                  
                                        
                                    </tr>
                                </table>
                                </center>
                            </div>
                            </center>
                            </div>
                        
                        <?php endwhile; ?>
                </div>
            </section>
        </section>
    
        <script>
            $(function() {
                $('select.styled').customSelect();
            });
        </script>