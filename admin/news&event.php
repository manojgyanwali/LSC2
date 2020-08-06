<?php 
include('../includes/dbcon.php');
session_start();
if(isset($_SESSION['is_login']))
{
   echo "";
}
else
{
   header('location:index.php');
}

if(isset($_REQUEST['add_news_and_events']))
    {

    $heading=$_REQUEST['heading'];
    $description=$_REQUEST['description'];
    $date = date("Y-m-d");
    

    
    $tempname=$_FILES['file']['tmp_name'];
    $image_name=$_FILES['file']['name'];
    
   
   move_uploaded_file($tempname,"../images/news_and_events_images/".$image_name);
    
    $qry="insert into news_and_events(image,title,description,date) values (?,?,?,?)";
         $result=$conn->prepare($qry);
         $result->bindParam(1,$image_name,PDO::PARAM_INT);
         $result->bindParam(2,$heading,PDO::PARAM_STR);
         $result->bindParam(3,$description,PDO::PARAM_STR);
         $result->bindParam(4,$date,PDO::PARAM_LOB);
         
       $result->execute();
         
    

    }

?>










<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News and Event</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
</head>
<body>
       
<div class="sidebar">
<?php include('sidebarNav.html') ?>
</div>
    <div class="home">
        <div class="homeContent">
            <div class="container" style="padding-left:140px;">
                    <div class="topSections">
                        <h1>News and Event</h1>
                        <p class="text-muted">Admin/news&event</p>
                    </div>

                    <div class="pills-Section">
                             
                    <!-- pills begins from here  -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#news" role="tab" aria-controls="home" aria-selected="true">Add News</a>
                       
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#vNews" role="tab" aria-controls="profile" aria-selected="false">View News</a>
                        </li>
                       
                        
                    </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- add news  -->
                            <div class="tab-pane fade show active" id="news" role="tabpanel" aria-labelledby="home-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add News</h4>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="contents" style="padding:20px;">
                                        <label>Upload News Image </label> <br>
                                        <input type="file" name="file" placeholder="Choose File" required><br><br>

                                        <label for="">Add News Heading</label>
                                        <input type="text" name="heading" class="form-control col-md-6" required><br>

                                    
                                        <label for="">News Details</label>
                                        <!-- <textarea name="description" class="form-control"  id="" cols="20" rows="10" ></textarea> -->
                                         <textarea class="form-control" name="description" id="" cols="20" rows="10"></textarea> 


                                            <br><br>
                                        <button type="submit" name="add_news_and_events" class="btn btn-info">Publish News</button>
                                    </div>
                                </form>
                            </div>
                           

                            <!-- view images -->
                                <?php 
                                    $qry2="select *from news_and_events";
                                    $result2=$conn->prepare($qry2);
                                    $result2->execute();
                                ?>

                            <div class="tab-pane fade" id="vNews" role="tabpane1" aria-labelledby="view-eomployee">
                                <h4 style="margin-top:30px;margin-left:20px; float:left;">View Dealer</h4>
                                <div class="col-md-6" style="float:right; margin-top:30px">
                    <form action="product_search.php" method="POST" id="forms">
                        <div class="input-group mb-3" id="searchSection">
                            <input type="text" name="search_box" class="form-control" placeholder="What are you looking for?">
                            <div class="input-group-prepend">
                            <button type="submit" class="input-group-text" name="search" style="background:#2d5f2e;color:white;"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
            </div>

                                <div class="contents" style="padding:20px;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">News Heading</th>
                                            <th scope="col">EDIT | DELETE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                while($row2=$result2->fetch(PDO::FETCH_ASSOC))
                                                    {
                                            ?>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>
                                                    <?php echo $row2['date']; ?>
                                                </td>
                                                <td> <?php echo $row2['title']; ?></td>
                                                <td>
                                                    <a  href="edit_news_and_events.php?id=<?php echo  $row2['id']; ?>"><i class="fa fa-edit" style="font-size:larger;"></i></a>
                                                    <span style="border: 1px solid black; margin: 5px 10px;"></span>
                                                    <a onclick=" return validate()" href="delete_news_and_events.php?id=<?php echo $row2['id']; ?>"><i class="fas fa-trash-alt" style="font-size:larger;color:red;"></i></a>
                                                </td>
                                            </tr>
                                                    <?php }?>
                                            

                                            
                                            
                                        </tbody>
                                        
                                    </table>
                                </div>

                            </div>
                            
                           
                        </div>
                    </div>
            </div>
        </div>
    </div>

   
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/jquery-3.3.1.slim.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>

<script>
function validate()
{
    var sure=confirm("Are you sure wants to delete this data ?");
    if(sure==true)
    {
        return true;
    }
    else
    {
        return false;
    }
}
</script>
</body>
</html>