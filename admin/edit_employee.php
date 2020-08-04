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
//************ update employee ********************************

    if(isset($_REQUEST['update_employee']))
    {

    $emp_name=$_REQUEST['emp_name'];
    $emp_position=$_REQUEST['emp_position'];
    

    
    $tempname=$_FILES['image']['tmp_name'];
    $emp_image=$_FILES['image']['name'];
    
   
    move_uploaded_file($tempname,"../employee_images/".$emp_image);
    $qry=" update employee_data set emp_image='$emp_image',emp_name='$emp_name',emp_position='$emp_position'
             where id={$_REQUEST['id']}";
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
                        
                        
                    </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- add employees  -->
                          <?php  $qry="select *from employee_data where id=?";
                                $result=$conn->prepare($qry);
                                $result->bindParam(1,$id);
                                $id=$_REQUEST['id'];
                                $result->execute();
                                $data=$result->fetch(PDO::FETCH_ASSOC);
                            ?>

                            <div class="tab-pane fade show active" id="employees" role="tabpanel" aria-labelledby="home-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add Employees</h4>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="contents" style="padding:20px;">
                                        <label>Upload Image</label> <br>
                                        <input type="file"  name="image" placeholder="Choose File"><br><br>

                                        <label for="">Add Name</label>
                                        <input type="text" value="<?php echo  $data['emp_name']; ?>" name="emp_name" class="form-control col-md-6"><br>

                                        <label for="">Add Employee Position in Organization</label>
                                        <input type="text" value="<?php echo  $data['emp_position']; ?>" name="emp_position" class="form-control col-md-6"><br>

                                        <button type="submit" name="update_employee"  class="btn btn-info">Update_employee</button>
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