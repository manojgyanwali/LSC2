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

include('../includes/dbcon.php');

if(isset($_REQUEST['add_category']))
{
    $category=$_REQUEST['category'];
    if($category=="")
    {
        $message= '<div class="alert alert-warning col-md-6" role="alert">please fill the category name</div>';
    }
    else
    {
        $qry="insert into category (category_type) value('$category')";
        $conn->query($qry);
    }
    
    

}


if(isset($_REQUEST['delivered_order']))
{
     $name=$_REQUEST['name'];
     $address=$_REQUEST['address'];
     $contact=$_REQUEST['contact'];
     $email=$_REQUEST['email'];
     $quantity=$_REQUEST['quantity'];
     $product_name=$_REQUEST['product_name'];
     $product_image=$_REQUEST['product_image'];
     
    

    $qry="insert into previous_customer_data (ordered_person,address,contact_no,email_address,quantity,product_name,image) values (?,?,?,?,?,?,?)";
    $result=$conn->prepare($qry);
    $result->bindParam(1,$name,PDO::PARAM_STR);
    $result->bindParam(2,$address,PDO::PARAM_STR);
    $result->bindParam(3,$contact,PDO::PARAM_INT);
    $result->bindParam(4,$email,PDO::PARAM_STR);
    $result->bindParam(5,$quantity,PDO::PARAM_INT);
    $result->bindParam(6,$product_name,PDO::PARAM_STR);
    $result->bindParam(7,$product_image,PDO::PARAM_STR);

   

   $row=$result->execute();

  
   if($row>0)
   {
       
      $qry2="delete from customer_data where id={$_REQUEST['idd']} ";
      $conn->query($qry2);
   }
 
    
  

    
    
   
     
    

}





