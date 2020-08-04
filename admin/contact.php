<?php
session_start();
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
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>
                                                    25th July,2020
                                                </td>
                                                <td>Aashish Khanal</td>
                                                <td>Address goes here</td>
                                                <td>Email@gmail.com</td>
                                                <td>
                                                <button class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">View Details</button>
                                                </td>

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
                                                        <div class="modal-body">
                                                            <div class="row">

                                                                <div class="col-md-6">
                                                                    <p class="text-muted">
                                                                    Name
                                                                    </p>
                                                                    <h5>
                                                                        Aashish Khanal
                                                                    </h5>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <p class="text-muted">
                                                                        Contact No
                                                                    </p>
                                                                    <h5>
                                                                        0982838233
                                                                    </h5>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <p class="text-muted">
                                                                    Message
                                                                    </p>
                                                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the </p>
                                                                </div>
                                                            </div>
                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Marked as read</button>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </tr>                                         
                                            
                                        </tbody>
                                        
                                </table>
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