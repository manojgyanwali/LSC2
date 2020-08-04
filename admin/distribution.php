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
if(isset($_REQUEST['add_dealer']))
{
    $name=$_REQUEST['name'];
    $location=$_REQUEST['location'];
    $contact_no=$_REQUEST['contact_no'];
    $owner_name=$_REQUEST['owner_name'];
    $google_mag_address=$_REQUEST['google_map_address'];


$tempname=$_FILES['file']['tmp_name'];
$image=$_FILES['file']['name'];


    move_uploaded_file($tempname,"../images/distribution_network_images/".$image);
    $qry="insert into distributon_network (image,name,location,contact_no,owner_name,google_map_address) values (?,?,?,?,?,?)";
         $result=$conn->prepare($qry);
         $result->bindParam(1,$image,PDO::PARAM_STR);
         $result->bindParam(2,$name,PDO::PARAM_STR);
         $result->bindParam(3,$location,PDO::PARAM_STR);
         $result->bindParam(4,$contact_no,PDO::PARAM_INT);
         $result->bindParam(5,$owner_name,PDO::PARAM_STR);
         $result->bindParam(6,$google_mag_address,PDO::PARAM_STR);
        
    
       $result->execute();
      
         

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
                       
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#vDistribution" role="tab" aria-controls="profile" aria-selected="false">View Dealer</a>
                        </li>
                       
                        
                    </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- add dealers  -->
                            <div class="tab-pane fade show active" id="distribution" role="tabpanel" aria-labelledby="home-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add Dealer</h4>
                                <div class="contents" style="padding:20px;">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <label>Upload Image</label> <br>
                                        <input type="file" name="file" placeholder="Choose File" required ><br><br>

                                        <label for="">Add Name</label>
                                        <input type="text" name="name" class="form-control col-md-6" required><br>

                                        <label for="">Add Location </label>
                                        <input type="text" name="location" class="form-control col-md-6" required><br>
                                        
                                        <label for="">Contact No </label>
                                        <input type="text" name="contact_no" class="form-control col-md-6" required><br>

                                        <label for="">Add Owner Name</label>
                                        <input type="text" name="owner_name" class="form-control col-md-6" required><br>

                                        <label for="">Add Google map address</label>
                                        <input type="text" name="google_map_address" class="form-control col-md-6" required><br>

                                        <button type="submit" name="add_dealer" class="btn btn-info">Add Dealer</button>
                                    </form>
                                </div>
                            </div>
                           

                            <!-- view dealers  -->
                                <?php $qry1="select *from distributon_network";
                                    $result1=$conn->prepare($qry1);
                                    $result1->execute();
                                ?>
                            <div class="tab-pane fade" id="vDistribution" role="tabpane1" aria-labelledby="view-eomployee">
                                <h4 style="margin-top:30px;margin-left:20px;">View Dealer</h4>

                                <div class="contents" style="padding:20px;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Dealer Name</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Contact No</th>
                                            <th scope="col">Owner's Name</th>
                                            <th scope="col">EDIT | DELETE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php   while($row1=$result1->fetch(PDO::FETCH_ASSOC))
                                                {
                                            ?>
                                            <tr>
                                            <th scope="row">1</th>
                                            <td>
                                                <?php echo $row1['name'];?>
                                            </td>
                                            <td><?php echo $row1['location'];?></td>
                                            <td><?php echo $row1['contact_no'];?></td>
                                            <td><?php echo $row1['owner_name'];?></td>
                                            <td>
                                                <a  href="edit_distribution.php?id=<?php echo $row1['id']; ?>"><i class="fa fa-edit" style="font-size:larger;"></i></a>
                                                <span style="border: 1px solid black; margin: 5px 10px;"></span>
                                                <a onclick="return validate()" href="delete_distribution.php?id=<?php echo $row1['id']; ?>"><i class="fas fa-trash-alt" style="font-size:larger;color:red;"></i></a>
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