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











//************add employee********************************

    if(isset($_REQUEST['add_employee']))
    {

    $emp_name=$_REQUEST['emp_name'];
    $emp_position=$_REQUEST['emp_position'];
    

    
    $tempname=$_FILES['image']['tmp_name'];
    $emp_image=$_FILES['image']['name'];
    
   
    move_uploaded_file($tempname,"../employee_images/".$emp_image);
    $qry="insert into employee_data (emp_image,emp_name,emp_position) value('$emp_image','$emp_name','$emp_position')";
    $conn->query($qry);

    }

//************add partner********************************

    if(isset($_REQUEST['add_partner']))
    {
    
    $tempname=$_FILES['file1']['tmp_name'];
    $image=$_FILES['file1']['name'];
    if($image=="")
    {
        $message="please choose image first";
    }
    else
    {
        move_uploaded_file($tempname,"../images/partner_images/".$image);
        $qry="insert into partner_data (logo) value('$image')";
        $conn->query($qry);
    }
    
   
    

    }

//************add photo _gallery********************************


    if(isset($_REQUEST['add_gallery']))
    {
    $title=$_REQUEST['title'];
    
    $tempname=$_FILES['files']['tmp_name'];
    $image=$_FILES['files']['name'];
    
    
        move_uploaded_file($tempname,"../images/photo_gallery/".$image);
        $qry="insert into photo_gallery (title,image) value('$title','$image')";
        $conn->query($qry);
    
    
   
    

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
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#employees" role="tab" aria-controls="home" aria-selected="true">Add Employees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#partners" role="tab" aria-controls="profile" aria-selected="false">Add Partners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="profile" aria-selected="false">Photo Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#vEmployees" role="tab" aria-controls="profile" aria-selected="false">View Employees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#vPartners" role="tab" aria-controls="profile" aria-selected="false">View Partners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#vGallery" role="tab" aria-controls="profile" aria-selected="false">Edit Gallery</a>
                        </li>
                        
                    </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- add employees  -->
                            <div class="tab-pane fade show active" id="employees" role="tabpanel" aria-labelledby="home-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add Employees</h4>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="contents" style="padding:20px;">
                                        <label>Upload Image</label> <br>
                                        <input type="file" name="image" placeholder="Choose File" required><br><br>

                                        <label for="">Add Name</label>
                                        <input type="text" name="emp_name" class="form-control col-md-6" required><br>

                                        <label for="">Add Employee Position in Organization</label>
                                        <input type="text" name="emp_position" class="form-control col-md-6"required ><br>

                                        <button type="submit" name="add_employee"  class="btn btn-info">Add Employee</button>
                                    </div>
                                </form>
                            </div>
                            <!-- add partners -->
                            <div class="tab-pane fade" id="partners" role="tabpanel" aria-labelledby="profile-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add Partner</h4>
                                    <div class="contents" style="padding:20px;">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <label>Upload Parner Logo</label> <br>
                                            <input type="file" name="file1" placeholder="Choose File"><br><br>

                                            <button type="submit" name="add_partner" class="btn btn-info">Add Partern</button>
                                        </form>
                                            <?php if(isset($message)){ echo $message;}   ?>
                                    </div>
                            </div>

                            <!-- add image gallery  -->
                             <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="profile-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add Photo in Gallery</h4>
                                    <div class="contents" style="padding:20px;">
                                        <form action="" method="POST" enctype="multipart/form-data">

                                        <label>Upload photo</label> <br>
                                        <input type="file" name="files" placeholder="Choose File" required><br><br>

                                        <label for="">Add image caption</label>
                                        <input type="text" name="title" class="form-control col-md-6" required><br>

                                        <button type="submit" name="add_gallery" class="btn btn-info">Add photo</button>
                                        </form>
                                    </div>
                            </div>


                                <!--************************** view employees***********************  -->

                                <?php $qry1="select *from employee_data";
                                    $result1=$conn->prepare($qry1);
                                    $result1->execute();
                                ?>
                            <div class="tab-pane fade" id="vEmployees" role="tabpane1" aria-labelledby="view-eomployee">
                                <h4 style="margin-top:30px;margin-left:20px;">View Employee</h4>

                                <div class="contents" style="padding:20px;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Employee</th>
                                            <th scope="col">Employee Name</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">EDIT | DELETE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                while($row1=$result1->fetch(PDO::FETCH_ASSOC))
                                                {

                                                
                                            ?>
                                            <tr>
                                            <th scope="row">1</th>
                                            <td>
                                                <img src="../employee_images/<?php echo $row1['emp_image'] ?>" alt="" style="width:50px;">
                                            </td>
                                            <td><?php echo $row1['emp_name'] ?></td>
                                            <td><?php echo $row1['emp_position'] ?></td>
                                            <td>
                                                <a  href="edit_employee.php?id=<?php echo $row1['id']; ?>"><i class="fa fa-edit" style="font-size:larger;"></i></a>
                                                <span style="border: 1px solid black; margin: 5px 10px;"></span>
                                                <a onclick="return validate()" href="delete_employee.php?id=<?php echo  $row1['id']; ?>"><i class="fas fa-trash-alt" style="font-size:larger;color:red;"></i></a>
                                            </td>
                                            </tr>
                                                <?php } ?>
                                            
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- view partners -->
                            <?php $qry2="select *from partner_data";
                                    $result2=$conn->prepare($qry2);
                                    $result2->execute();
                                ?>
                            <div class="tab-pane fade" id="vPartners" role="tabpane1" aria-labelledby="view-partners">
                                <h4 style="margin-top:30px;margin-left:20px;">View Partner</h4>

                                
                                <div class="contents" style="padding:20px;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Partner</th>
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
                                                <img src="../images/partner_images/<?php echo $row2['logo']; ?>" alt="" style="width:50px;">
                                            </td>
                                            <td>
                                                <a  href="edit_partner.php?id=<?php echo $row2['id']; ?>"><i class="fa fa-edit" style="font-size:larger;"></i></a>
                                                <span style="border: 1px solid black; margin: 5px 10px;"></span>
                                                <a onclick="return validate()" href="delete_partner.php?id=<?php echo $row2['id']; ?>"><i class="fas fa-trash-alt" style="font-size:larger;color:red;"></i></a>
                                            </td>
                                            </tr>
                                                <?php }?>
                                            
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            
                            <!-- view image gallery -->
                            <?php $qry3="select *from photo_gallery ";
                                    $result3=$conn->prepare($qry3);
                                    $result3->execute();
                                ?>
                            <div class="tab-pane fade" id="vGallery" role="tabpane1" aria-labelledby="view-partners">
                                <h4 style="margin-top:30px;margin-left:20px;">Edit Photo Gallery</h4>

                                
                                <div class="contents" style="padding:20px;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Photo</th>
                                            <th scope="col">Caption</th>
                                            <th scope="col">EDIT | DELETE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                while($row3=$result3->fetch(PDO::FETCH_ASSOC))
                                                {

                                                
                                            ?>
                                       
                                            <tr>
                                            <th scope="row">1</th>
                                            <td>
                                                <img src="../images/photo_gallery/<?php echo $row3['image']; ?>" alt="" style="width:50px;">

                                            </td>
                                            <td><?php echo $row3['title']; ?></td>
                                            <td>
                                                <a  href="edit_photo_gallery.php?id=<?php echo $row3['id'] ?>"><i class="fa fa-edit" style="font-size:larger;"></i></a>
                                                <span style="border: 1px solid black; margin: 5px 10px;"></span>
                                                <a onclick="return validate()" href="delete_photo_gallery.php?id=<?php echo $row3['id'] ?>"><i class="fas fa-trash-alt" style="font-size:larger;color:red;"></i></a>
                                            </td>
                                            </tr>
                                                        
                                                <?php } ?>
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