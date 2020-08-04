<?php 
include('../includes/dbcon.php');
session_start();
if(isset($_SESSION['is_login']))
{
   echo "";
}
else
{
   header('location:index.php');
}

$qry="select *from product_portfolio where id=?";
$result=$conn->prepare($qry);
$result->bindParam(1,$id);
$id=$_REQUEST['id'];


$result->execute();
$data=$result->fetch(PDO::FETCH_ASSOC);




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies Profile</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
    
<div class="sidebar">
<?php include('sidebarNav.html') ?>
</div>
    <div class="home">
        <div class="homeContent">
            <div class="container" style="padding-left:140px;">
                    <div class="topSections">
                        <h1>Product Portfolio</h1>
                        <p class="text-muted">Admin/product</p>
                    </div>

                    <div class="pills-Section">
                             
                    <!-- pills begins from here  -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#product" role="tab" aria-controls="profile" aria-selected="false">Add Product</a>
                        </li>
                    </ul>
                        <div class="tab-content" id="myTabContent">
                           
                            
                            <!-- add product -->
                            <div class="tab-pane fade show active" id="product" role="tabpanel" aria-labelledby="profile-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add Product</h4>
                                <div class="container">
                                    <form action="update_product.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                                        <label><b>Upload Product Highlight Image (250*250)</b></label><br>
                                        <input type="file" name="myfile" placeholder="Choose File" required><br><br>

                                        <p><b><i>Sub Images</i></b></p>

                                        <div class="row">
                                            
                                            <div class="col-md-3">
                                                <input type="file" name="files1" placeholder="Choose File">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" name="files2" placeholder="Choose File">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" name="files3" placeholder="Choose File">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" name="files4" placeholder="Choose File">
                                            </div>
                                        </div> <br>

                                        <label for="">Product Code</label>
                                        <input type="text" value="<?php echo $data['product_code']; ?>" name="product_code"  class="form-control col-md-3"> <br>

                                        <label for="">Product Name</label>
                                        <input type="text" value="<?php echo $data['product_name']; ?>" name="product_name" class="form-control col-md-6"> <br>

                                        <label>Select Category</label><br>
                                       
                                        <select  name="select" class="selectpicker">
                                         
                                            
                                            <option><?php echo $data['category_name']?></option>
                                            <?php 
                                            $qry1="select *from category";
                                            $result1=$conn->prepare($qry1);
                                            $result1->execute();
                                           
                                            while($row1=$result1->fetch(PDO::FETCH_ASSOC))
                                            {
                                                ?>
                                            <option><?php echo $row1['category_type'];?></option> 
                                                
                                            <?php
                                            }
                                            ?>  
                                            
                                            
                                                
                                            
                                              
                                        </select> <br><br>
                                        

                                        <label for="">Product Price</label>
                                        <input type="text" value="<?php echo $data['price_of_product']?>" name="product_price" class="form-control col-md-3"><br>

                                        <label for="">Product Description</label>
                                        <textarea class="form-control"  name="product_description" id="" cols="20" rows="10"><?php echo $data['product_description']; ?></textarea>

                                        
                                        <button  type="submit" name="edit_product" class="btn btn-info">Update Product</button>              
                                    </form>

                                </div>
                                    
                            </div>

                            
                                

                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/jquery-3.3.1.slim.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>
</body>
</html>