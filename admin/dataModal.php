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

if(isset($_REQUEST["customer_id"]))
{
    
    
    $qry6="select *from product_portfolio,customer_data  where product_portfolio.id=customer_data.product_id and customer_data.id={$_REQUEST['customer_id']}";
    $result6=$conn->prepare($qry6);
    $result6->execute();
    while($row6=$result6->fetch(PDO::FETCH_ASSOC))
    {
?>
      
      <form action="product.php?idd=<?php echo $row6['id'] ?>" method="POST">
                <div class="form-group">
                    <label for="name">NAME</label>
                    <input type="text" name="name" value="<?php echo  $row6['name']; ?>" class="form-control" id="name" >
                    
                </div>
                <div class="form-group">
                    <label for="address">address</label>
                    <input type="text" name="address" value="<?php echo  $row6['address']; ?>" class="form-control" id="address">
                </div>
                <div class="form-group">
                    <label for="contact_number">contact number</label>
                    <input type="text" name="contact"  value="<?php echo  $row6['phone_no']; ?>" class="form-control" id="contact_number">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" value="<?php echo  $row6['email_address']; ?>" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="quantity">quantity</label>
                    <input type="text" name="quantity" value="<?php echo  $row6['quantity']; ?>" class="form-control" id="quantity">
                </div>
                <div class="form-group">
                    
                    <input type="hidden" name="product_name" value="<?php echo  $row6['product_name']; ?>" class="form-control" id="quantity">
                </div>
                <div class="form-group">
                    
                    <input type="hidden" name="product_image" value="<?php echo  $row6['product_image']; ?>" class="form-control" id="quantity">
                </div>
                
                <div class="modal-footer" id="footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                        <button type="submit" name="delivered_order" class="btn btn-primary">Delivered Order</button>
                        
                </div>

               
    </form>
                    

       

<?php 
        
                                                                
    }
   

}


if(isset($_REQUEST["customer_id1"]))

{
    $qry7="select *from previous_customer_data where id={$_REQUEST['customer_id1']}";
    $result7=$conn->prepare($qry7);
    $result7->execute();
    while($row7=$result7->fetch(PDO::FETCH_ASSOC))
    {
    ?>
        <form action="" method="POST">
                <div class="form-group">
                    <label for="name">NAME</label>
                    <input type="text" name="name" value="<?php echo  $row7['ordered_person']; ?>" class="form-control" id="name" >
                    
                </div>
                <div class="form-group">
                    <label for="address">address</label>
                    <input type="text" name="address" value="<?php echo  $row7['address']; ?>" class="form-control" id="address">
                </div>
                <div class="form-group">
                    <label for="contact_number">contact number</label>
                    <input type="text" name="contact"  value="<?php echo  $row7['contact_no']; ?>" class="form-control" id="contact_number">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" value="<?php echo  $row7['email_address']; ?>" class="form-control" id="email">
                </div>
                <div class="form-group">
                    <label for="quantity">quantity</label>
                    <input type="text" name="quantity" value="<?php echo  $row7['quantity']; ?>" class="form-control" id="quantity">
                </div>
                
               
                
                <div class="modal-footer" id="footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        
                       
                        
                </div>

               
    </form>
    <?php

    }

}

if(isset($_REQUEST["contact_id"]))
{
    $qry7="select *from users_feedback where id={$_REQUEST['contact_id']}";
    $result7=$conn->prepare($qry7);
    $result7->execute();
    while($row7=$result7->fetch(PDO::FETCH_ASSOC))
    {
?>
  <div class="row">

    <div class="col-md-6">
        <p class="text-muted">
        Names
        </p>
        <h5>
           <?php echo $row7['name']; ?>
        </h5>
    </div>

    <div class="col-md-6">
        <p class="text-muted">
            Contact No
        </p>
        <h5>
            <?php echo $row7['phone']; ?>
        </h5>
    </div>
</div>

 <div class="row">
    <div class="col-md-12">
        <p class="text-muted">
             Message
        </p>
        <p><?php echo $row7['message']; ?> </p>
    </div>
</div>

<?php

}


}  

if(isset($_REQUEST["distribution_id"]))
{
    $qry7="select *from distributon_network where id={$_REQUEST['distribution_id']}";
    $result7=$conn->prepare($qry7);
    $result7->execute();
    while($row7=$result7->fetch(PDO::FETCH_ASSOC))
    {
?>
<h5><b>Shree Shirdar Seed Distribution Network</b></h5>
                    <p class="text-muted">Kotihawa, Bhairahawa</p>
                    <br>
                    <p><b>Contact no</b></p>
                    <p class="text-muted">984524224</p>
                    <p><b>Owner Name</b></p>
                    <p class="text-muted">Ram Chandra Tripathi</p>
                    <br>
                    <b><a href="#">Find in Map</a></b>
<?php
    }
}
//.................................................................... ..........................
//users_signup_view_data

if(isset($_REQUEST["user_id"]))
{
    $qry1="select *from customer_data,product_portfolio,users_signup  where  customer_data.product_id=product_portfolio.id and customer_data.users_signup_id=users_signup.id and users_signup.id={$_SESSION['users_id']} ";
    $result1=$conn->prepare($qry1);
                                    
    $result1->execute();
                               
    while($row1=$result1->fetch(PDO::FETCH_ASSOC))
    {
?>
    
                  <div class="userinfo" style="background-color: #caf0f8;padding:20px; border-radius: 10px;">
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
                    </table>
                  
      
                    

       

<?php 
        
                                                                
    }
   

}

?>