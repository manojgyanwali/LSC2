<?php 

include('includes/dbcon.php');
if(isset($_REQUEST['news_search']))

{
    $search=$_REQUEST['news_search'];
}
else
{
    $search="";
}




$qry="select *from news_and_events where title like '%$search%'";
$result=$conn->prepare($qry);
$result->execute();
    
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
                            <button type="submit" name="search_button" class="input-group-text" id="search" style="background-color:#2D5F2E;color:white;"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>




<!-- all news and event section  -->



<div class="allNews">
    <div class="container">
        
        <div class="row">
            <?php while($row=$result->fetch(PDO::FETCH_ASSOC)) {?>
                <div class="col-md-3">
                    <div class="allNewsImg">
                        <a href="newsDetails.php?id=<?php echo $row['id']; ?>">
                            <img src="images/news_and_events_images/<?php echo $row['image']; ?>" alt="">
                        </a>
                    </div>
                    <div class="allNewsH">
                            <a href="newsDetails.php?id=<?php echo $row['id']; ?>" class="normalA">
                            <h3 class="HeadersB">
                            <?php echo $row['title']; ?>
                            </h3>                          
                            </a>
                        <p class="mcf"><?php echo $row['date']; ?></p>
                    </div>
                </div>
            <?php } ?>

            

            

            

            

            <div class="col-md-3">
                <div class="allNewsImg">
                    <img src="images/card.png" alt="">
                </div>
                <div class="allNewsH">
                    <h3 class="HeadersB">
                    Headline of the news goes here
                    </h3>
                    <p class="mcf">20th July, 2020</p>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>

</body>
</html>