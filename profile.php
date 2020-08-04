<?php 
include('includes/dbcon.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company's profile </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" href="css/header.css">

</head>
<body>
<?php include('header.php') ?>

<div class="profileHead">
    <div class="container-fluid" style="padding-left:140px;">
        <div class="row">
            <div class="col-md-7" >
                <h2 class="HeadersB" style="margin-top:60px;">
                        We are leading company in 
                        this field, And provide specific 
                        our every customers.
                    </h2>
                        <p class="text-muted" style="margin-top:20px">
                        Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap text of the printing and typesetting industry.Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap text of the printing and typesetting industry.Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been 
                    </p>

                    <a href="contact.php">
                    <button class="btnMaster" style="margin-top:20px;"> Contact us </button>
                    </a>
            </div>
            <div class="col-md-5">
            <img src="images/profile.png" style="max-width:100%; float:right;">

            </div>
        </div>
    </div>
</div>

<!-- vision section starts  -->
<div class="profile">
    <!-- vision board starts here  -->
    <div class="vision">
        <div class="layer">
            <div class="container">
                <h3 class="HeadersB">
                    OUR VISION & MISSION
                </h3>
                <p>
                Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap text of the printing and typesetting industry.Simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived
                </p>
            </div>
        </div>
    </div>

    <!-- management starts here  -->
    <div class="managementTitle">
        <div class="container">
            <h2 class="HeadersB">Management</h2>
            <h5 style="color:#2d5f2e; font-style:italic;">Who is who ?</h5>
        </div>
    </div>
 
    <!-- ceo starts here  -->
    <div class="ceo">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="HeadersB">Elon Mask</h3>
                    <i><b><p>CEO</p></b></i>
                    <br>
                    <p>
                    24Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,24 Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="images/ceo.png" class="img-fluid" alt="" style="width:90%;">
                </div>
            </div>
        </div>
    </div>

    <!-- management team starts here  -->
    <?php
       $qry= "select *from employee_data";
       $result=$conn->prepare($qry);
       $result->execute();
    ?>

    <div class="team">
        <div class="container">
            <div class="row ">
                <?php
                    while($row=$result->fetch(PDO::FETCH_ASSOC))
                    {

                    
                ?>

                <div class="col-md-3 col-6">
                    <div class="photoContainer">
                        <img src="employee_images/<?php echo $row['emp_image']; ?>" alt="" class="img-fluid;">
                    </div>
                    <div class="teamStatus">
                        <h4 class="HeadersB"><?php echo $row['emp_name']; ?></h4>
                        <h6 style="color:#2d5f2e; font-style:italic;"><?php echo $row['emp_position']; ?></h6>
                    </div>
                </div>
                    <?php } ?>

                <div class="col-md-3 col-6">
                    <div class="photoContainer">
                        <img src="images/team.png" alt="" class="img-fluid;">
                    </div>
                    <div class="teamStatus">
                        <h4 class="HeadersB">Elon Mask</h4>
                        <h6 style="color:#2d5f2e; font-style:italic;">Chairperson</h6>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="photoContainer">
                        <img src="images/team.png" alt="" class="img-fluid;">
                    </div>
                    <div class="teamStatus">
                        <h4 class="HeadersB">Elon Mask</h4>
                        <h6 style="color:#2d5f2e; font-style:italic;">Chairperson</h6>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="photoContainer">
                        <img src="images/team.png" alt="" class="img-fluid;">
                    </div>
                    <div class="teamStatus">
                        <h4 class="HeadersB">Elon Mask</h4>
                        <h6 style="color:#2d5f2e; font-style:italic;">Chairperson</h6>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="photoContainer">
                        <img src="images/team.png" alt="" class="img-fluid;">
                    </div>
                    <div class="teamStatus">
                        <h4 class="HeadersB">Elon Mask</h4>
                        <h6 style="color:#2d5f2e; font-style:italic;">Chairperson</h6>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="photoContainer">
                        <img src="images/team.png" alt="" class="img-fluid;">
                    </div>
                    <div class="teamStatus">
                        <h4 class="HeadersB">Elon Mask</h4>
                        <h6 style="color:#2d5f2e; font-style:italic;">Chairperson</h6>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- our partners starts  -->
        <?php
            $qry2="select *from partner_data";
            $result2=$conn->prepare($qry2);
            $result2->execute();

        ?>
<div class="partners">
    <div class="container">
        

                <h2 class="HeadersB" style="text-align:center;">
                    OUR PARTNERS
                </h2>
            

            <div class="partnerLogo">
                <div class="row justify-content-center">
                        <?php
                            
                            while($row2=$result2->fetch(PDO::FETCH_ASSOC))
                            {
                        ?>
                    <div class="col-md-3 col-6">
                        <img src="images/partner_images/<?php echo $row2['logo'] ?>" alt="" class="img-fluid">
                    </div>
                        <?php } ?>

                    <div class="col-md-3 col-6">
                        <img src="images/LOGO1.png" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-3 col-6">
                        <img src="images/LOGO1.png" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-3 col-6">
                        <img src="images/LOGO1.png" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-3 col-6">
                        <img src="images/LOGO1.png" alt="" class="img-fluid">
                    </div>

                    <div class="col-md-3 col-6">
                        <img src="images/LOGO1.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        
    </div>
</div>




<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>

    
</body>
</html>