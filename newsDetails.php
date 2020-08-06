<?php 

include('includes/dbcon.php');
$qry="select *from news_and_events where id=?";
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
    <title>News & Event</title>
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
                <h2 class="HeadersB">News & Event</h2>
            </div>
                <div class="col-md-4">
                    <form action="news_search.php" method="POST">

                        <div class="input-group mb-3" id="searchSection">
                            <input type="text" name="news_search" class="form-control" placeholder="What are you looking for?">
                            <div class="input-group-prepend">
                            <button class="input-group-text" id="search" style="background-color:#2D5F2E;color:white;"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

<!-- news details starts  -->
<div class="newsDetails">
    <div class="container">
    <img src="images/news_and_events_images/<?php echo $data['image']; ?>" alt="ddd" style="float:left;padding:0 30px 20px 0;">
    <h2 class="HeadersB">
       <?php echo $data['title']; ?>
    </h2>
    <i class="far fa-clock"></i> <span><?php echo $data['date'];?></span>
    <p class="mute-text" style="padding-top:30px;">
    <?php echo $data['description']; ?>    
    </p>

    </div>
</div>

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

<!-- moreNewsSection starts  -->

<?php 
include('includes/dbcon.php');

$qry1="select *from news_and_events ORDER BY RAND() limit 4";
$result1=$conn->prepare($qry1);
$result1->execute();



?>

<div class="allNews">
    <div class="container">
        <div class="allNewsType">
            <h3 class="HeadersB">More News & Events</h3>
        </div>
        <div class="row">
            <?php
                while( $row1=$result1->fetch(PDO::FETCH_ASSOC) )
                    {
            ?>
                    <div class="col-md-3">
                        <div class="allNewsImg">
                            <a href="newsDetails.php?id=<?php echo $row1['id']?>">
                                <img src="images/news_and_events_images/<?php echo $row1['image']; ?>" alt="">
                            </a>
                        </div>
                        <div class="allNewsH">
                                <a href="newsDetails.php?id=<?php echo $row1['id']?>" class="normalA">
                                <h3 class="HeadersB">
                                <?php echo $row1['title']; ?>
                                </h3>                          
                                </a>
                                <i class="far fa-clock"></i> <span class="mcf"><?php echo $row1['date']; ?></span>
                        </div>
                    </div>
                    <?php } ?>

            

            

            <!-- <div class="col-md-3">
                <div class="allNewsImg">
                    <img src="images/card.png" alt="">
                </div>
                <div class="allNewsH">
                    <h3 class="HeadersB">
                    Headline of the news goes here
                    </h3>
                    <p class="mcf">20th July, 2020</p>
                </div>
            </div> -->

        </div>
    </div>
</div>

<div class="footer" style="margin-top:50px;">
    <?php include('footer.html') ?>
</div>
    

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>

</body>
</html>