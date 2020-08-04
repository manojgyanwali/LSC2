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
$qry="select *from customer_data ";
$result=$conn->prepare($qry);
$result->execute();

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                        <h5 style="font-weight:bold;">WELCOME TO LSC</h5>
                        <h1>27 March, 2020</h1>
                    </div>

                    <div class="downSection">
                        
                    <h4 style="font-weight:bold;">TOP REPORTS</h4>

                        <div class="row cardRow">
                        <!-- card first -->

                            <div class="col-md-3">
                                <a href="product.php" class="cardA"><div class="card card1">
                                    <h1 class="cardHeading"><?php echo $result->rowCount(); ?></h1>
                                    <i class="fa fa-cart-arrow-down cardIcons"></i>
                                    <h5 style="font-weight:bold">RECENT ORDERS</h5>
                                </div></a>
                            </div>

                            <!-- secon card  -->
                            <div class="col-md-3">
                                <a href="#" class="cardA"><div class="card card2">
                                <img src="../images/logo.png" alt="logo" style="width:29%;padding:0 0 20px 0;">
                                    <i class="fa fa-align-right cardIcons"></i>
                                    <h5 style="font-weight:bold">RECENT NEWS</h5>
                                </div></a>
                            </div>

                            <!-- third card  -->

                            <div class="col-md-3">
                                <a href="#" class="cardA"><div class="card card3">
                                <h1 class="cardHeading">04</h1>
                                    <i class="fa fa-file cardIcons"></i>
                                    <h5 style="font-weight:bold">CV RECEIVED</h5>
                                </div></a>
                            </div>

                            <!-- fourth card  -->
                            <div class="col-md-3">
                                <a href="#" class="cardA"><div class="card card4">
                                <h1 class="cardHeading">20</h1>
                                    <i class="fa fa-id-badge cardIcons"></i>
                                    <h5 style="font-weight:bold">RECENT ORDERS</h5>
                            </div></a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    


          
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>
</body>
</html>