?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Companies Profile</title>
    
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
                        <h1>Product Portfolio</h1>
                        <p class="text-muted">Admin/product</p>
                    </div>

                    <div class="pills-Section">
                             
                    <!-- pills begins from here  -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#category" role="tab" aria-controls="home" aria-selected="true">Add Catgory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#product" role="tab" aria-controls="profile" aria-selected="false">Add Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#vProduct" role="tab" aria-controls="profile" aria-selected="false">View Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#vOrder" role="tab" aria-controls="profile" aria-selected="false">View Orders</a>
                        </li>
                        
                    </ul>
                        <div class="tab-content" id="myTabContent">
                            <!-- add category  -->
                            <div class="tab-pane fade show active" id="category" role="tabpanel" aria-labelledby="home-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add Category</h4>
                                <div class="contents" style="padding:20px;">
                                    <form action="" method="POST">

                                        <label for="">Add Category</label>
                                        <input type="text" name="category" class="form-control col-md-6">
                                        <?php if(isset($message)){ echo $message;}  ?></br>

                                   
                                        
                                        <button type="submit" name="add_category" class="btn btn-info">Add Category</button>
                                    </form>   

                                    
                                </div>
                            </div>
                            <!-- add product -->
                            <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="profile-tab">
                                <h4 style="margin-top:30px;margin-left:20px;">Add Product</h4>
                                <div class="container">
                                    <form action="add_product.php" method="POST" enctype="multipart/form-data">
                                        <label><b>Upload Product Highlight Image (250*250)</b></label><br>
                                        <input type="file" name="myfile" placeholder="Choose File" required><br><br>

                                        <p><b><i>Sub Images</i></b></p>

                                        <div class="row">
                                            
                                            <div class="col-md-3">
                                                <input type="file" name="files1" placeholder="Choose File">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" name="files2" placeholder="Choose File">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" name="files3" placeholder="Choose File">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="file" name="files4" placeholder="Choose File">
                                            </div>
                                        </div> <br>

                                        <label for="">Product Code</label>
                                        <input type="text"  name="product_code"  class="form-control col-md-3" required > <br>

                                        <label for="">Product Name</label>
                                        <input type="text" name="product_name" class="form-control col-md-6"  required > <br>

                                        <label>Select Category</label><br>
                                       
                                        <select  name="select" class="selectpicker">
                                        <?php 
                                            $qry1="select *from category";
                                            $result1=$conn->prepare($qry1);
                                            $result1->execute();
                                           
                                            while($row1=$result1->fetch(PDO::FETCH_ASSOC))
                                            {
                                                ?>
                                            <option><?php echo $row1['category_type'];?></option> 
                                                
                                            <?php
                                            }
                                            ?>  
                                              
                                        </select> <br><br>
                                        

                                        <label for="">Product Price</label>
                                        <input type="text" name="product_price" class="form-control col-md-3"  required ><br>

                                        <label for="">Product Description</label>
                                        <textarea class="form-control" name="product_description" id="" cols="20" rows="10"  required ></textarea>

                                        
                                        <button  type="submit" name="add_product"class="btn btn-info">Add Product</button>              
                                    </form>

                                </div>
                                    
                            </div>

                            <!-- view product  -->
                                <?php 
                                    $qry2="select *from product_portfolio";
                                    $result2=$conn->prepare($qry2);
                                    $result2->execute();
                                ?>

                            <div class="tab-pane fade" id="vProduct" role="tabpane1" aria-labelledby="view-eomployee">
                                <h4 style="margin-top:30px;margin-left:20px;">View Employee</h4>
                                        
                                <div class="contents" style="padding:20px;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th>P code</th>
                                            <th scope="col">P Img</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">EDIT | DELETE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while 
                                                ($row2=$result2->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                            <tr>
                                                <th scope="row">1</th>
                                            
                                                <td><?php echo $row2['product_code']; ?></td>
                                                <td>
                                                    <img src="../product_portfolio_image/<?php 
                                                   
                                                    echo $row2['product_image'];

                                                    ?>" alt="" style="width:50px;">
                                                </td>
                                                <td><?php echo $row2['product_name']; ?></td>
                                                <td>
                                                    <?php echo $row2['category_name']; ?>
                                                    <a data-toggle="tab" href="#category " ><i class="fa fa-edit" style="font-size:larger; padding-left:5px;"></i></a>
                                                </td>
                                                <td>
                                                    <a href="edit_product.php?id=<?php echo $row2['id']; ?>" ><i class="fa fa-edit" style="font-size:larger;"></i></a>
                                                    <span style="border: 1px solid black; margin: 5px 10px;"></span>
                                                    <a onclick="return validate()" href="delete_product.php?id=<?php echo $row2['id']; ?>"><i class="fas fa-trash-alt" style="font-size:larger;color:red;"></i></a>
                                                </td>
                                            
                                            </tr>
                                            <?PHP
                                            } 
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- view order -->
                            <?php  
                                $qry4="select *from product_portfolio,customer_data  where product_portfolio.id=customer_data.product_id";
                                $result4=$conn->query($qry4);
                            ?>   
                            
                            <div class="tab-pane fade" id="vOrder" role="tabpane1" aria-labelledby="view-partners">
                            <h4 style="margin-top:30px;margin-left:20px;">View Order</h4>

                                
                                <div class="contents" style="padding:20px;">

                                   <!-- new order starts  -->

                                    <table class="table table-striped">
                                        <p><b>New Order</b></p>
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Order Amount</th>
                                            <th scope="col">View Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php while($data4=$result4->fetch(PDO::FETCH_ASSOC))
                                                    
                                                        {   
                                                            
                                                    ?>
                               
                                            <tr>
                                            <th scope="row">1</th>
                                            
                                            <td>
                                                <img src="../product_portfolio_image/<?php echo $data4['product_image'];?>" alt="pic" style="width:50px;">
                                            </td>
                                            <td>
                                                <?php echo $data4['product_name'];
                                               
                                                 ?>
                                                
                                            </td>
                                            <td>
                                                <?php echo $data4['quantity'];?>
                                               
                                               
                                            </td>
                                               
                                            
                                             
                                                  
                                            <td><button class="btn btn-primary view_data" ids="<?php echo $data4['id']; ?>" >View Details</button></td>                                             
                                             
                                            
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
                                                        <div class="modal-body" id="customer_details">
                                                            
                                                            
                                                            
                                                        </div>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </tbody>
                                        
                                    </table>

                                    <!-- previous order starts  -->
                                            <?php  
                                                $qry5="select *from previous_customer_data order by id desc";
                                                $result5=$conn->query($qry5); 
                                            ?>
                                    
                                   

                                    <table class="table table-striped">
                                       


                                        <p><b><i>Previous Order</b></i></p>
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Order Amount</th>
                                            <th scope="col">View Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                            <?php 
                                                            while($row5=$result5->fetch(PDO::FETCH_ASSOC)) 
                                                                {

                                                               
                                                             ?>
                                               
                                            <tr>
                                            <th scope="row">1</th>
                                            <td>
                                                <img src="../product_portfolio_image/<?php echo $row5['image'];?>" alt="pic" style="width:50px;">
                                            </td>
                                                                    
                                            <td>
                                            <?php echo $row5['product_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row5['quantity'];  ?>
                                            </td>
                                            <td>
                                            <button class="btn btn-primary previous_view_data" ids1="<?php echo $row5['id']; ?>" >View Details</button>
                                            </td>
                                            </tr>
                                                                <?PHP } ?>
                                                    
                                            
                                        </tbody>
                                        <div class="modal fade" id="previousModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Previous Order Details</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" id="previous_customer_details">
                                                            
                                                            
                                                            
                                                        </div>
                                                        
                                                        </div>
                                                    </div>
                                        </div>
                                        
                                        
                                    </table>

                                </div>

                            </div>
                        </div>
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
          var customer_id=$(this).attr("ids");
         
          $.ajax({
              url:"dataModal.php",
              method:"POST",
              data:{customer_id:customer_id},
              success:function(data){
                  $('#customer_details').html(data);
                  $('#exampleModal').modal("show");

               
              }
          });
         
            
        
          
          
      });  



      $('.previous_view_data').click(function(){  
          var customer_id1=$(this).attr("ids1");
         
          $.ajax({
              url:"dataModal.php",
              method:"POST",
              data:{customer_id1:customer_id1},
              success:function(data){
                  $('#previous_customer_details').html(data);
                  $('#previousModal').modal("show");

               
              }
          });
         
            
        
          
          
      });  
 });  
 </script>
 <script>
function validate()
    {
       
       var confirms=  confirm("Are you sure wants to delete this data ?  ");
       if(confirms==true)
       {
           return true;
       }
       else
       {
           return false;
       }
    }
</script>


</body>
</html>