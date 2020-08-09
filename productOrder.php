<?php 
include('header.php');
include('includes/dbcon.php');
if(isset($_REQUEST['quantity']))
{
    $qty=$_REQUEST['quantity'];
    $_SESSION['quantity']=$qty;
    
    
    
}
else
{
    $_SESSION['quantity']=0;
    $qty=0;
}


$qry="select *from product_portfolio where id=?";
$result=$conn->prepare($qry);
$result->bindParam(1,$_SESSION['id'],PDO::PARAM_INT);
$result->execute();

$row=$result->fetch(PDO::FETCH_ASSOC)

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" href="css/header.css">

</head>
<body>


    <div class="productConfirmOrders">
        <div class="container">
            <div class="row">

                <!-- left section  -->
                <div class="col-md-8">
                    
                    <table style="width:100%; margin-top:20px;">
                        <tr class="tableHead">
                            <th width="60%" style="padding-left:10px;"><i>Item</i></th>
                            <th width="20%"><i>Price</i></th>
                            <th width="20%" style="padding-right:10px;"><i>Quantity</i></th>
                        </tr>
                    </table>

                    <table style="width:100%; margin-top:20px;">
                        <tr class="tableItems">
                            <td class="firstTD" width="60%"> 
                                <img src="product_portfolio_image/<?php echo $row['product_image']; ?>" alt="" style="width:20%; float:left; margin-right:20px;">
                                <h5><?php echo $row['product_name']; ?></h5>
                                <p><i><?php echo $row['category_name']; ?></i></p>
                            </td>
                            <td width="20%"><?php echo $row['price_of_product'] ?></td>
                            <td width="20%"><?php echo $qty?>kg</td>
                        </tr>
                    </table>

                </div>

                <!-- right section  -->
                <div class="col-md-4">
                    <div class="confirmCard">
                        <h4><B>ORDER DETAILS</B></h4>
                        <p class="text-muted">Please provide us the following information to confirm your order. Our sales team will be in contact with you.</p>
                        <?php if(isset($_SESSION['confirm_message']))
                         {
                             echo $_SESSION['confirm_message'];
                             unset ($_SESSION['confirm_message']);
                         } 
                         ?>

                        <form action="order_confirmation.php" method="POST" onsubmit="return validate()" class="form-group confirmForm">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Enter the name for order">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Enter the address for order">
                            <label for="phone">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter the phone number for order">
                            <span id="phoneerror"></span>
                            <label for="Email">Email address</label>
                            <input type="email"  class="form-control" id="Email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                            <input type="hidden" value="<?php if(isset($_SESSION['users_id'])) {echo $_SESSION['users_id'];} ?>"   name="users_id">

                            <button type="submit" name="submit" class="btnConfirm"> Confirm Order</button>
                        </form>
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function validate()
{
    var phone=  document.getElementById("phone").value;
    var phonepatt=/^9[87]{1}[0-9]{8}$/;
    if (phonepatt.test(phone))
    {
        document.getElementById("phoneerror").innerHTML="";
    }
else
{
document.getElementById("phoneerror").innerHTML="***invalid phone number***";
document.getElementById("phoneerror").style.color="red";
return false;

}
}
</script>
   

<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/master.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>

</body>
</html>