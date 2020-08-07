<?php
session_start();
include('../includes/dbcon.php');
if(isset($_SESSION['is_login']))
{
   echo "";
}
else
{
   header('location:index.php');
}





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
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
                    <?php 
                                    $qry2="select *from users_feedback";
                                    $result2=$conn->prepare($qry2);
                                    $result2->execute();
                                ?>
                        <h1>Contact us</h1>
                        <p class="text-muted">Admin/contact</p>
                    </div>
                    <br>
                    <div class="contactTable">
                        <p>View All the inbox messages from contact us menu here</p>


                                <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Address</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">View Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php  
                                               while ($row2=$result2->fetch(PDO::FETCH_ASSOC)){
                                                ?>
                                            <tr>
                                          


                                           
                                                <th scope="row">1</th>
                                                <td>
                                                    25th July,2020
                                                </td>
                                                <td> <?php echo $row2['name']; ?></td>
                                                <td><?php echo $row2['address']; ?></td>
                                                <td><?php echo $row2['email']; ?></td>
                                                <td>
                                                <!-- <button class="btn btn-primary view_data">View Details</button> -->
                                            <button class="btn btn-primary view_data" contact_id="<?php echo $row2['id']; ?>" >View Details</button>

                                                </td>
                                              

                                                
                                            </tr>  
                                            <?php } ?>


                                                 <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" id="users_feedback">
                                                            
                                                                
                                                        </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Marked as read</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>                                       
                                            
                                        </tbody>
                                        
                                </table>
                    </div>
                   
            </div>
        </div>
    </div>

   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <!-- <script src="../bootstrap/js/jquery-3.3.1.slim.min.js"></script> -->
  <script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>

<script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
          console.log("button clicked");
          var contact_id=$(this).attr("contact_id");
          
           $.ajax({
              
              url:"dataModal.php",
              method:"POST",
              data:{contact_id:contact_id},
              success:function(data){
                  $('#users_feedback').html(data);
                  $('#exampleModal').modal("show");

               
              }
          });
         
            
        
          
          
      });  



      
         
            
        
          
          
      });  
   
 </script>
</body>
</html>