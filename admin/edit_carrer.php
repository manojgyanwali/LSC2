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

if(isset($_REQUEST['Update_vacancy']))
    {

    $title=$_REQUEST['title'];
    
    

    
    $tempname=$_FILES['file']['tmp_name'];
    $vacancy_file=$_FILES['file']['name'];
    
   
    move_uploaded_file($tempname,"../images/carreer_images/".$vacancy_file);
    $qry="update carrer_opportunities set file='$vacancy_file', title='$title',date=curdate() where id={$_REQUEST['id']}" ;

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
                        <h1>Career Opportunities</h1>
                        <p class="text-muted">Admin/career</p>
                    </div>

                    <div class="pills-Section">
                             
                    <!-- pills begins from here  -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#career" role="tab" aria-controls="home" aria-selected="true">Publish Vacancy</a>
                       
                       
                       
                        
                    </ul>
                    <!--edit vacancy  -->
                            <?php $qry="select *from carrer_opportunities  where id=?";
                                $result=$conn->prepare($qry);
                                $result->bindParam(1,$id);
                                $id=$_REQUEST['id'];
                                $result->execute();
                                $data=$result->fetch(PDO::FETCH_ASSOC);
                            ?>

                            <div class="tab-pane fade show active" id="career" role="tabpanel" aria-labelledby="home-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add News</h4>
                                <div class="contents" style="padding:20px;">
                                    <form action="" method="POST"  enctype="multipart/form-data">
                                        <label>Upload PDF file</label> <br>
                                        <input type="file" name="file" placeholder="Choose File" required><br><br>

                                        <label for="">Add Vacancy Title</label>
                                        <input type="text" value="<?php echo $data['title']; ?>" name="title"  class="form-control col-md-6" required><br>

                                    
                                        <button type="submit" name="Update_vacancy" class="btn btn-info">Update Vacancy</button>
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