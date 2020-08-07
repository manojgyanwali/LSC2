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

           

     
<div class="cardSection">
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
                        <img src="images/distribution_network_images/<?php echo $row['image'] ?>" class="dImg" alt="">
                    </td>
                    <td>
                        <h3 class="HeadersB">
                           <?php echo $row['name'] ?>
                        </h3>
                        <p class="mcf"><?php echo $row['google_map_address'] ?></p>
                    </td>
                </tr>
            </Table>
        </div>
        

        <div class="col-md-3">
            <button type="button" distribution_id="<?php echo $row['id']; ?>" class="downloadBtn view_data" style="text-align:center;" >
                Contact Now !
            </button>
        </div>
        
    </div>
    
</div>
<?php } ?>  


        


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
                <div class="modal-body" id="distribution_data">
                    
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
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
<!-- <script src="../js/master.js"></script> -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/d27006f8df.js" crossorigin="anonymous"></script>

<script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
          console.log("button clicked");
         

          var distribution_id=$(this).attr("distribution_id");
         
          
          $.ajax({
              
              url:"dataModal.php",
              method:"POST",
              data:{distribution_id:distribution_id},
              success:function(data){
                  $('#distribution_data').html(data);
                  $('#contactnow').modal("show");

               
              }
          });
         
         
            
        
          
          
      });  
});  
   
 </script>


</body>
</html>