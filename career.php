<?php
include('includes/dbcon.php');
            $qry="select *from carrer_opportunities";
            $result=$conn->prepare($qry);
            $result->execute();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Opportunies</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" href="css/header.css">

</head>
<body>
<?php include('header.php')?>

<div class="career">
    <div class="layer2">
        <div class="head">
            <h2>OPEN DOORS FOR INNOVATIVE PEOPLE</h2>
        </div>
        <div class="container vConainer">
        <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="vh">
                        <h3 class="HeadersB">Current Vacancies</h3>
                        <p class="mcf">Drop your cv at : hr@LSC.com</p>
                    </div>
                    <div class="vacancy">
                            <?php 
                            while($row=$result->fetch(PDO::FETCH_ASSOC))
                            {

                            
                            
                            ?>
                        <div class="row">
                            <div class="col-md-8">
                                <a href="#" class="pdf"><img src="images/carreer_images/<?php echo $row['file']; ?>" alt=""></a>
                                <h4 class="HeadersB" style="margin-top:10px;"><?php echo $row['title'];?></h4>
                                <p class="mcf"><?php echo $row['date'];?></p>
                            </div>
                            <div class="col-md-4">
                                <a href="images/carreer_images/<?php echo $row['file']; ?>" target="_download" class="downloadBtn">Download</a>
                            </div>
                        </div>
                             <?php   } ?>

                        <div class="row">
                            <div class="col-md-8">
                                <a href="#" class="pdf"><img src="images/pdf.png" alt=""></a>
                                <h4 class="HeadersB" style="margin-top:10px;">Vacancy Announcement From LSC</h4>
                                <p class="mcf">25th july, 2020</p>
                            </div>
                            <div class="col-md-4">
                                <button class="downloadBtn">Download</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <a href="#" class="pdf"><img src="images/pdf.png" alt=""></a>
                                <h4 class="HeadersB" style="margin-top:10px;">Vacancy Announcement From LSC</h4>
                                <p class="mcf">25th july, 2020</p>
                            </div>
                            <div class="col-md-4">
                                <button class="downloadBtn">Download</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <a href="#" class="pdf"><img src="images/pdf.png" alt=""></a>
                                <h4 class="HeadersB" style="margin-top:10px;">Vacancy Announcement From LSC</h4>
                                <p class="mcf">25th july, 2020</p>
                            </div>
                            <div class="col-md-4">
                                <button class="downloadBtn">Download</button>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>

    
</body>
</html>