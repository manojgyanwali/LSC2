<?php 

include('includes/dbcon.php');

$qry="select *from news_and_events ORDER BY id DESC limit 1";
$result=$conn->prepare($qry);
$result->execute();
$row=$result->fetch(PDO::FETCH_ASSOC);

$qry2="select *from news_and_events ORDER BY id DESC limit 1,1";
$result2=$conn->prepare($qry2);
$result2->execute();
$row2=$result2->fetch(PDO::FETCH_ASSOC);



$qry3="select *from news_and_events ORDER BY id DESC limit 2,1";
$result3=$conn->prepare($qry3);
$result3->execute();
$row3=$result3->fetch(PDO::FETCH_ASSOC);



?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumbini Seed Company</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" href="css/header.css">

    <!-- for testimonial  -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>
<body>
     <?php include('header.php') ?>

    <div class="HomeSlider">
        <div class="container">
            <div class="row">

            <!-- slider goes here  -->
                <div class="col-md-8 slider">

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="newsDetails.php?id=<?php echo  $row['id'] ?>">
                                 <img class="d-block w-100 carousalImg" src="images/news_and_events_images/<?php echo $row['image']; ?>"   alt="First slide">
                                 <div class="carousel-caption" style="text-align:left; margin-left:0px; padding:20px 10px;">
                                        <h5><?php echo $row['title']; ?></h5>
                                        <p>It is a long established fact that a reader will be distracted by the readable </p>
                                 </div>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="newsDetails.php?id=<?php echo  $row2['id'] ?>">
                                 <img class="d-block w-100 carousalImg" src="images/news_and_events_images/<?php echo $row2['image']; ?>"  alt="Second slide">
                                    <div class="carousel-caption" style="text-align:left; margin-left:0px; padding:20px 10px;">
                                        <h5><?php echo $row2['title']; ?></h5>
                                        <p>  </p>
                                    </div>
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a href="newsDetails.php?id=<?php echo  $row3['id'] ?>">
                                <img class="d-block w-100 carousalImg" src="images/news_and_events_images/<?php echo $row3['image']; ?>" alt="Third slide">
                                <div class="carousel-caption" style="text-align:left; margin-left:0px; padding:20px 10px;">
                                        <h5><?php echo $row3['title']; ?></h5>
                                        <p>...</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>

            <!-- recent new & event goes here  -->
                    <?php
                        $qry4="select *from news_and_events order by id desc limit 3,3";
                        $result4=$conn->prepare($qry4);
                        $result4->execute();
                    ?>
                <div class="col-md-4">

                    <h4 class="HeadersB">
                        Recent News & Event
                    </h4 class="HeadersB">

                    <Table class="table" style="margin-top:10px;">
                        <?php while($row4=$result4->fetch(PDO::FETCH_ASSOC))
                            {
                        ?>
                        <tr>
                            <td width="40%">
                                <a href="newsDetails.php?id=<?php echo  $row4['id'] ?>"><img src="images/news_and_events_images/<?php echo $row4['image']; ?>" alt="" class="img-fluid"></a>
                            </td>
                            <td width="60%">
                                <a href="#" class="normalA"><h6 class="HeadersB">
                                <?php echo $row4['title']; ?>
                                </h6></a>
                                <small class="text-muted">
                                <i class="far fa-clock"></i> <span><?php echo $row4['date']; ?></span>
                                </small>
                            </td>
                        </tr>
                            <?php 
                                } 
                            ?>


                        <tr>
                            <td width="40%">
                                <a href="#"><img src="images/news.png" alt="" class="img-fluid"></a>
                            </td>
                            <td width="60%">
                                <a href="#" class="normalA"><h6 class="HeadersB">
                                Farmers has been 
                                noticed about the virus 
                                </h6></a>
                                <small class="text-muted">
                                <i class="far fa-clock"></i> <span>6 june, 2020</span>
                                </small>
                            </td>
                        </tr>

                    </Table>

                </div>

            </div>
        </div>
    </div>

    <!-- slogon  -->
    <div class="slogon">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="HeadersB">
                        Seed Company Slogon Goes Here
                    </h1>
                    <h5>Welcome to the Lumbini Seed Company</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- headFeatures  -->
    <div class="headFeatures">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 col-4">
                    <img src="images/s1.png" alt="" style="margin:20px 0 40px 2vw; padding:0 30px;" class="img-fluid">
                    <h2 class="HeadersB" style="text-transform:uppercase;text-align:center; padding:0 30px;"> We Innovate Seed For Life</h2>
                </div>
                <div class="col-md-4 col-4">
                    <img src="images/s2.png" alt="" style="margin:20px 0 40px 2vw; border-left:1px solid grey; border-right:1px solid grey; padding:0 2vw;"class="img-fluid">
                    <h2 class="HeadersB" style="text-transform:uppercase;text-align:center; padding:0 30px;"> We Provide Seeds All over nepal</h2>
                </div>
                <div class="col-md-4 col-4">
                    <img src="images/s3.png" alt="" style="margin:20px 0 40px 2vw; padding:0 30px;" class="img-fluid">
                    <h2 class="HeadersB" style="text-transform:uppercase;text-align:center; padding:0 30px;"> We help every farmers</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- about  -->
    <div class="aboutSection">
        <div class="container">
            <div class="aboutH">
                <h2 class="HeadersB">Imagine the farming, Imagine Living</h2>
                <p style="font-style:italic;">Who We Are ?</p>
            </div>

            <div class="whiteSection">
                <div class="row">
                    <div class="col-md-8">
                        <h3 class="HeadersB"> Lumbini Seed Company</h3>
                        <h5 style="font-style:italic; color:#2d5f2e;">About us</h5>

                        <p style="padding:10px 0">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,24 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        </p>
                        <a href="#"><button class="btn btn-info">More About Us</button></a>
                    </div>
                    <div class="col-md-4" style="padding:20px;">
                        <img src="images/company.png" class="img-fluid">
                    </div>
                </div>
            </div>

            <!-- features sections starts  -->
            <div class="features">
                <div class="row justify-content-center">
                    <div class="col-md-3 col-6">
                        <div class="img">
                            <img src="images/f.png" alt="">
                        </div>
                        <div class="Fdescription">
                            <h6 class="HeadersB">
                                Key Feature 1
                            </h6>
                            <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="img">
                            <img src="images/f.png" alt="">
                        </div>
                        <div class="Fdescription">
                            <h6 class="HeadersB">
                                Key Feature 1
                            </h6>
                            <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="img">
                            <img src="images/f.png" alt="">
                        </div>
                        <div class="Fdescription">
                            <h6 class="HeadersB">
                                Key Feature 1
                            </h6>
                            <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="img">
                            <img src="images/f.png" alt="">
                        </div>
                        <div class="Fdescription">
                            <h6 class="HeadersB">
                                Key Feature 1
                            </h6>
                            <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- explore our products -->
    <?php $qry5="select *from product_portfolio order by RAND() limit 4";
        $result5=$conn->prepare($qry5);
        $result5->execute();
    ?>

    <div class="exploreProduct">
        <div class="container">
            <h3 class="HeadersB">Explore Our Products</h3>
            <h6 style="font-style:italic;color:#2D5F2E">Since 2000</h6>
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
                        <p> <?php echo $row5['category_name']?> / available</p>
                    </div>
                </div>
                <?Php } ?>

                
                

                

                <div class="col-md-3 col-6">
                    <div class="cardImg">
                        <img src="images/product.png" alt="myproduct">
                    </div>
                    <div class="cardDes">
                        <h5 class="HeadersB">Seed Product Rice w23</h5>
                        <p> category / available</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="testimonials">
    <div class="container">
        
    </div>
    </div>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>

</body>
</html>