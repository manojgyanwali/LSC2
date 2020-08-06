 <?php 
 include('header.php');
include('includes/dbcon.php');

$qry="select *from product_portfolio";
$result=$conn->prepare($qry);
$result->execute();
$conn = null;

include('includes/dbcon.php');

$qry10="select *from category";
$result10=$conn->prepare($qry10);
$result10->execute();

?> 












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Portfolio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" href="css/header.css">

</head>
<body>



<!-- product portfolio head section begins  -->
<div class="pTop">
    <div class="container">
        <h2 class="HeadersB" style="margin-top:40px;">
            PRODUCT PORTFOLIO
        </h2>
        <div class="row" style="margin-top: 22px;">
            <div class="col-md-6 PcatL">
                <ul>
                    <b><li class="mcf">Popular</li></b>
                            <?php 
                                while($row10=$result10->fetch(PDO::FETCH_ASSOC))
                                {
                            ?>
                           
                    
                   <a href="category.php?category=<?php echo $row10['category_type']; ?>"> <li class="Pcat"><?php echo $row10['category_type']; ?></li></a>
                                <?php } ?>

                </ul>

            </div>

            <div class="col-md-6">
                    <form action="product_search.php" method="POST" id="forms">
                        <div class="input-group mb-3" id="searchSection">
                            <input type="text" name="search_box" class="form-control" placeholder="What are you looking for?">
                            <div class="input-group-prepend">
                            <button type="submit" class="input-group-text" name="search" style="background:#2d5f2e;color:white;"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

<!-- product card starts  -->
<div class="exploreProduct">
        <div class="container">
            <div class="row" style="margin-top:20px;">
              <?php   
                while($row=$result->fetch(PDO::FETCH_ASSOC))
                {
                    ?>
                    <div class="col-md-3 col-6">
                        <div class="cardImg">
                            <a href="productDetails.php?id=<?php echo  $row['id']; ?>">
                                <img src="product_portfolio_image/<?php echo $row['product_image']; ?>" alt="myproduct">
                            </a>
                        </div>
                        <div class="cardDes">
                            <a href="productDetails.php?id=<?php echo $row['id']; ?>" class="normalA">
                                <h5 class="HeadersB"><?php echo $row['product_name']; ?></h5>
                            </a>
                            <p> <?php echo $row['category_name']; ?> / available</p>
                        </div>
                    </div>
               <?php } ?>
                


            </div>
        </div>
</div>

<!-- pagination starts -->

<nav aria-label="Page navigation example" style="margin-top:40px; margin-bottom:90px;">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>

<div>
    <?php include('footer.html') ?>
</div>


<!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::: -->
    





<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>


</body>
</html>