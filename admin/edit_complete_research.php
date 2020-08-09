<?php

include('../includes/dbcon.php');

    
   

//................................update complete research_report.......................................

    if(isset($_REQUEST['update_complete_research']))
    {

    $title=$_REQUEST['title'];
    
    
    

    
    $tempname=$_FILES['file']['tmp_name'];
    $file_name=$_FILES['file']['name'];
    
   
   move_uploaded_file($tempname,"../images/complete_research_file/".$file_name);
    
    $qry="update  complete_research set file=?,title=? where id=?";
         $result=$conn->prepare($qry);
         $result->bindParam(1,$file_name,PDO::PARAM_INT);
         $result->bindParam(2,$title,PDO::PARAM_STR);
         $result->bindParam(3,$_REQUEST['id'],PDO::PARAM_STR);
         
         
         
       $result->execute();
         
    

    }
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
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#vcompleteR" role="tab" aria-controls="profile" aria-selected="false">Edit complete</a>
                        </li>
                       
                        
                    </ul>
                        <div class="tab-content" id="myTabContent">
                            

                            
                            <!-- complete research  -->
                            <?php  $qry="select *from complete_research where id=?";
                                $result=$conn->prepare($qry);
                                $result->bindParam(1,$id);
                                $id=$_REQUEST['id'];
                                $result->execute();
                                $data=$result->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <div class="tab-pane fade show active" id="completeR" role="tabpane1" aria-labelledby="view-eomployee">
                                <h4 style="margin-top:30px;margin-left:20px;">Add complete research report</h4>

                                <div class="container">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <label for="">Add Research title</label>
                                    <input type="text" value="<?php echo $data['title'] ?>" va name="title" class="form-control col-md-6"><br>
                                    <label><b>Upload Research Report PDF file</b></label> <br>
                                    <input type="file" name="file" placeholder="Choose File" required><br><br>
                                    <button type="submit" name="update_complete_research" class="btn btn-info">Publish complete research report</button>
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