<?php 
include('includes/dbcon.php');
if(isset($_REQUEST['add_message']))
{

$name=$_REQUEST['name'];
$address=$_REQUEST['address'];
$phone=$_REQUEST['phone'];
$email=$_REQUEST['email'];
$message=$_REQUEST['message'];


$qry="insert into users_feedback(name,address,phone,email,message) values (?,?,?,?,?)";
$result=$conn->prepare($qry);
$result->bindParam(1,$name,PDO::PARAM_INT);
$result->bindParam(2,$address,PDO::PARAM_STR);
$result->bindParam(3,$phone,PDO::PARAM_STR);
$result->bindParam(4,$email,PDO::PARAM_LOB);
$result->bindParam(5,$message,PDO::PARAM_STR);

$result->execute();
}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" href="css/header.css">

</head>
<body>
<?php include('header.php') ?>

<div class="contact">
    <div class="contactTop">
        <div class="contactLayer">
            <div class="container">
                <h2 class="HeadersB">Get in Touch</h2>
                <a href="https://goo.gl/maps/6f8DMD4HPD4gCQEa7" style="color:white;">
                    <p class="myMap">Click here to follow the MAP</p>
                </a>
            </div>         
        </div>
        <div class="googleMap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3538.5085445160225!2d83.45150731453401!3d27.515655740497934!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39969a4878abb5dd%3A0xf08cbfbb84c84c69!2sLumbini%20Seed%20Company%20Pvt%20Ltd!5e0!3m2!1sen!2snp!4v1592886006800!5m2!1sen!2snp" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>

    <div class="contactCard">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="HeadersB">Send us a Message</h3>
                    <form action="">
                    
                        <div class="form-row">
                           <div class="form-group col-md-6">
                               <input type="text" name="name"  class="form-control form-control-lg" id="inputName" placeholder="Full Name" required>
                           </div>
                           <div class="form-group col-md-6">
                               <input type="text" name="address" class="form-control form-control-lg" id="inputAddress" placeholder="Address" required>
                           </div>
                        </div>
                       

                        <div class="form-row">
                           <div class="form-group col-md-6">
                               <input type="email" name="email" class="form-control form-control-lg" id="inputEmail" placeholder="Email" required>
                           </div>
                           <div class="form-group col-md-6">
                               <input type="text" name="phone" class="form-control form-control-lg" id="inputPhone" placeholder="Phone" required>
                           </div>
                        </div>

                        <div class="form-group">
                           <textarea  name="message" class="form-control rounded-0" id="exampleFormControlTextarea1" rows="3" placeholder="Your Message" required></textarea>
                        </div>

                        <div class="form-group">
                           <button  type="submit" name="add_message" class="btn btn-info">Submit</button>
                        </div>
                   </form>
                </div>

                <div class="col-md-4 contact-right">
                    <h3 class="HeadersB">
                        Contact Information

                    </h3>

                    <div class="contactInfo">
                        <i class="fas fa-map-marked"></i><span>sidharthanagar, Bhairahawa</span> <br>
                        <i class="fas fa-phone-alt"></i><span>+977-0932453cv | 22343452v </span> <br>
                        <i class="fas fa-envelope"></i><span>info@LSC.com</span>
                        
                        <div class="socialMedia">
                            <ul>
                                <li> <a href=""><i class="fa fa-facebook" style="color:white"></i></a></i></li>
                                <li><a href=""><i class="fa fa-instagram" style="color:white"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter" style="color:white"></i></a></li>
                            </ul>
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