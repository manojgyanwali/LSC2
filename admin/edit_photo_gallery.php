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












    
//************ update photo _gallery********************************
$_REQUEST['id'];

    if(isset($_REQUEST['update_gallery']))
    {
    $title=$_REQUEST['title'];
    
    $tempname=$_FILES['files']['tmp_name'];
    $image=$_FILES['files']['name'];
    
    
        move_uploaded_file($tempname,"../images/photo_gallery/".$image);
        $qry="update   photo_gallery  set image='$image',title='$title' where id={$_REQUEST['id']}";
        $conn->query($qry);
    
        // if(isset($_REQUEST['update_partner']))
        // {
        
        // $tempname=$_FILES['file1']['tmp_name'];
        // $image=$_FILES['file1']['name'];
        
        
        //     move_uploaded_file($tempname,"../images/partner_images/".$image);
        //     $qry="update  partner_data set logo='$image' where id={$_REQUEST['id']}";
          
           
        // }
   
    

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
                            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="profile" aria-selected="false">Photo Gallery</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                           
                            
                            
                           

                            <!-- add image gallery  -->
                            <?php  $qry="select *from photo_gallery where id=?";
                                $result=$conn->prepare($qry);
                                $result->bindParam(1,$id);
                                $id=$_REQUEST['id'];
                                $result->execute();
                                $data=$result->fetch(PDO::FETCH_ASSOC);
                            ?>
                             <div class="tab-pane fade show active" id="gallery" role="tabpanel" aria-labelledby="profile-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add Photo in Gallery</h4>
                                    <div class="contents" style="padding:20px;">
                                        <form action="" method="POST" enctype="multipart/form-data">

                                        <label>Upload photo</label> <br>
                                        <input type="file" name="files" placeholder="Choose File" required><br><br>

                                        <label for="">Add image caption</label>
                                        <input type="text" name="title" value="<?php echo $data['title'] ?>" class="form-control col-md-6" required><br>

                                        <button type="submit" name="update_gallery" class="btn btn-info">update</button>
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

<script>
function validate()
    {
       
       var confirms=  confirm("Are you sure wants to delete this data ?  ");
       if(confirms==true)
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