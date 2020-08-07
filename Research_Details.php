<?php 

include('includes/dbcon.php');
if(isset($_REQUEST['id']))
{
$qry="select *from on_going_research where id=?";
$result=$conn->prepare($qry);
$result->bindParam(1,$id);
$id=$_REQUEST['id'];


$result->execute();
$data=$result->fetch(PDO::FETCH_ASSOC);
}
else
{
$qry="select *from top_research where id=?";
$result=$conn->prepare($qry);
$result->bindParam(1,$id);
$id=$_REQUEST['ids'];


$result->execute();
$data=$result->fetch(PDO::FETCH_ASSOC);
}





?>





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

<!-- research detail  -->
<div class="rdetail">
    <div class="container">
                <h2>
                    <?php echo $data['title']; ?>
                </h2>
                <span><i class="fas fa-clock"></i><?php echo $data['date']; ?></span>

                <!-- images section  -->
                <img src="images/research_images/<?php echo $data['image']; ?>" alt="" class="img-fluid ongoingR">
                <p class="text-muted">
                        <?php echo $data['description'] ?> 
                </p>               
                <!-- facebook share  -->
                <iframe src="https://www.facebook.com/plugins/share_button.php?href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&layout=button&size=large&width=77&height=28&appId"
                                    width="77" 
                     height="40" 
                     style="border:none;overflow:hidden" 
                     scrolling="no" 
                     frameborder="0" 
                     allowTransparency="true" 
                     allow="encrypted-media">
                </iframe>

                <!-- Research Gallery  -->

                <div class="ResearchGallery">
                    <h3>Research Gallery</h3>
                    <div class="row">
                        <div class="col-md-3 col-4">
                            <img src="images/research_images/<?php echo $data['sub_image1']; ?>" alt="" class="rgImg img-fluid ">
                        </div>
                        <div class="col-md-3 col-4">
                            <img src="images/research_images/<?php echo $data['sub_image2']; ?>" alt="" class="rgImg img-fluid ">
                        </div>
                        <div class="col-md-3 col-4">
                            <img src="images/research_images/<?php echo $data['sub_image3']; ?>" alt="" class="rgImg img-fluid ">
                        </div>
                    </div>
                </div>

                <!-- Related content  -->
                <?php 


                        if(isset($_REQUEST['id']))
                        {
                        $qry1="select *from on_going_research ORDER BY RAND() limit 3 ";
                        $result1=$conn->prepare($qry1);
                        $result1->bindParam(1,$id1);
                        $id1=$_REQUEST['id'];


                        $result1->execute();
                        
                        }
                        else
                        {
                        $qry1="select *from top_research ORDER BY RAND() limit 3";
                        $result1=$conn->prepare($qry1);
                        $result1->bindParam(1,$id1);
                        $id1=$_REQUEST['ids'];


                        $result1->execute();
                        
                        }

                ?>


                <div class="RealtedContent">
                    <h3>Related Content</h3>
                    <div class="row">
                            <?php
                                while($data1=$result1->fetch(PDO::FETCH_ASSOC))
                                {

                                
                            ?>
                        <div class="col-md-4">
                            <div class="researchCard">
                                <h5><?php echo $data1['title']; ?></h5>
                                <?php if(isset($_REQUEST['id'])) 
                                {
                                ?>
                                
                                    <a href="Research_Details.php?id=<?php echo $data1['id'] ?>">View Research Details</a>
                                <?php
                                }
                                else
                                {
                                ?>
                                    <a href="Research_Details.php?ids=<?php echo $data1['id'] ?>">View Research Details</a>

                                <?php 
                                    }
                                ?>  
                                

                            </div>
                        </div>
                                <?php } ?>

                        <div class="col-md-4">
                            <div class="researchCard">
                                <h5>Some Resarch program title goes here like this</h5>
                                <a href="#">View Research Details</a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="researchCard">
                                <h5>Some Resarch program title goes here like this</h5>
                                <a href="#">View Research Details</a>
                            </div>
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