<?php

include('../includes/dbcon.php');


//........................  add update on on_going_research.................................

    if(isset($_REQUEST['update_on_going_research']))
    {

    $title=$_REQUEST['title'];
    $description=$_REQUEST['description'];
    $date = date("Y-m-d");
    
    
//main image upload
    
    $tempname=$_FILES['image']['tmp_name'];
    $image_name=$_FILES['image']['name'];
    
   
   move_uploaded_file($tempname,"../images/research_images/".$image_name);

   // sub image1 upload
   $tempname1=$_FILES['image1']['tmp_name'];
   $image_name1=$_FILES['image1']['name'];
   
  
   move_uploaded_file($tempname1,"../images/research_images/".$image_name1);

//sub image2 upload
$tempname2=$_FILES['image2']['tmp_name'];
$image_name2=$_FILES['image2']['name'];
   
  
   move_uploaded_file($tempname2,"../images/research_images/".$image_name2);

//sub image3 upload

   $tempname3=$_FILES['image3']['tmp_name'];
   $image_name3=$_FILES['image3']['name'];
   
  
   move_uploaded_file($tempname3,"../images/research_images/".$image_name3);

    
    $qry="update   on_going_research set image=?,sub_image1=?,sub_image2=?,sub_image3=?,title=?,description=?,date=? where id=?";
         $result=$conn->prepare($qry);
         $result->bindParam(1,$image_name,PDO::PARAM_STR);
         $result->bindParam(2,$image_name1,PDO::PARAM_STR);
         $result->bindParam(3,$image_name2,PDO::PARAM_STR);
         $result->bindParam(4,$image_name3,PDO::PARAM_STR);

         $result->bindParam(5,$title,PDO::PARAM_STR);
         $result->bindParam(6,$description,PDO::PARAM_STR);
         $result->bindParam(7,$date,PDO::PARAM_LOB);
         $result->bindParam(8,$_REQUEST['id'],PDO::PARAM_INT);
         
         
         
       $result->execute();
         
    

    }

//................................add complete research_report.......................................

    
?>
















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research & Development</title>
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
                        <h1>Research & Develoopment</h1>
                        <p class="text-muted">Admin/research</p>
                    </div>

                    <div class="pills-Section">
                             
                    <!-- pills begins from here  -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        
                        <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#ongoingR" role="tab" aria-controls="profile" aria-selected="false">Ongoing Research</a>
                        </li>
                        
                        
                       
                        
                       
                        
                    </ul>
                        <div class="tab-content" id="myTabContent">
                           

                            <!-- ongoing research -->
                            <?php  $qry="select *from on_going_research where id=?";
                                $result=$conn->prepare($qry);
                                $result->bindParam(1,$id);
                                $id=$_REQUEST['id'];
                                $result->execute();
                                $data=$result->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <div class="tab-pane fade show active" id="ongoingR" role="tabpanel" aria-labelledby="profile-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add ongoing research</h4>
                                <div class="container">
                                <form action="" method="POST" enctype="multipart/form-data">
                                <label for="">Add Research title</label>
                                    <input type="text" value="<?php echo $data['title']; ?>" name="title" class="form-control col-md-6" required><br>
                                    <label><b>Upload Research Highlight Image (250*250)</b></label> <br>
                                        <input type="file" name="image" placeholder="Choose File" required><br><br>

                                        <p><b><i>Sub Images</i></b></p>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="file" name="image1" placeholder="Choose File">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" name="image2" placeholder="Choose File">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" name="image3" placeholder="Choose File">
                                            </div>
                                            
                                        </div> <br>

                                    <label for="">Add description</label>
                                        <textarea class="form-control" name="description" id="" cols="20" rows="10"><?php echo $data['description']; ?></textarea>

                                   

                                    <button type="submit" name="update_on_going_research" class="btn btn-info">Update ongoing research</button>
                                    </form>
                                
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
</body>
</html>