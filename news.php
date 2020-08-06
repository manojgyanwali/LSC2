<?php 
include('includes/dbcon.php');

$qry="select *from news_and_events ORDER BY id DESC limit 1";
$result=$conn->prepare($qry);
$result->execute();
$row=$result->fetch(PDO::FETCH_ASSOC)



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

<!-- image highlight seciton  -->
<?php 
include('includes/dbcon.php');

$qry2="select *from news_and_events ORDER BY id DESC limit 1,2";
$result2=$conn->prepare($qry2);
$result2->execute();





?>
<div class="imgHightlight">
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <a href="newsDetails.php?id=<?php echo $row['id'] ?>">
                    <img src="images/news_and_events_images/<?php echo $row['image']; ?>" class="highlightImg" alt="">
                </a>
                
                <a href="newsDetails.php?id=<?php echo $row['id']; ?>" class="normalA">
                    <h2 class="HeadersB"><?php echo $row['title']; ?></h2>
                </a>
                <p class="mcf"><?php echo $row['date']; ?></p>
                <p class="text-muted newsHeadP">
                <?php echo $row['description']; ?>                </p>
            </div>
            
            <div class="col-md-4">
                <div class="rencentH">
                    <h4 class="HeadersB">Recent News & Event</h4>

                    <!-- recent news section  -->

                    <Table class="table" style="margin-top:10px;">
                        <?php
                        while( $row2=$result2->fetch(PDO::FETCH_ASSOC) )
                        {
                        ?>
                        <tr>
                            <td width="40%">
                                <a href="newsDetails.php?id=<?php echo $row2['id']; ?>"><img src="images/news_and_events_images/<?php echo $row2['image']; ?>" alt="" class="img-fluid" style="max-height:80px;width:100%;"></a>
                            </td>
                            <td width="60%">
                                <a href="newsDetails.php?id=<?php echo $row2['id']?>" class="normalA"><h6 class="HeadersB">
                                <?php echo $row2['title']; ?> 
                                </h6></a>
                                <small class="text-muted">
                                <i class="far fa-clock"></i> <span><?php echo $row2['date']; ?></span>
                                </small>
                            </td>
                        </tr>
                        <?php } ?>

                    </Table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- all news and event section  -->
<?php 
include('includes/dbcon.php');

$qry3="select *from news_and_events ORDER BY id DESC";
$result3=$conn->prepare($qry3);
$result3->execute();




?>

<div class="allNews">
    <div class="container">
        <div class="allNewsType">
            <h3 class="HeadersB">All News & Event</h3>
        </div>
        <div class="row">
            <?php while($row3=$result3->fetch(PDO::FETCH_ASSOC)) {?>
                <div class="col-md-3">
                    <div class="allNewsImg">
                        <a href="newsDetails.php?id=<?php echo $row3['id']; ?>">
                            <img src="images/news_and_events_images/<?php echo $row3['image']; ?>" alt="">
                        </a>
                    </div>
                    <div class="allNewsH">
                            <a href="newsDetails.php?id=<?php echo $row3['id']; ?><" class="normalA">
                            <h5 class="HeadersB">
                            <?php echo $row3['title']; ?>
                            </h5>                          
                            </a>
                            <i class="far fa-clock"></i> <span class="mcf"><?php echo $row3['date']; ?></span> <p></p>
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

<div class="footer">
    <?php include('footer.html') ?>
</div>





<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>

</body>
</html>