<?php
include('includes/dbcon.php');
session_start();
if(isset($_SESSION['is_login']))
{
  $user_phone=  $_SESSION['phone'];

  
}
else
{
    header('location:login.php');
}


 

$qry="select *from users_signup where  contact_no=?   ";
$result=$conn->prepare($qry);
$result->bindParam(1,$user_phone);




$result->execute();
$data=$result->fetch(PDO::FETCH_ASSOC);




if(isset($_REQUEST['logout']))
{
    

session_destroy();
header('location:index.php');
}
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <!-- user header starts  -->
    <div class="usersHeader" style="background-color: #e5e5e5; height: 60px; margin-top: 20px;">
        <div class="container">
            <div class="row justify-content-between">

                <div class="col-md-4 logoContains">
                    <a href="index.php"><img src="images/Logo.png" alt="logo"
                            style="float: left; margin-top: 10px; padding-right: 20px;"></a>
                    <h4 style=" margin-left: 10px; padding-top: 10px;">Lumbini Seed Company</h4>
                </div>

                <div class="col-md-4" style="padding-top: 10px;">
                    <form action="" method="POST">
                        <button type="submit" name="logout" class="btn btn-secondary">Logout</button>
                    
                    <a href="setting.php">
                        <button class="btn btn-info"><i class="fas fa-cog"></i> Settings
                        </button>
                    </a>
                    </form>
                </div>


            </div>
        </div>
    </div>

    <!-- user mid section starts  -->

    <div class="userMid">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="images/user.png" alt="" class="img-fluid">
                </div>
                <div class="col-md-7">
                    <h1 class="font-weight-light"><?php echo $data['full_name'] ?></h1>
                    <p class="tex-muted"><?php echo $data['email'] ?></p>

                    <table>
                        <tr>
                            <th width="30%">Username</th>
                            <th width="30%">Address</th>
                            <th width="30%">Contact No</th>
                        </tr><br>
                        <tr>
                            <td width="30%"><?php echo $data['full_name'] ?></td>
                            <td width="30%"><?php echo $data['address'] ?></td>
                            <td width="30%"><?php echo $data['contact_no'] ?> </td>
                        </tr>
                    </table>

                </div>
                <div class="col-md-2">

                    <!-- <span class="userIcons">
                        <i class="fas fa-ellipsis-h"></i>
                    </span> -->
                </div>
            </div>
        </div>
    </div>

    <!-- user end  -->

    <div class="userEnd">
        <div class="container">
            <h4>My Order</h4>
                                <?php 
                                $qry1="select *from customer_data,product_portfolio,users_signup  where  customer_data.product_id=product_portfolio.id and customer_data.users_signup_id=users_signup.id and users_signup.id={$_SESSION['users_id']} ";
                                $result1=$conn->prepare($qry1);
                                    
                                $result1->execute();
                                ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Name</th>
                        <th scope="col">Details</th>
                        <th scope="col">Order Status</th>
                    </tr>
                </thead>
                <tbody>
                            <?php 
                            while( $data1=$result1->fetch(PDO::FETCH_ASSOC))
                                {
                            ?>

                    <tr>
                        <td><img src="product_portfolio_image/<?php echo $data1['product_image']; ?>" style="height: 50px; width: 80%;" alt="" class="img-fluid">
                        </td>
                        <td><?php echo $data1['product_name']; ?></td>
                        <td class="delivery">not Delivered</td>
                        <td>
                            <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">View
                                Details</button> -->
                                <button class="btn btn-primary view_data" user_id="<?php echo $data1['id']; ?>"  >View Details</button>
                        </td>
                    </tr>
                                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                 <div class="modal-body" id="user_data">
                    <!-- <div class="userinfo" style="background-color: #caf0f8;padding:20px; border-radius: 10px;">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="font-weight-bold">Ordered Person</h5>
                                <p class="text-muted">Ashish khanal</p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="font-weight-bold">Ordered Address</h5>
                                <p class="text-muted">Maitidevi, Kathmandu</p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="font-weight-bold">Contact num</h5>
                                <p class="text-muted">98384943</p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="font-weight-bold">Email</h5>
                                <p class="text-muted">@gmailc.om</p>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Category</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Dhan</td>
                                <td>Dhan 24</td>
                                <td>Rs 2300</td>
                                <td>40 kg</td>
                            </tr>
                        </tbody>
                    </table>.. -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger">Cancel Order</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script> 
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  

    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/jquery-3.3.1.slim.min.js"></script>
    <script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>

    <!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script> -->
  
<!-- <script src="../bootstrap/js/bootstrap.min.js"></script>
 
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script> --> 

 

    <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
          var user_id=$(this).attr("user_id");

          
         
          $.ajax({
              url:"dataModal.php",
              method:"POST",
              data:{user_id:user_id},
              success:function(data){
                  $('#user_data').html(data);
                  $('#exampleModal').modal("show");

               
              }
          });
         
            
        
          
          
      });  



    //   $('.previous_view_data').click(function(){  
    //       var customer_id1=$(this).attr("ids1");
         
    //       $.ajax({
    //           url:"dataModal.php",
    //           method:"POST",
    //           data:{customer_id1:customer_id1},
    //           success:function(data){
    //               $('#previous_customer_details').html(data);
    //               $('#previousModal').modal("show");

               
    //           }
    //       });
         
            
        
          
          
    //   });  
 });  
 </script>

</body>

</html>