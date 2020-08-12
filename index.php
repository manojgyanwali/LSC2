<?php 

include('includes/dbcon.php');
if(isset($_REQUEST['add_message']))
{

$name=$_REQUEST['name'];
$address=$_REQUEST['address'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$message=$_REQUEST['message'];


$qry="insert into users_feedback(name,address,phone,email,message) values (?,?,?,?,?)";
$result=$conn->prepare($qry);
$result->bindParam(1,$name,PDO::PARAM_INT);
$result->bindParam(2,$address,PDO::PARAM_STR);
$result->bindParam(3,$phone,PDO::PARAM_STR);
$result->bindParam(4,$email,PDO::PARAM_LOB);
$result->bindParam(5,$message,PDO::PARAM_STR);

$result->execute();
}



//::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
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
                    <h2 class="HeadersB">
                        SEED SECURITY IS FOOD SECURITY
                    </h2>
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
                    <img src="images/s1.png" alt="" class="img-fluid seedFpic">
                    <h2 class="HeadersB seedF"> We Innovate Seed For Life</h2>
                </div>
                <div class="col-md-4 col-4">
                    <img src="images/s2.png" alt=""class="img-fluid seedFpic2">
                    <h2 class="HeadersB seedF"> We Provide Seeds All over nepal</h2>
                </div>
                <div class="col-md-4 col-4">
                    <img src="images/s3.png" alt="" class="img-fluid seedFpic">
                    <h2 class="HeadersB seedF"> We help every farmers</h2>
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
                        Established in 2002 AD, Lumbini Seed Company is the first cereal seed company in Nepal. It is registered under the company act 2053 in Siddharthanagar-7, Rupandehi. The company has started F/S seed production after the approval of Seed board of Nepal on 2005 AD. Since then, seed multiplication and hybrid seed production programs with active involvement of farmers, dealers, national and international organizations is being conducted. We are moving forward in the process of making Nepal a seed secure and seed sustainable country.                        </p>
                        <a href="profile.php"><button class="btn btn-info">More About Us</button></a>
                    </div>
                    <div class="col-md-4" style="padding:20px;">
                        <img src="images/company.jpg" class="img-fluid">
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
                            Varietal Development & Maintainenacne
                            </h6>
                            <p>
                            Competitive and sufficient seed stock of new promising lines of OP and Hybrid                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="img">
                            <img src="images/f.png" alt="">
                        </div>
                        <div class="Fdescription">
                            <h6 class="HeadersB">
                            Seed Multiplication
                            </h6>
                            <p>
                            Adequate quantity of seeds multiplied through standard cycle of seed production                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="img">
                            <img src="images/f.png" alt="">
                        </div>
                        <div class="Fdescription">
                            <h6 class="HeadersB">
                            Seed Processing & Marketing
                            </h6>
                            <p>
                            Good quality of required seed distributed at the right time and right place at an affordable price
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="img">
                            <img src="images/f.png" alt="">
                        </div>
                        <div class="Fdescription">
                            <h6 class="HeadersB">
                            Seed Use
                            </h6>
                            <p>
                            Quality seeds of preferred varieties accessible to farmers
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

            </div>
        </div>
    </div>

    <!-- testimonial begins  -->

    <div class="testimonials">
        <div class="layert">
            <div class="upperContent">
               <h2 class="text-center font-weight-light" style="color:white;">Happy Customers About Us</h2>
               <p class="text-center" style="color:#FFE77B;"><i>Testimonials</i></p>
            </div>
        <div class="container">
                <div class="testimonialCard">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="img-container">
                                <img src="images/rails.jpg" id="tImg" alt="" style=" border-radius:2220px;" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <p id="mytext">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type </p>
                            <br>
                            <h4 id="name"> Ashish Khanal</h4>
                            <p class="text-muted" id="jobtitle"><i>Farmer</i></p>
                        </div>
                    </div>

                    <div class="tbuttons text-center">
                        <div class="row justify-content-center">
                        
                            <i class="prev fas fa-angle-left"></i>
                            <i class="next fas fa-angle-right"></i>
                        
                            
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </div>

    <!-- connect with us  -->
    <div class="socialConnect">
        <div class="container">
            <h3 class="text-center font-weight-bold">FOLLOW US THROUGH SOCIAL MEDIA</h3>
            <div class="socialmedia">
                <a href="#" class="normalA">
                <i class="fab fa-facebook-square"></i>
                </a>
                <a href="#" class="normalA">
                <i class="fab fa-instagram-square"></i>
                </a>
                <a href="#" class="normalA">
                <i class="fab fa-twitter-square"></i>
                </a>
            </div>
        </div>

    </div>

    <!-- contact us  -->
    <div class="contact">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="indexcontent">
                    <h1 class="HeadersB text-center">Let's Connect</h1>
                    <p class="text-center"><i>contact us</i></p>
                </div>                    
                    <form action="" method="POST">
                    
                        <div class="form-row">
                           <div class="form-group col-md-6">
                               <input type="text" name="name"  class="form-control form-control-lg" id="inputName" placeholder="Full Name" required>
                           </div>
                           <div class="form-group col-md-6">
                               <input type="text" name="address" class="form-control form-control-lg" id="inputAddress" placeholder="Address" required>
                           </div>
                        </div>
                       

                        <div class="form-row">
                           <div class="form-group col-md-6">
                               <input type="email" name="email" class="form-control form-control-lg" id="inputEmail" placeholder="Email" required>
                           </div>
                           <div class="form-group col-md-6">
                               <input type="text" name="phone" class="form-control form-control-lg" id="inputPhone" placeholder="Phone" required>
                           </div>
                        </div>

                        <div class="form-group">
                           <textarea  name="message" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3" placeholder="Your Message" required></textarea>
                        </div>

                        <div class="form-group">
                           <button  type="submit" name="add_message" class="btn btn-info">Submit</button>
                        </div>
                   </form>
                </div>
        </div>
            </div>
    </div>

    <div class="footer">
        <?php include('footer.html')?>
    </div>

    <script src="js/master.js"></script>

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>

</body>
</html>