<?php 
include('header.php') ;
include('includes/dbcon.php');
$qry="select *from product_portfolio where id=?";
$result=$conn->prepare($qry);
$result->bindParam(1,$id);
$id=$_REQUEST['id'];
$_SESSION['id']=$id;


$result->execute();
$data=$result->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" href="css/header.css">

</head>
<body>



<div class="productDetails">
    <div class="container">
        <div class="row">

            <!-- product image section  -->
            <div class="col-md-5">
            <!-- The expanding image container -->
                
                    <!-- Expanded image -->
                    <img id="expandedImg"  src="product_portfolio_image/<?php echo $data['product_image']; ?>" style="width:100%; height:350px;" class="img-fluid">
                                     
                    <!-- The grid: four columns -->
                    <div class="sample-img">
                        <div class="row">
                            <div class="col-md-3 col-3">
                                <img src="product_portfolio_image/<?php echo $data['product_image']; ?>" style="height:80px; width:100%;" alt="" class="img-fluid" onclick="myFunction(this);">
                            </div>
                            <div class="col-md-3 col-3">
                                <img src="product_portfolio_image/<?php echo $data['sub_image1']; ?>" style="height:80px; width:100%;" alt="" class="img-fluid" onclick="myFunction(this);">
                            </div>
                            <div class="col-md-3 col-3">
                                <img src="product_portfolio_image/<?php echo $data['sub_image2']; ?>" style="height:80px; width:100%;" alt="" class="img-fluid" onclick="myFunction(this);">
                            </div>
                            <div class="col-md-3 col-3">
                                <img src="product_portfolio_image/<?php echo $data['sub_image3']; ?>" style="height:80px; width:100%;" alt="" class="img-fluid" onclick="myFunction(this);">
                            </div>
                        </div>
                    </div>
            </div>

            <!-- product details section  -->
            <div class="col-md-7">
                <div class="top">
                    <h2 class="HeadersB">
                       <?php echo $data['product_name']; ?>
                    </h2>
                    <h6 style="float:left;padding-right:10px;">Status :</h6>
                    <i class="mcf">Available</i>
                </div>

                <div class="main">
                        <h2 style="color:#D1495B;font-weight:bold;float:left;padding-right:10px;">Rs.</h2>
                        <h2 style="color:#D1495B;font-weight:bold;"><?php echo $data['price_of_product']; ?></h2>

                        <p class="description text-muted">
                            <?php echo $data['product_description']; ?>
                        </p>
                </div>

                <div class="pbtns">
                    <div class="row align-items-start">
                       
                            <div class="col-md-4 QTY ">
                           

                                
                                <form action="productOrder.php" method="POST">
                                    <h5 style="float:left;Padding-right:10px;">QTY</h5>
                                    <input type="text" name="quantity" class="form-control col-md-6">
                            </div>
                                            <?php if(isset($_SESSION['user_login']))
                                                { 
                                            ?> 
                                    <div class="col-md-4">
                                        <button type="submit" class="orderBtn">Order Now</button>
                                    </div>
                                            <?php }
                                            else
                                                {
                                            ?>
                                            <div class="col-md-4">
                                               <a href="login.php"><button type="button" class="orderBtn">Order Now</button></a>
                                            </div>
                                            <?php } ?>
                                </form>
                                    
                                        
                                   
                        <div class="col-md-4 ">
                            <button class="cartBtn">
                            Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="codes">
                    <h6 class="HeadersB" style="float:left;padding-right:10px">Code :</h6>
                    <h6 class="text-muted"><?php echo $data['product_code']; ?></h6>
                    <h6 class="HeadersB" style="float:left;padding-right:10px">Category :</h6>
                    <h6 class="text-muted"><?php echo $data['category_name']; ?></h6>
                </div>

                <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=button&size=large&width=77&height=28&appId"
                     width="77" 
                     height="40" 
                     style="border:none;overflow:hidden" 
                     scrolling="no" 
                     frameborder="0" 
                     allowTransparency="true" 
                     allow="encrypted-media">
                </iframe>
            </div>
        </div>
    </div>
</div>

<!-- suggested products  -->
<?php $qry5="select *from product_portfolio ORDER BY RAND() limit 4";
        $result5=$conn->prepare($qry5);
        $result5->execute();
    ?>
<div class="suggestedProduct">
<div class="exploreProduct">
        <div class="container">
            <h3 class="HeadersB">Suggested Products</h3>
            <a href="product.php"><h6 style="font-style:italic;color:#2D5F2E">View All</h6></a>
            <div class="row" style="margin-top:20px;">
                <?php
                    while($row5=$result5->fetch(PDO::FETCH_ASSOC))
                        { 

                                
                ?>

                <div class="col-md-3 col-6">
                    <div class="cardImg">
                    <a href="productDetails.php?id=<?php echo  $row5['id'] ?>"><img src="product_portfolio_image/<?php echo $row5['product_image'] ?>" alt="myproduct"></a>
                    </div>
                    <div class="cardDes">
                        <h5 class="HeadersB"><?php echo $row5['product_name'] ?></h5>
                        <p> <?php echo $row5['category_name'] ?> / available</p>
                    </div>
                </div>
                <?php 
                        }
                ?>

                <div class="col-md-3 col-6">
                    <div class="cardImg">
                        <img src="images/product.png" alt="">
                    </div>
                    <div class="cardDes">
                        <h5 class="HeadersB">Seed Product Rice w23</h5>
                        <p> category / available</p>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="cardImg">
                        <img src="images/product.png" alt="">
                    </div>
                    <div class="cardDes">
                        <h5 class="HeadersB">Seed Product Rice w23</h5>
                        <p> category / available</p>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="cardImg">
                        <img src="images/product.png" alt="">
                    </div>
                    <div class="cardDes">
                        <h5 class="HeadersB">Seed Product Rice w23</h5>
                        <p> category / available</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


 <script src="bootstrap/js/bootstrap.min.js"></script>
 <script src="js/master.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>
   
</body>
</html>