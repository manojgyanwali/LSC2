<?php
include('includes/dbcon.php');
$qry="select *from distributon_network";
$result=$conn->prepare($qry);
$result->execute();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribution Network</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" href="css/header.css">
</head>
<body>
<?php include('header.php') ?>


<div class="distribution">
    <div class="container">
        <h2 class="HeadersB" style="padding:70px 0 20px 0;">Distribution Network</h2>
        <p class="text-muted">We have various dealers around Nepal connected in our distribution network. You can find and contact any dealers near you and get our service. Here we've placed all the dealers name and their conatact information. If you still need any support please <a href="contact.php"><b>contact us </b> </a></p>

            <?php 
                    while($row=$result->fetch(PDO::FETCH_ASSOC))
                    {

                    
                
                    ?>

     
            <?php } ?>   
            <div class="cardSection">

<div class="dCard">
    <div class="row">

        <div class="col-md-9">
            <Table>
                <tr>
                    <td>
                        <img src="images/p2.jpg" class="dImg" alt="">
                    </td>
                    <td>
                        <h3 class="HeadersB">
                            Dealers Name
                        </h3>
                        <p class="mcf">Location goes here</p>
                    </td>
                </tr>
            </Table>
        </div>
        

        <div class="col-md-3">
        <button type="button" class="downloadBtn" style="text-align:center;" data-toggle="modal" data-target="#contactnow">
            Contact Now !
        </button>

        <!-- Modal -->
            <div class="modal fade" id="contactnow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dealer Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5><b>Shree Shirdar Seed Distribution Network</b></h5>
                    <p class="text-muted">Kotihawa, Bhairahawa</p>
                    <br>
                    <p><b>Contact no</b></p>
                    <p class="text-muted">984524224</p>
                    <p><b>Owner Name</b></p>
                    <p class="text-muted">Ram Chandra Tripathi</p>
                    <br>
                    <b><a href="#">Find in Map</a></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>

<div class="dCard">
    <div class="row">

        <div class="col-md-9">
            <Table>
                <tr>
                    <td>
                        <img src="images/p2.jpg" class="dImg" alt="">
                    </td>
                    <td>
                        <h3 class="HeadersB">
                            Dealers Name
                        </h3>
                        <p class="mcf">Location goes here</p>
                    </td>
                </tr>
            </Table>
        </div>
        

        <div class="col-md-3">
        <button type="button" class="downloadBtn" style="text-align:center;" data-toggle="modal" data-target="#contactnow">
            Contact Now !
        </button>

        <!-- Modal -->
            <div class="modal fade" id="contactnow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Dealer Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5><b>Shree Shirdar Seed Distribution Network</b></h5>
                    <p class="text-muted">Kotihawa, Bhairahawa</p>
                    <br>
                    <p><b>Contact no</b></p>
                    <p class="text-muted">984524224</p>
                    <p><b>Owner Name</b></p>
                    <p class="text-muted">Ram Chandra Tripathi</p>
                    <br>
                    <b><a href="#">Find in Map</a></b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

        </div>
    </div>
</div>

</div>
        </div>
    </div>
</div>
    

<script src="../js/master.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>
</body>
</html>