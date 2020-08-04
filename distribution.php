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
        <?php 
                    while($row=$result->fetch(PDO::FETCH_ASSOC))
                    {

                    
                
                    ?>
        <div class="dCard">
                
            <div class="row">
                

                <div class="col-md-9">
                    <Table>
                        <tr>
                            <td>
                                <img src="images/distribution_network_images/<?php echo $row['image']; ?>" class="dImg" alt="">
                            </td>
                            <td>
                                <h3 class="HeadersB">
                                <?php echo $row['name']; ?>
                                </h3>
                                <p class="mcf"><?php echo $row['location']; ?></p>
                            </td>
                        </tr>
                    </Table>
                </div>
                    

                <div class="col-md-3">
                    <button class="downloadBtn" id="contactBtn">Contact Now !</button>
                </div>
            </div>
               
        </div>
            <?php } ?>   
                        

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
                    <button class="downloadBtn" id="contactBtn">Contact Now !</button>
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
                    <button class="downloadBtn" id="contactBtn">Contact Now !</button>
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