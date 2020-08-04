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
            $product_code=$_REQUEST['product_code'];
            $product_name=$_REQUEST['product_name'];
            $category_name=$_REQUEST['select'];
            $product_price=$_REQUEST['product_price'];
            $product_description=$_REQUEST['product_description'];

            // main image upload and insert
            $tempname=$_FILES['myfile']['tmp_name'];
            $imagename=$_FILES['myfile']['name'];

            
            
             
                  move_uploaded_file($tempname,"../product_portfolio_image/".$imagename);
                  

               //SUB image_1 upload and insert
                  $tempname1=$_FILES['files1']['tmp_name'];
                  $imagename1=$_FILES['files1']['name'];
                 
             
                  move_uploaded_file($tempname1,"../product_portfolio_image/".$imagename1);
                 
                
                
               

               //sub image2 insert and upload
               $tempname2=$_FILES['files2']['tmp_name'];
               $imagename2=$_FILES['files2']['name'];
               
             
          
               move_uploaded_file($tempname2,"../product_portfolio_image/".$imagename2);
               
             
             
            

            //sub image3 insert and upload
            $tempname3=$_FILES['files3']['tmp_name'];
            $imagename3=$_FILES['files3']['name'];
            
          
            move_uploaded_file($tempname3,"../product_portfolio_image/".$imagename3);
            
            
          
          
         

         // sub image4 insert and upload
         $tempname4=$_FILES['files4']['tmp_name'];
         $imagename4=$_FILES['files4']['name'];
         
       
         move_uploaded_file($tempname4,"../product_portfolio_image/".$imagename4);
         
       
       
      

      //insert query for adding product details
     
     
         $qry="insert into product_portfolio (product_code,product_name,product_image,sub_image1,sub_image2,sub_image3,sub_image4,category_name,product_description,price_of_product) values (?,?,?,?,?,?,?,?,?,?)";
         $result=$conn->prepare($qry);
         $result->bindParam(1,$product_code,PDO::PARAM_INT);
         $result->bindParam(2,$product_name,PDO::PARAM_STR);
         $result->bindParam(3,$imagename,PDO::PARAM_STR);
         $result->bindParam(4,$imagename1,PDO::PARAM_STR);
         $result->bindParam(5,$imagename2,PDO::PARAM_STR);
         $result->bindParam(6,$imagename3,PDO::PARAM_STR);
         $result->bindParam(7,$imagename4,PDO::PARAM_STR);

         $result->bindParam(8,$category_name,PDO::PARAM_STR);
         $result->bindParam(9,$product_description,PDO::PARAM_STR);
         $result->bindParam(10,$product_price,PDO::PARAM_INT);
    
       $result->execute();
      header('location:product.php');
         
         
         

    


        
?>