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

//************update distribution********************************

    if(isset($_REQUEST['update_dealer']))
    {
        $name=$_REQUEST['name'];
        $location=$_REQUEST['location'];
        $contact_no=$_REQUEST['contact_no'];
        $owner_name=$_REQUEST['owner_name'];
        $google_map_address=$_REQUEST['google_map_address'];
    
    
    $tempname=$_FILES['file']['tmp_name'];
    $image=$_FILES['file']['name'];
    
    
        move_uploaded_file($tempname,"../images/distribution_network_images/".$image);
        $qry="update  distributon_network set image='$image',name='$name',location='$location',
        contact_no=$contact_no,owner_name='$owner_name',google_map_address='$google_map_address' where id={$_REQUEST['id']}";
      
        $conn->query($qry);
    }
    
   
    

    


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribution Network</title>
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
                        <h1>Distribution Network</h1>
                        <p class="text-muted">Admin/distribution</p>
                    </div>

                    <div class="pills-Section">
                             
                    <!-- pills begins from here  -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#distribution" role="tab" aria-controls="home" aria-selected="true">Add Dealer</a>
                       
                        
                       
                        
                    </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- add dealers  -->
                            <?php  $qry="select *from distributon_network where id=?";
                                $result=$conn->prepare($qry);
                                $result->bindParam(1,$id);
                                $id=$_REQUEST['id'];
                                $result->execute();
                                $data=$result->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <div class="tab-pane fade show active" id="distribution" role="tabpanel" aria-labelledby="home-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add Dealer</h4>
                                <div class="contents" style="padding:20px;">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <label>Upload Image</label> <br>
                                        <input type="file"  name="file" placeholder="Choose File" required ><br><br>

                                        <label for="">Add Name</label>
                                        <input type="text" value="<?php echo $data['name']; ?>" name="name" class="form-control col-md-6" required><br>

                                        <label for="">Add Location </label>
                                        <input type="text" value="<?php echo $data['location']; ?>" name="location" class="form-control col-md-6" required><br>
                                        
                                        <label for="">Contact No </label>
                                        <input type="text" value="<?php echo $data['contact_no']; ?>" name="contact_no" class="form-control col-md-6" required><br>

                                        <label for="">Add Owner Name</label>
                                        <input type="text" value="<?php echo $data['owner_name']; ?>" name="owner_name" class="form-control col-md-6" required><br>

                                        <label for="">Add Google map address</label>
                                        <input type="text" value="<?php echo $data['google_map_address']; ?>" name="google_map_address" class="form-control col-md-6" required><br>

                                        <button type="submit" name="update_dealer" class="btn btn-info">Update Dealer</button>
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