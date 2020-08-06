<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research & Development</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" href="css/header.css">

</head>
<body>

<?php include('header.php') ?>

    
<!-- head with search section  -->

<div class="headSearch">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="HeadersB">Research & Development</h2>
            </div>
                <div class="col-md-4">
                    <div class="input-group mb-3" id="searchSection">
                        <input type="text" class="form-control" placeholder="What are you looking for?">
                        <div class="input-group-prepend">
                           <button class="input-group-text" id="search" style="background-color:#2D5F2E;color:white;"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<!-- slider section  -->
<div class="TopResearch">
    <div class="container">
        <div class="leftSectionR">
            
            <img src="images/rd1.png" alt="" class="imgR img-fluid">

            <p class="topP">Top Research Program</p>
            <h1 class="topH">Research & development Spending</h1>
            <button class="topBtn">Explore Data</button> <br>

            <button class="customNextBtn"><i class="fas fa-circle"></i></button>
            <button class="customPrevBtn"><i class="fas fa-circle"></i></button>
            
        </div>   
    </div> 
</div>

<!-- research main section  -->
<div class="mainR">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4 class="rProgram">Ongoing Research Program</h4>

                <h2 class="ResearchHead1">
                UIS Releases More Timely Country-Level Data for SDG 9.5 on R&D
                </h2>
                <span><i class="fas fa-clock"></i> 22, July 2020</span>

                <!-- images section  -->
                <a href="Research_Details.php"></a><img src="images/rd2.png" alt="" class="img-fluid ongoingR">

                <p class="text-muted newsHeadP">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has .....
                </p>
                <a href="Research_Details.php">Read more >></a>

                <h2 class="ResearchHead1">
                UIS Releases More Timely Country-Level Data for SDG 9.5 on R&D
                </h2>
                <span><i class="fas fa-clock"></i> 22, July 2020</span>

                <!-- images section  -->
                <a href="Research_Details.php"></a><img src="images/rd2.png" alt="" class="img-fluid ongoingR">

                <p class="text-muted newsHeadP">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has .....
                </p>
                <a href="Research_Details.php">Read more >></a>

            </div>

            <div class="col-md-4">
                <h4 class="rProgram">Our Research Programs</h4>
                <button class="btnMaster">View All</button>

                <div class="researchCard">
                    <h5>Some Resarch program title goes here like this</h5>
                    <a href="#">View Research Details</a>
                </div>

                <div class="researchCard">
                    <h5>Some Resarch program title goes here like this</h5>
                    <a href="#">View Research Details</a>
                </div>

                <div class="researchCard">
                    <h5>Some Resarch program title goes here like this</h5>
                    <a href="#">View Research Details</a>
                </div>

                <div class="researchCard">
                    <h5>Some Resarch program title goes here like this</h5>
                    <a href="#">View Research Details</a>
                </div>
            </div>
        </div>
    </div>
</div>    



<div class="footer" style="margin-top:150px;">
        <?php include('footer.html')?>
    </div>
    
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>

</body>
</html>