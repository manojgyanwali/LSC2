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

// ************update news_and_events********************************

    if(isset($_REQUEST['update_news_and_events']))
    {
        $heading=$_REQUEST['heading'];
        $description=$_REQUEST['description'];
    
    
    
        $tempname=$_FILES['file']['tmp_name'];
        $image_name=$_FILES['file']['name'];
        
       
       move_uploaded_file($tempname,"../images/news_and_events_images/".$image_name);
        $qry="update  news_and_events set image='$image_name',title='$heading',description='$description',date=curdate() where id={$_REQUEST['id']}";
        $conn->query($qry);
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
                       
                        
                       
                        
                    </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- add news  -->
                            <?php $qry="select *from news_and_events  where id=?";
                                $result=$conn->prepare($qry);
                                $result->bindParam(1,$id);
                                $id=$_REQUEST['id'];
                                $result->execute();
                                $data=$result->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <div class="tab-pane fade show active" id="news" role="tabpanel" aria-labelledby="home-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add News</h4>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="contents" style="padding:20px;">
                                        <label>Upload News Image </label> <br>
                                        <input type="file" name="file" placeholder="Choose File" required><br><br>

                                        <label for="">Add News Heading</label>
                                        <input type="text" value="<?php echo $data['title']; ?>" name="heading" class="form-control col-md-6" required><br>

                                    
                                        <label for="">News Details</label>
                                        <textarea name="description" class="form-control" name="" id="" cols="20" rows="10" required><?php echo $data['description']; ?></textarea>

                                            <br><br>
                                        <button type="submit" name="update_news_and_events" class="btn btn-info">Publish News</button>
                                    </div>
                                </form>
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
</body>
</html>