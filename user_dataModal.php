<?php
include('includes/dbcon.php');
session_start();
if(isset($_SESSION['user_login']))
{
   echo "";
}
else
{
   header('location:index.php');
}

if(isset($_REQUEST["user_id"]))
{
    $qry1="select *from customer_data,product_portfolio,users_signup  where  customer_data.product_id=product_portfolio.id and customer_data.users_signup_id=users_signup.id and users_signup.id={$_SESSION['users_id']}";
    $result1=$conn->prepare($qry1);
                                    
    $result1->execute();
                               
    while($row1=$result1->fetch(PDO::FETCH_ASSOC))
    {
    
?>
    
                  <div class="userinfo" style="background-color: #caf0f8;padding:20px; border-radius: 10px;">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="font-weight-bold">Ordered Person</h5>
                                <p class="text-muted"><?php echo $row1['name'] ?></p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="font-weight-bold">Ordered Address</h5>
                                <p class="text-muted"><?php echo $row1['address'] ?></p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="font-weight-bold">Contact num</h5>
                                <p class="text-muted"><?php echo $row1['phone_no'] ?></p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="font-weight-bold">Email</h5>
                                <p class="text-muted"><?php echo $row1['email_address'] ?></p>
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
                                <td><?php echo $row1['category_name']; ?></td>
                                <td><?php echo $row1['product_name']; ?></td>
                                <td><?php echo $row1['price_of_product']; ?></td>
                                <td><?php echo $row1['quantity'];?></td>
                            </tr>
                        </tbody>
                    </table>
                  
      
                    

       

<?php 
        
                                                                
    }
} 


?>