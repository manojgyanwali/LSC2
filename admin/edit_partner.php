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
//************update partner********************************

    if(isset($_REQUEST['update_partner']))
    {
    
    $tempname=$_FILES['file1']['tmp_name'];
    $image=$_FILES['file1']['name'];
    
    
        move_uploaded_file($tempname,"../images/partner_images/".$image);
        $qry="update  partner_data set logo='$image' where id={$_REQUEST['id']}";
      
       
    }
    
   
    

    


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies Profile</title>
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
                        <h1>Companies Profile</h1>
                        <p class="text-muted">Admin/companies_profile</p>
                    </div>

                    <div class="pills-Section">
                             
                    <!-- pills begins from here  -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#partners" role="tab" aria-controls="profile" aria-selected="false">Add Partners</a>
                        </li>
                        
                        
                    </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- add partner  -->
                          <?php  $qry="select *from partner_data where id=?";
                                $result=$conn->prepare($qry);
                                $result->bindParam(1,$id);
                                $id=$_REQUEST['id'];
                                $result->execute();
                                $data=$result->fetch(PDO::FETCH_ASSOC);
                            ?>

                            <div class="tab-pane fade show active" id="partners" role="tabpanel" aria-labelledby="profile-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add Partner</h4>
                                    <div class="contents" style="padding:20px;">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <label>Upload Parner Logo</label> <br>
                                            <input type="file" name="file1" placeholder="Choose File" required><br><br>

                                            <button type="submit" name="update_partner" class="btn btn-info">Update Partner</button>
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