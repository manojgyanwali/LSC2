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

    <!-- gallery css  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">

</head>
<body>
<?php include('header.php') ?>

<div class="profileHead">
    <div class="container-fluid profileLeft">
        <div class="row">
            <div class="col-md-7" >
                <h2 class="HeadersB" style="margin-top:60px;">
                Committed to helping farmers in best possible ways
                    </h2>
                        <p class="text-muted" style="margin-top:20px">
                        Being the first private cereal seed company of Nepal, Lumbini Seed company has established itself as the reliable seed resource center since 2006. The company has successfully produced improved seeds, source seeds and OP variety seed considering the farmers demand all over Nepal. The company has taken lead in different national and international agricultural projects such as KUBK project, PACT,NSAF, CIMMYT. The company has developed world class infrastructure required for seed production, research and development such as seed lab, cold rooms and processing plants. The company achieved its major milestone; first ever production of maize and rice hybrid seeds in 2019 AD.                    </p>

                    <a href="contact.php">
                    <button class="btnMaster" style="margin-top:20px;"> Contact us </button>
                    </a>
            </div>
            <div class="col-md-5">
            <img src="images/profile.jpg" style="max-width:100%; float:right;">

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
                    OUR MISSION, VISION & GOAL
                </h3>
                <p>
                Lumbini Seed Company is dedicated towards the well being of farmers through quality seed production. The prime mission of the company is to replace unproductive OP varieties through their maintenance and boosting hybrid seed production. The major goal is production, processing and marketing of high quality seeds to meet the national demand and enhance export.                </p>
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
                    <h3 class="HeadersB">Subash Raj Upadhyay</h3>
                    <i><b><p>Chair person</p></b></i>
                    <br>
                    <p>
                    Greetings to all national, international organizations and scientists related in seed production, seed users and marketing personnel working as a bridge between company and the farmers. We are the beginners and there is still a long journey to accomplish in the seed sector There are lot of challenges and oppurtunities in this job. I am sure that one day we will be able to export our high quality OP as well as hybrid seeds in international market. To achieve this target we must work together with minimum margin of benefit honestly including all the seed value chain sectors. I also request to the seed related ministries, scientists, policy makers, bureaucrates media people, national and international organizations to focus on commercialization of seed production, processing and marketing through private seed company.                    </p>
                </div>
                <div class="col-md-4">
                    <img src="images/ceo.jpg" class="img-fluid" alt="" style="width:90%;">
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

        <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Management Group</h1>
            <hr class="mt-2 mb-5">

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
            </div>
              
                <!-- our group starts here  -->
                <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Our Team</h1>
                <hr class="mt-2 mb-5">

                <div class="row">
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

<!-- image gallery  -->

<div class="container gallery-container">

<h1 class="font-weight-bold text-center">Image Gallery</h1>
<p class="page-description text-center">Some memorable collections of LSC</p>
    <hr class="mt-2 mb-5">


<div class="tz-gallery">

    <div class="row">

        <div class="col-6 col-sm-6 col-md-4">
            <div class="thumbnail">
                <a class="lightbox" href="images/park.jpg">
                    <img src="images/park.jpg" alt="Park">
                </a>
                <div class="caption">
                    <h3>Thumbnail label</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-4">
            <div class="thumbnail">
                <a class="lightbox" href="images/bridge.jpg">
                    <img src="images/bridge.jpg" alt="Bridge">
                </a>
                <div class="caption">
                    <h3>Thumbnail label</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-4">
            <div class="thumbnail">
                <a class="lightbox" href="images/tunnel.jpg">
                    <img src="images/tunnel.jpg" alt="Tunnel">
                </a>
                <div class="caption">
                    <h3>Thumbnail label</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-4">
            <div class="thumbnail">
                <a class="lightbox" href="images/coast.jpg">
                    <img src="images/coast.jpg" alt="Coast">
                </a>
                <div class="caption">
                    <h3>Thumbnail label</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-4">
            <div class="thumbnail">
                <a class="lightbox" href="images/rails.jpg">
                    <img src="images/rails.jpg" alt="Rails">
                </a>
                <div class="caption">
                    <h3>Thumbnail label</h3>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-md-4">
            <div class="thumbnail">
                <a class="lightbox" href="images/traffic.jpg">
                    <img src="images/traffic.jpg" alt="Traffic">
                </a>
                <div class="caption">
                    <h3>Thumbnail label</h3>
                </div>
            </div>
        </div>
    </div>

</div>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
baguetteBox.run('.tz-gallery');
</script>

<!-- image gallery end  -->


<!-- our partners starts  -->
        <?php
            $qry2="select *from partner_data";
            $result2=$conn->prepare($qry2);
            $result2->execute();

        ?>
<div class="partners">
    <div class="container">
        

    <h1 class="font-weight-bold text-center">OUR PARTNERS</h1>
    <p class="page-description text-center">Collabrative partners of Lumbini Seed Company</p>
    <hr class="mt-2 mb-2">


            

            <div class="partnerLogo mb-5">
                <div class="row justify-content-center">
                        <?php
                            
                            while($row2=$result2->fetch(PDO::FETCH_ASSOC))
                            {
                        ?>
                    <div class="col-md-3 col-6">
                        <img src="images/partner_images/<?php echo $row2['logo'] ?>" alt="" class="img-fluid">
                    </div>
                        <?php } ?>

                </div>
            </div>
        
    </div>
</div>

<div class="footer">
        <?php include('footer.html')?>
</div>




<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>

    
</body>
</html>