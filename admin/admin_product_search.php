<?php include('../includes/dbcon.php');?>





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
                            
                            
                            <li class="nav-item active">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#vProduct" role="tab" aria-controls="profile" aria-selected="false">View Product</a>
                            </li>
                           
                            
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            
                                <?php 
                                    if(isset($_REQUEST['admin_search_box']))
                                    {    
                                        $admin_product_search=$_REQUEST['admin_search_box'];
                                    }
                                    else
                                    {
                                        $admin_product_search="";
                                    }
                                       
                                        $qry2="select *from product_portfolio where product_name like'%$admin_product_search%' or  category_name like'%$admin_product_search%'";
                                        
                                        $result2=$conn->prepare($qry2);
                                        $result2->execute();
                                        

                                    
                                
                                   
                                ?>

                            <div class="tab-pane fade show active" id="vProduct" role="tabpane1" aria-labelledby="view-eomployee">
                                <h4 style="margin-top:30px;margin-left:20px; float:left;">View Product</h4>
                                        <!-- search section  -->
                                    <div class="col-md-6" style="float:right; margin-top:30px">
                                        <form action="admin_product_search.php" method="POST" id="forms">
                                            <div class="input-group mb-3" id="searchSection">
                                                <input type="text" name="admin_search_box" class="form-control" placeholder="What are you looking for?">
                                                <div class="input-group-prepend">
                                                <button type="submit" class="input-group-text" name="search" style="background:#2d5f2e;color:white;"><i class="fa fa-search"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

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
                                            <?php
                                               while($row2=$result2->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                            <tr>
                                                <th scope="row">1</th>
                                            
                                                <td><?php echo $row2['product_code']; ?></td>
                                                <td>
                                                    <img src="../product_portfolio_image/<?php 
                                                   
                                                    echo $row2['product_image'];

                                                    ?>" alt="" style="width:50px; height:50px;">
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
                            <h4 style="margin-top:30px;margin-left:20px;float:left;">View Order</h4>

                                <!-- search section  -->
                                <div class="col-md-6" style="float:right;margin-top:30px;">
                                    <form action="view_order_search.php" method="POST" id="forms">
                                        <div class="input-group mb-3" id="searchSection">
                                            <input type="text" name="view_search_box" class="form-control" placeholder="What are you looking for?">
                                            <div class="input-group-prepend">
                                            <button type="submit" name="view_search" class="input-group-text" name="search" style="background:#2d5f2e;color:white;"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div> <br><br>

                                
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
                                                <img src="../product_portfolio_image/<?php echo $data4['product_image'];?>" alt="pic" style="width:50px; height:50px;">
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
                                                <img src="../product_portfolio_image/<?php echo $row5['image'];?>" alt="pic" style="width:50px;height:50px;">
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